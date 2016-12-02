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

    public function dbDown()
    {
        return __FUNCTION__;
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
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(Request $request)
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
}