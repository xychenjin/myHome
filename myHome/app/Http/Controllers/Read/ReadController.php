<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/9
 * Time: 13:59
 */

namespace App\Http\Controllers\Read;


use App\Bls\Read\ReadBls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function index()
    {
        $data = (new ReadBls())->getList(\Input::all());

        return \View::make('read.index', compact('data'));
    }

    public function distribute(Request $request)
    {
        $res = ['msg' => '', 'code' => 0, 'data' => json_encode(array_merge($request->all(), ['dateTime' => date('Y-m-d H:i:s')]))];

        $ch = curl_init('http://baidu.com');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);

        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 200);

        $data = curl_exec($ch);

        $curl_errno = curl_errno($ch);

        $curl_error = curl_error($ch);

        curl_close($ch);

        if ($curl_errno > 0) {
            $res['msg'] =  "cURL Error ($curl_errno): $curl_error\n";
        } else {
            $res['msg'] = "Data received: $data\n";
        }

        if ($request->get('time') == 5) {
            abort(408);
        }

        return json_encode($res);
    }

    public function add()
    {
        return \View::make('read.create');
    }

    public function edit()
    {
        return \View::make('read.edit');
    }

    public function done()
    {
//        return \View::make('read.index');
    }

    public function note()
    {
//        return \View::make('read.index');
    }

    public function got()
    {
//        return \View::make('read.index');
    }

    public function store()
    {

    }
}