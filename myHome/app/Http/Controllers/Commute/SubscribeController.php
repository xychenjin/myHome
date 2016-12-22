<?php

namespace App\Http\Controllers\Commute;

use App\Bls\Commute\Model\CommuteModel;
use App\Http\Controllers\Commute\Traits\CommuteTraits;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    use CommuteTraits;
    /**
     * 补签
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribe = true;
        //获取可以补签的日期列表
        $subscribeDates =  $this->getSubscribeDates();

        return \View::make('commute.subscribe', compact('subscribe', 'subscribeDates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        //补签日期
        $date = $request->get('subscribeDate');

        if (empty($date)) return redirect()->back()->withInput()->withErrors(['subscribeDate'=>'请选择补签日期']);

        $model = CommuteModel::create([
            'user_id' => \Auth::user() ? \Auth::user()->id : 0,
            'start_at' => trim($input['start_at']),
            'clock_at' => trim($input['clock_at']),
            'clock_off_at' => trim($input['clock_off_at']),
            'day_th' => date('z', strtotime($date)),
            'day' => date('Y-m-d', strtotime($date)),
            //一年的第几天
            'week_th' => date('W', strtotime($date)),
            //当前星期几
            'weekday' => date('w', strtotime($date)),
            //当前年份
            'year_th' => date('Y', strtotime($date)),
            'boarding_at' => trim($input['boarding_at']),
            'tools' => $input['tools'],
            'desc' => $input['desc'],
            'is_subscribe' => true,
        ]);

        if (! $model) {
            return redirect()->back()->withInput()->withFlashMessage('补签失败！')
                ->withFlashType('danger');
        }

        return redirect()->route('commute.index')->withFlashMessage('补签成功！')
            ->withFlashType('success');
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
}
