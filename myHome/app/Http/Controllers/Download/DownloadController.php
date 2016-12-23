<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/1
 * Time: 18:18
 */

namespace App\Http\Controllers\Download;


use App\Bls\Card\CardBls;
use App\Bls\Connect\ConnectBls;
use App\Bls\Connect\Triats\ConnectTrait;
use App\Bls\Data\DataBls;
use App\Bls\Download\Download;
use App\Bls\File\FileBls;
use App\Consts\Connect\ConnectConst;
use App\Consts\Download\DownloadConst;
use App\Consts\Exception\ExceptionConst;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Download\Validations\DownloadFormValidation;
use App\Library\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use View;
use Illuminate\Support\Facades\Log;

class DownloadController extends Controller
{
    use ConnectTrait;

    /**
     * 下载数据库列表页
     *
     * @param Request $request
     * @return mixed
     */
    public function db(Request $request)
    {
        if(strpos(php_uname(),"Windows") !== false) {
            //默认存放路径
            $path = "";
        }
        //限制导出条数
        $limit = 0;
        $dataType = DownloadConst::dataType();
        return View::make('download.index', compact('path', 'limit', 'dataType'));
    }

    public function history(Request $request)
    {
        $path = strtr(public_path(). '/temp/', '\\', '/');

        $scanFiles = [];
        scanMyDir($path, $scanFiles, $path, '');
        $storagePath = ltrim(getHost(),'/'). '/temp/';
        krsort($scanFiles);
        $collection = new Collection($scanFiles);

        $perPage = 10;

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentPageResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();
        $files = new LengthAwarePaginator($currentPageResults, count($collection), $perPage);
        $files->setPath($request->url());

        $storage = strtr(storage_path(). '/logs/', '\\', '/');
        $logs = [];
        scanMyDir($storage, $logs, $storage, '');

        return View::make('download.history', compact( 'jsonFile', 'request', 'files', 'storagePath', 'logs'));
    }

    /**
     * 导出数据库至文件操作
     *
     * @param DownloadFormValidation $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dbDown(DownloadFormValidation $request)
    {
        try {
            //创建连接
            $connection = (new ConnectBls())->getConnection($request->hostName,$request->userName, $request->password,
                '' , isset($request->hostPort) ? $request->hostPort : null);
        } catch (\Exception $e) {
            $messages = ConnectConst::getMessage($e->getMessage()) ;
            return redirect()->back()->withInput($request->all())
                ->withErrors(['connectionFailed' => '连接失败：'. $messages]);
        }

        try {
            $startAt = date('Y-m-d H:i:s');
            $download = new Download($request->fileType, isset($request->path) ? $request->path : '');
            $dataBls = new DataBls('', isset($request->dataType) ? $request->dataType : '');

            //打印调用参数信息
            $download->with([
                'Timestamp' => 'Created_at: '. date("Y-m-d H:i:s"),
                'url' => $request->url(),
                'file' => $download->getFile(),
                'Queries' => $request->all(),
            ]);

            $download->with("---------------------------------------------------------------------");
            //开启过期机制
            set_time_limit(0);
            //统计错误信息
            $errorsMsg = '' ;
            $errorsCount = 0;
            foreach ($request->tbName as $item => $tb) {
                try {
                    $res = $connection->select('SELECT count(1) as existed FROM information_schema.TABLES WHERE table_name = "'
                        . explode('.', $tb)[1].'" AND TABLE_SCHEMA ="'. explode('.', $tb)[0].'"');
                    if (! $res[0]->existed) {
                        continue;
                    }

                    $tb = '`'. str_replace('.', '`.`', $tb) . '`';
                    //是否需要导出表结构
                    if ( $request->structure) {
                        $download->with("DROP TABLE IF EXISTS $tb ");

                        $desc = $connection->select('SHOW CREATE TABLE '. $tb);
                        $download->with($desc);
                        $download->with("--------------------------------------------------------------------");
                    }

                    //是否需要导出数据
                    if (! $request->export) {
                        $download->append();
                        continue;
                    }

                    $res = $connection->select('SELECT COUNT(1) AS total FROM '. $tb);
                    $total = $res[0]->total;
                    $max = config('limit.max');
                    $limit = config('limit.pitch');
                    //数据量过大，分批次导出
                    if ($total > $max) {
                        //开始
                        $i = 0;
                        //成功条数
                        $succeed = 0;
                        //计算需要轮循次数
                        $times = ceil($total/$limit);

                        while($i < $times) {
                            try {
                                //导出的结果集拼接
                                $query = $this->getQueries($connection, $tb, [
                                    'orderBy' => $request->get('orderBy'),
                                    'limit' => $limit
                                ], ($i * $limit -1) > 0 ? ($i * $limit -1) : 0);
                                $res = $connection->select($query);

                                $dataBls->setData($res);
                                $dataBls->setPrefix($tb);
                                $download->with($dataBls->parse());
                                $download->append();
                                $download->free();
                                $succeed += count($res);

                            } catch (\Exception $e) {
                                $msg = ExceptionConst::format([ '数据批量导出操作:'.$tb, $e->getMessage(), $e->getFile(), $e->getLine(),$e->getCode()]);
                                Log::error($msg);
                                $errorsMsg .= "<br/>". $msg;
                                $errorsCount += 1;
                            }
                            $i++ ;
                        }
                        $succeed > 0  && $download->with("共计导出：". $succeed. "条") ;
                    } else {
                        //导出的结果集拼接
                        $query = $this->getQueries($connection, $tb, $request->all());
                        $res = $connection->select($query);

                        count($res)>0 && $download->with("共计导出：". count($res). "条");

                        $dataBls->setData($res);
                        $dataBls->setPrefix($tb);
                        $download->with($dataBls->parse());

                        $download->append();
                        $download->free();

                    }
                } catch (\Exception $e) {
                    $msg = ExceptionConst::format([ '数据查询操作:'.$tb , $e->getMessage(), $e->getFile(), $e->getLine(),$e->getCode()]);
                    Log::error($msg);
                    $errorsMsg .= "<br/>". $msg;
                    $errorsCount += 1;
                }
            }

            $errorsMsg = $errorsCount && $errorsMsg ? "本次导出共计有 {$errorsCount} 处异常错误<br/>". $errorsMsg : '' . $errorsMsg;

            return redirect(route('download.success', ['type'=> $request->fileType, 'md5' => $download->getMd5(),
                        'path'=> isset($request->path) ? $request->path : ''])
                )
                ->withErrors(compact('errorsMsg'))
                ->withFlashMessage("导出成功! 开始于: ". $startAt. ', 结束于: '. date('Y-m-d H:i:s'))
                ->withFlashType('success');
        } catch (\Exception $e) {
            $msg = ExceptionConst::format([ '导出文件', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode()]);
            Log::error($msg);
            return redirect()->back()->withInput($request->all())
                ->withErrors(['downloadFailed' => $msg]);
        }
    }

    /**
     * 下载成功页面
     *
     * @param Request $request
     * @return mixed
     */
    public function success(Request $request)
    {
        $bls = new Download($request->type, isset($request->path) ? $request->path : '');
        $storagefile = $bls->getStorage($request->md5);
        $fileBls = new FileBls($storagefile);
        $file = $fileBls->transfer();
        $localFile = $bls->getLocal();
        $fileBls->setFile($localFile);
        $jsonFile = $fileBls->transfer();

        $path = strtr(public_path(). '/'. $bls->getStorageDir(), '\\', '/');
        $files = [];
        scanMyDir($path, $files, $path, '');
        array_pop($files);
        $storagePath = ltrim(getHost(),'/'). '/'. $bls->getStorageDir();

        return View::make('download.success', compact('file', 'jsonFile', 'request', 'files', 'storagePath') );
    }

    /**
     * 查看保存key详情页
     *
     * @param Request $request
     * @return mixed
     */
    public function keyDetail(Request $request)
    {
        $bls = new Download($request->type);

        $file = file_get_contents( $bls->getLocal());
        $json = json_decode($file);
        $array = json_decode($file, true);

        return View::make('download.keyDetail', compact('json', 'array', 'request') );
    }

    /**
     * AJAX 测试连接数据库
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function testConnect(Request $request)
    {
        $jsonResponse = new JsonResponse();

        if (empty($request->hostName) || empty($request->userName)) {
            return $jsonResponse->error(1000001);
        }

        try {
            (new ConnectBls())->getConnection($request->hostName,$request->userName, $request->password,
                isset($request->database) ? $request->database : null, isset($request->hostPort) ? $request->hostPort : null);
            return $jsonResponse->success();
        } catch (\Exception $e) {
            $message = ConnectConst::getMessage($e->getMessage()) ;
            return $jsonResponse->error(1000002, $message);
        }
    }

    /**
     * AJAX 获取数据库列表List
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDb(Request $request)
    {
        $jsonResponse = new JsonResponse();
        if (empty($request->hostName) || empty($request->userName)) {
            return $jsonResponse->error(1000001);
        }

        try {
            $connection = (new ConnectBls())->getConnection($request->hostName,$request->userName, $request->password,
                isset($request->database) ? $request->database : null, isset($request->hostPort) ? $request->hostPort : null);
        } catch (\Exception $e) {
            $message = ConnectConst::getMessage($e->getMessage()) ;
            return $jsonResponse->error(1000002, $message);
        }

        if (! $connection) {
            return $jsonResponse->error(1000002);
        }

        $res = $connection->select('SHOW DATABASES');
        $db = $this->createCheckbox(collect($res));

        return $jsonResponse->success(compact('db'));
    }

    /**
     * AJAX 获取指定数据库表List
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTb(Request $request)
    {
        $jsonResponse = new JsonResponse();
        if (empty($request->hostName) || empty($request->userName) || empty($request->db)) {
            return $jsonResponse->error(1000001);
        }

        try {
            $connection = (new ConnectBls())->getConnection($request->hostName,$request->userName, $request->password,
                $request->db , isset($request->hostPort) ? $request->hostPort : null);
        } catch (\Exception $e) {
            $message = ConnectConst::getMessage($e->getMessage()) ;
            return $jsonResponse->error(1000002, $message);
        }

        if (! $connection) {
            return $jsonResponse->error(1000002);
        }

        $res = $connection->select($this->queryTbByDb($request->db));
        $tb = $this->createTableList($request->db, collect($res));

        return $jsonResponse->success(compact('tb'));
    }

    /**
     * 查看日志列表
     *
     * @param Request $request
     * @return mixed
     */
    public function logLists(Request $request)
    {
        $path = strtr(storage_path(). "/logs/", '\\', '/');
        $files = [];
        scanMyDir($path, $files, $path, '');

        return View::make('log.view', compact('files', 'request'));
    }

    /**
     * 查看日志Log文件
     *
     * @param Request $request
     * @throws \Exception
     */
    public function view(Request $request)
    {
        if ( isset($request->file) && ! empty($request->file)) {
            try {
                $file = strtr(storage_path(). "/logs/", '\\', '/') . '/'. $request->file;

                $handler = fopen($file, "r");
                while (! feof($handler)) {
                    echo fgets($handler) . "<br>";
                }
                fclose($handler);
            } catch(\Exception $e) {
                throw $e;
            }
        } else {
            throw new \Exception('参数错误');
        }
    }

    /**
     * 删除文件
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function delete(Request $request)
    {
        try {
            $path = strtr(public_path(). '/temp/', '\\', '/');
            $file = rtrim($path, '/') .'/'.$request->file;
            if (is_file($file)) @unlink($file);
            return redirect()->back()->withFlashMessage('删除成功！')->withFlashType('success');
        } catch(\Exception $e) {
           return $e->getMessage();
        }
    }



}
