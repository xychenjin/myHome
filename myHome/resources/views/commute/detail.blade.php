@extends($layouts)

@section('title')
    测试：打卡记录详情
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>打卡记录详情<small>{!! link_to_route('commute.index', '返回') !!}</small></h1>
@endsection

@section('content')
    <div class="container">

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>打卡日期: </label>
                    <span>{!! $model->day !!}</span>
                </div>
                <div class="col-md-4">
                    <label>周次: </label>
                    <span>{!! $model->week_th !!}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>周几: </label>
                    <span>{!! $model->weekdayDesc !!}</span>
                </div>
                <div class="col-md-4">
                    <label>天次: </label>
                    <span>{!! $model->day_th ? '第'. $model->day_th .'天': null !!}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>出发时间: </label>
                    <span>{!! $model->start_at !!}</span>
                </div>
                <div class="col-md-4">
                    <label>到公司打卡时间: </label>
                    <span>{!! $model->clock_at !!}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>上车时间: </label>
                    <span>{!! $model->boarding_at > 0 ?  $model->boarding_at: null !!}</span>
                </div>
                <div class="col-md-4">
                    <label>工具: </label>
                    <span>{!! $model->tools !!}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>备注说明: </label>
                    <span>{!! $model->desc  !!}</span>
                </div>
                <div class="col-md-4">
                    <label>打卡人: </label>
                    <span>{!! !is_null($model->user()->first()) ? $model->user()->first()->name : null !!}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>创建时间: </label>
                    <span>{!! $model->created_at  !!}</span>
                </div>
                <div class="col-md-4">
                    <label>更新时间: </label>
                    <span>{!! $model->updated_at !!}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>是否补签: </label>
                    {!! $model->is_subscribe ? "<span class='btn btn-warning'>是</span>":'<span class="btn btn-info">否</span>'  !!}
                </div>
                <div class="col-md-4">
                    <label>&nbsp; </label>
                    <span>&nbsp;</span>
                </div>
            </div>
        </div>

    </div>
@endsection