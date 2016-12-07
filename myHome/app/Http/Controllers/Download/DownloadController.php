<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/1
 * Time: 18:18
 */

namespace App\Http\Controllers\Download;


use App\Bls\Connect\ConnectBls;
use App\Bls\Connect\Triats\ConnectTrait;
use App\Bls\Download\Download;
use App\Consts\Connect\ConnectConst;
use App\Http\Controllers\Controller;
use App\Library\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use View;

class DownloadController extends Controller
{
    use ConnectTrait;

    public function db(Request $request)
    {
        if(strpos(php_uname(),"Windows") !== false) {
            //默认存放路径
            $path = "";
        }
            //限制导出条数
            $limit = 0;
        return View::make('download.index', compact('path', 'limit'));
    }

    public function dbDown(Request $request)
    {

        if (empty($request->hostName) || empty($request->userName)
            || empty($request->tbName) || empty($request->fileType)
        ) {
            return redirect()->back()->withInput($request->all())
                ->withErrors(1000001);
        }

        try {
            $connection = (new ConnectBls())->getConnection($request->hostName,$request->userName, $request->password,
                '' , isset($request->hostPort) ? $request->hostPort : null);
        } catch (\Exception $e) {
            $message = ConnectConst::getType($e->getMessage()) ;
            return redirect()->back()->withInput($request->all())
                ->withErrors($message);
        }

        if (! $connection) {
            return redirect()->back()->withInput($request->all())
                ->withErrors(1000002);
        }

        try {

            $download = new Download($request->fileType, isset($request->path) ? $request->path : '');

            //打印调用参数信息
            $download->with([
                'Timestamp' => 'Created_at: '. date("Y-m-d H:i:s"),
                'url' => $request->url(),
                'Queries' => $request->all(),
            ]);

            $download->with("---------------------------------------------------------------------");

            foreach ($request->tbName as $item => $tb) {
                try {
                    //是否需要导出表结构
                    if ($request->structure) {
                        $desc = $connection->select('show create table '. $tb);
                        $download->with($desc);
                        $download->with("---------------------------------------------------------------------");
                    }

                    //导出的结果集拼接
                    $query = $this->getQueries($connection, $tb, $request->all());

                    $res = $connection->select($query);
                    $download->with($res);

                } catch (\Exception $e) {
                    $download->with($e->getMessage());
                }
            }
            $download->append();

            return redirect(route('download.success', ['type'=> $request->fileType, 'md5' => $download->getMd5()]));
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->all())
                ->withErrors($e->getMessage());
        }
    }

    public function success(Request $request)
    {
        $bls = new Download($request->type);
        $file = $bls->getStorage($request->md5);
        $jsonFile = $bls->getLocal();
        $path = strtr(public_path(). '/'. $bls->getStorageDir(), '\\', '/');

        $files = [];
        scanMyDir($path, $files, $path, '');
        array_pop($files);
        $storagePath = ltrim(getHost(),'/'). '/'. $bls->getStorageDir();

        return View::make('download.success', compact('file', 'jsonFile', 'request', 'files', 'storagePath') );
    }

    public function keyDetail(Request $request)
    {
        $bls = new Download($request->type);

        $file = file_get_contents( $bls->getLocal());
        $json = json_decode($file);
        $array = json_decode($file, true);

        return View::make('download.keyDetail', compact('json', 'array', 'request') );
    }

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
            $message = ConnectConst::getType($e->getMessage()) ;
            return $jsonResponse->error(1000002, $message);
        }
    }

    /**
     * 获取数据库列表
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
            $message = ConnectConst::getType($e->getMessage()) ;
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
     * 获取数据库表列表
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
            $message = ConnectConst::getType($e->getMessage()) ;
            return $jsonResponse->error(1000002, $message);
        }

        if (! $connection) {
            return $jsonResponse->error(1000002);
        }

        $res = $connection->select('select table_name from information_schema.tables where table_schema=?', [$request->db]);

        $tb = $this->createTableList($request->db, collect($res));

        return $jsonResponse->success(compact('tb'));
    }

    /**
     * 查看日志列表
     *
     * @param Request $request
     */
    public function logs(Request $request)
    {
        $path = strtr(storage_path(). "/logs/temp", '\\', '/');

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
                $file = strtr(storage_path(). "/logs/temp", '\\', '/') . '/'. $request->file;
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

}