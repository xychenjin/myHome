<?php

namespace App\Http\Controllers\Commute;

use App\Bls\Commute\CommuteBls;
use App\Bls\Commute\Model\CommuteModel;
use App\Bls\Data\DataBls;
use App\Bls\Download\Download;
use App\Consts\Download\DownloadConst;
use App\Consts\Exception\ExceptionConst;
use App\Http\Controllers\Commute\Traits\CommuteTraits;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommuteController extends Controller
{
    use CommuteTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bls = new CommuteBls();
        $searchData = $request->all();
        $res = $bls->getListByPage($searchData);
        $data = $this->formatList($res);

        $selectWeeks = $this->getSelectWeeks();
        $selectDays = $this->getSelectDays();
        $dataType = DownloadConst::dataType();

        !empty($searchData['day']) && $data->appends('day', $searchData['day']);
        !empty($searchData['week']) && $data->appends('week', $searchData['week']);
        !empty($searchData['userName']) && $data->appends('userName', $searchData['userName']);
        !empty($searchData['tool']) && $data->appends('tool', $searchData['tool']);
        !empty($searchData['startDay']) && $data->appends('startDay', $searchData['startDay']);
        !empty($searchData['endDay']) && $data->appends('endDay', $searchData['endDay']);
        !empty($searchData['subscribe']) && $data->appends('subscribe', $searchData['subscribe']);

        return \View::make('commute.list', compact('data', 'searchData', 'selectDays', 'selectWeeks','dataType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //周次
        $weekThes = $this->weekThes();
        //周几
        $weekDays = $this->weekDays();
        //年份
        $yearThes = $this->yearThes();
        //是否已经打过卡了
        $user = \Auth::user() ? \Auth::user()->id : 0;
        $commuted = CommuteModel::where('day', date('Y-m-d'))->where('user_id', $user)->exists();
        return \view::make('commute.create', compact('weekThes', 'weekDays', 'yearThes', 'commuted'));
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

        $model = CommuteModel::create([
            'user_id' => \Auth::user() ? \Auth::user()->id : 0,
            'start_at' => trim($input['start_at']),
            'clock_at' => trim($input['clock_at']),
            'clock_off_at' => trim($input['clock_off_at']),
            'day_th' => date('z'),
            'day' => date('Y-m-d'),
            //一年的第几天
            'week_th' => date('W') > 51 ? 0 : date('W'),
            //当前星期几
            'weekday' => date('w'),
            //当前年份
            'year_th' => date('Y'),
            'boarding_at' => trim($input['boarding_at']),
            'tools' => $input['tools'],
            'desc' => $input['desc']
        ]);

        if (! $model) {
            return redirect()->back()->withInput()->withFlashMessage('打卡失败！')
                ->withFlashType('danger');
        }

        return redirect()->route('commute.index')->withFlashMessage('打卡成功！')
            ->withFlashType('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $model = CommuteModel::findOrFail($id);
        $model->weekdayDesc = $this->getWeekDay($model->weekday);
        return \View::make('commute.detail', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = CommuteModel::findOrFail($id);
        //周次
        $weekThes = $this->weekThes();
        //周几
        $weekDays = $this->weekDays();

        //入职年份
        $yearThes = $this->yearThes();

        return \view::make('commute.edit', compact('weekThes', 'weekDays', 'model', 'yearThes'));
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
        $model = CommuteModel::findOrFail($id);

        $model->fill($request->all());
        $model->save();

        return redirect()->route('commute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CommuteModel::findOrFail($id);

        $model->softDelete();

        return redirect()->route('commute.index');
    }

    /**
     * 导出表格
     * @param Request $request
     */
    public function export(Request $request)
    {
        try {
            $download = new Download(isset($request->fileType) ? $request->fileType : 'csv', isset($request->path) ? $request->path : '');
            $dataBls = new DataBls('', isset($request->dataType) ? $request->dataType : '');
            //打印调用参数信息
            $download->with([
                'Timestamp' => 'Created_at: '. date("Y-m-d H:i:s"),
                'url' => $request->url(),
                'Queries' => $request->all(),
            ]);

            //开启过期机制
            set_time_limit(0);

            //导出的结果集拼接
            $res = CommuteModel::all()->toArray();
            count($res)>0 && $download->with("共计导出：". count($res). "条");
            $dataBls->setData($res);
            $dataBls->setPrefix('db_m2016.t_commute');
            $download->with($dataBls->parse());
            dd($download->getData());
            $download->append();
            $download->free();

            return $download->getStorage($download->getMd5());
        } catch(\Exception $e) {
            $msg = ExceptionConst::format([ '数据导出', $e->getMessage(), $e->getFile(), $e->getLine(),$e->getCode()]);
            \Log::error($msg);
            return $msg;
        }
    }

}
