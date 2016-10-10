<?php

namespace App\Http\Controllers\Design;

use App\Bls\Design\Factory\Airplane;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class DesignPatternsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bls = new Airplane();

        dd($bls->start());
    }



    /**
     * 工厂模式
     *
     */
    public function factory()
    {
        dd(__METHOD__);
    }

    /**
     * 单例模式
     *
     */
    public function singleton()
    {
       dd(__CLASS__. ' : '. __FUNCTION__);
    }

    /**
     * 链式模式
     */
    public function link()
    {
        dd(__CLASS__. ' : '. __FUNCTION__);
    }


}
