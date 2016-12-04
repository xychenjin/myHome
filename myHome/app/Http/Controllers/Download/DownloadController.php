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
use Illuminate\Support\Facades\Log;
use View;

class DownloadController extends Controller
{
    use ConnectTrait;

    public function db()
    {
        return View::make('Test.download', []);
    }

    public function dbDown(Request $request)
    {
        $jsonResponse = new JsonResponse();
        if (empty($request->hostName) || empty($request->userName) || empty($request->dbName)
            || empty($request->tbName)
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
            $download = new Download($request->type, isset($request->dir) ? $request->dir : '');
            dd($download);
            foreach ($request->tbName as $item => $tb) {
                $res = $connection->select('select * from tb=?', [$tb]);
                $download->append($res);
            }
            $download->export();
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput($request->all())
                ->withErrors($e->getMessage());
        }
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