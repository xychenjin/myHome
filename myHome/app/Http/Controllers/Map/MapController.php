<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/24
 * Time: 13:42
 */

namespace App\Http\Controllers\Map;


use App\Http\Controllers\Controller;
use View;

class MapController extends Controller
{
    public function index()
    {


        return View::make('Map.index',[]);
    }

    public function show()
    {

        return View::make('Map.show',[]);
    }

    public function transmit()
    {
        $url = "http://api.map.baidu.com/direction/v2/transit?origin=40.056878,116.30815&destination=31.222965,121.505821&ak=UppsswvvONT8xdkteCI0XgEoSeZP9lmg";

        $file = file_get_contents($url);

        dd(json_decode($file,true));
    }

}