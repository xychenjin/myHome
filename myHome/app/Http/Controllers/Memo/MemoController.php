<?php

namespace App\Http\Controllers\Memo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Cache;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('memo.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('memo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function study()
    {
        return \View::make('memo.study');
    }

    public function secret(Request $request)
    {
        $pwd = $request->getSession()->get('pwd');
        $pwd = $pwd ? $pwd : Cache::get('pwd');

        $answered = false;
        if (isset($pwd) && $pwd == config('secret.password')) {
            $answered = true;
        }

        return \View::make('memo.secret', compact('answered'));
    }

    public function ask(Request $request)
    {
        if ($request->get('pwd') == config('secret.password')) {
            Cache::put('pwd', $request->get('pwd'), 30);
            return redirect()->route('memo.secret')->with('pwd', $request->get('pwd'))->withFlashMessage('验证成功！')
                ->withFlashType('success');
        }
        return redirect()->back()->withInput()->withFlashMessage('验证失败！')
            ->withFlashType('danger');
    }
}
