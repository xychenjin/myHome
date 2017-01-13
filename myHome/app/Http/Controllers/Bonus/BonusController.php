<?php

namespace App\Http\Controllers\Bonus;

use App\Bls\Bonus\BonusBls;
use App\Consts\Bonus\BonusStatusConsts;
use App\Consts\Bonus\BonusTypeConsts;
use App\Http\Controllers\Bonus\Traits\BonusTrait;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BonusController extends Controller
{
    use BonusTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchData = \Input::all();
        $data = (new BonusBls())->getList($searchData, 'id desc, status asc', 12);
        $selectStatus = BonusStatusConsts::status();
        $selectType = BonusTypeConsts::type();

        !empty(\Input::get('status')) && $data->appends('status', \Input::get('status'));
        !empty(\Input::get('type')) && $data->appends('type', \Input::get('type'));

        return \View::make('bonus.index', compact('data', 'searchData', 'selectType', 'selectStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('bonus.create');
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
        $bls = new BonusBls();
        $model = $bls->find($id);
        $data = $bls->getLogsById($model->id, 'id desc', 13);
        $lastRedirect = \Input::get('redirect');

        return \View::make('bonus.show', compact('data', 'lastRedirect', 'model'));
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

    /**
     * 发红包
     *
     * @param Request $request
     * @return mixed
     */
    public function makeBonus(Request $request)
    {
        try {
            $money = $request->get('money');
            $number = $request->get('number');
            $userId = \Auth::id();
            $name = $request->get('name');

            if ( $this->make($number, $money, $userId, $name)) {
                return redirect()->route('bonus.index')->withFlashMessage('发送成功！'. link_to_route('bonus.fetch', '去抢红包'))->withFlashType('danger');
            }
            return redirect()->back()->withFlashMessage('未知错误')->withFlashType('danger');
        } catch (\Exception $e) {
            return redirect()->back()->withFlashMessage($e->getMessage())->withFlashType('danger');
        }
    }

    /**
     * 抢红包
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function fetchBonus(Request $request, $id)
    {
        try {
            $bls = new BonusBls();
            $model = $bls->find($id);
            $userId = \Auth::id();

            if ($getMoney = $this->fetch($model->id, $userId)) {
                $msg = '你成功抢到了：'. $getMoney. '元' . ($model->isFetchOut ? $model->isFetchOutDesc. '已成功抢完！':'');
                return redirect()->back()->withFlashMessage($msg)->withFlashType('danger');
            }

            return redirect()->back()->withFlashMessage('未知错误')->withFlashType('danger');
        } catch (\Exception $e) {
            return redirect()->back()->withFlashMessage($e->getMessage())->withFlashType('danger');
        }
    }

    /**
     * 抢红包列表
     * @return mixed
     */
    public function fetchList()
    {
        $data = (new BonusBls())->fetchList();

        return \View::make('bonus.fetch', compact('data'));
    }


}
