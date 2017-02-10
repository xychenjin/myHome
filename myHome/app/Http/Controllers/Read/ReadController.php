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

class ReadController extends Controller
{
    public function index()
    {
        $data = (new ReadBls())->getList(\Input::all());

        return \View::make('read.index', compact('data'));
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