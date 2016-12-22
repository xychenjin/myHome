<?php

namespace App\Http\Controllers\Wage;

use App\Bls\Wage\WageBls;
use App\Consts\Wage\WageTransWayConst;
use App\Http\Controllers\Wage\Traits\WageTraits;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WageController extends Controller
{
    use WageTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = (new WageBls())->getListByPage($request->all());

        $selectedWays = array_merge(['' => '请选择'], WageTransWayConst::ways());
        $selectedDates = $this->getSelectedDates();
        $searchData = $request->all();
        ! empty($searchData['way']) && $data->appends('way', $request->get('way'));
        ! empty($searchData['startDate']) && $data->appends('startDate', $request->get('startDate'));
        ! empty($searchData['endDate']) && $data->appends('endDate', $request->get('endDate'));

        return \View('wage.list', compact('data', 'selectedWays', 'selectedDates', 'searchData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View('wage.create');
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
        return \View('wage.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return \View('wage.edit');
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
