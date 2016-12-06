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
        $jsonResponse = new JsonResponse();

        if (empty($request->hostName) || empty($request->userName)
            || empty($request->tbName) || empty($request->fileType)
        ) {
            return $jsonResponse->error(1000001);
        }

        try {
            $connection = (new ConnectBls())->getConnection($request->hostName,$request->userName, $request->password,
                '' , isset($request->hostPort) ? $request->hostPort : null);
        } catch (\Exception $e) {
            $message = ConnectConst::getType($e->getMessage()) ;
            return $jsonResponse->error(1000002, $message);
        }

        if (! $connection) {
            return $jsonResponse->error(1000002);
        }

        try {

            $download = new Download($request->fileType, isset($request->path) ? $request->path : '');

            foreach ($request->tbName as $item => $tb) {
                try {
                    //是否需要导出表结构
                    if ($request->structure) {
                        $desc = $connection->select('show create table '. $tb);
                        $download->with($desc);
                    }

                    //导出的结果集拼接
                    $query = $this->getQueries($tb, $request->all());
                    $res = $connection->select($query);
                    $download->with($res);

                    $download->append();
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }
            return redirect(route('download.success', ['type'=> $request->fileType, 'md5' => $download->getMd5()]));
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->all())
                ->withErrors($e->getMessage());
        }
    }

    public function success(Request $request)
    {
        $file = (new Download($request->type))->getStorage($request->md5);

        return View::make('download.success', ['file' => $file]);
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

}