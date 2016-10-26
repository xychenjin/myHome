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
}