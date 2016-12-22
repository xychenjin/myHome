@if(isset($model))
    {!! Form::open(['url' => route('commute.update', ['id' => $model->id]), 'method' => 'post']) !!}
@elseif(isset($subscribe) && $subscribe)
    {!! Form::open(['url' => route('commute.subscribe.store'), 'method' => 'put']) !!}
@else
    {!! Form::open(['url' => route('commute.store'), 'method' => 'put']) !!}
@endif

@section('style')
    {{--<link href="{{ getHost().'/packages/pingpong/admin/adminlte/css/timepicker/bootstrap-timepicker.css' }}"/>--}}
    {{--<link href="{{ getHost().'/packages/pingpong/admin/adminlte/css/datepicker/datepicker3.css' }}"/>--}}
@endsection

@if(isset($subscribe) && $subscribe)
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">补签日期:</label>
            <div class="col-sm-10">
                {!! Form::select('subscribeDate', $subscribeDates, null , ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
                {!! $errors->first('subscribeDate', '<div class="text-danger">:message</div>') !!}
            </div>
        </div>
    </div>
@endif

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">出发时间:</label>
        <div class="col-sm-10">
            {!! Form::text('start_at', isset($model) ? $model->start_at : null , ['class' => 'form-control moment']) !!}
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
            {!! $errors->first('start_at', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">公司打卡时间:</label>
        <div class="col-sm-10">
            {!! Form::text('clock_at', isset($model) ? $model->clock_at : null , ['class' => 'form-control datetime']) !!}
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
            {!! $errors->first('clock_at', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">下班打卡时间:</label>
        <div class="col-sm-10">
            {!! Form::text('clock_off_at', isset($model) && $model->clock_off_at > 0 ? $model->clock_off_at : null , ['class' => 'form-control datetime']) !!}
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
            {!! $errors->first('clock_off_at', '<div class="text-danger">:message</div>') !!}
        </div>
    </div>
</div>

@if(isset($model))
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">一年中的第几天:</label>
            <div class="col-sm-10">
                {!! Form::text('day_th', isset($model) ? $model->day_th : null , ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
                {!! $errors->first('day_th', '<div class="text-danger">:message</div>') !!}
            </div>
        </div>
    </div>
@endif

@if(isset($model))
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">打卡日期:</label>
            <div class="col-sm-10">
                {!! Form::text('day', isset($model) ? $model->day : null , ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
                {!! $errors->first('day', '<div class="text-danger">:message</div>') !!}
            </div>
        </div>
    </div>
@endif

@if(isset($model))
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">周次:</label>
            <div class="col-sm-10">
                {!! Form::select('week_th', $weekThes, isset($model) ? $model->week_th : date('W'), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
                {!! $errors->first('week_th', '<div class="text-danger">:message</div>') !!}
            </div>
        </div>
    </div>
@endif

@if(isset($model))
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">周几:</label>
            <div class="col-sm-10">
                {!! Form::select('weekday', $weekDays, isset($model) ? $model->weekday : date('w') , ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
@endif

@if(isset($model))
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">年份:</label>
            <div class="col-sm-10">
                {!! Form::select('year_th', $yearThes, isset($model) ? $model->year_th : date('Y') , ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
@endif

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">上车时间:</label>
        <div class="col-sm-10">
            {!! Form::text('boarding_at', isset($model) ? $model->boarding_at : null , ['class' => 'form-control moment']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">交通工具:</label>
        <div class="col-sm-10">
            {!! Form::text('tools', isset($model) ? $model->tools : null , ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">备注:</label>
        <div class="col-sm-10">
            {!! Form::textarea('desc', isset($model) ? $model->desc : null , ['class' => 'form-control', 'placeholder' => '天气、事由、路况等说明']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
            {!! Form::submit(isset($model) ? '更新': '保存', ['class' => 'btn btn-primary']) !!}
            @if(isset($model))
            {!! Form::hidden('day', isset($model) ? $model->day: date('Y-m-d')) !!}
            @endif
        </div>
    </div>
</div>

{!! Form::close() !!}

@section('script')
    {{--<script src="{{ getHost().'/packages/pingpong/admin/adminlte/js/plugins/timepicker/bootstrap-timepicker.js' }}" type="text/javascript" charset="utf-8"></script>--}}
    {{--<script src="{{ getHost().'/packages/pingpong/admin/adminlte/js/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js' }}" type="text/javascript" charset="utf-8"></script>--}}
    {{--<script src="{{ getHost().'/packages/pingpong/admin/adminlte/js/plugins/datepicker/bootstrap-datepicker.js' }}" type="text/javascript" charset="utf-8"></script>--}}
    <script>
        $(document).ready(function() {
//            $('.moment').timepicker({
//                defaultTime:'current',
//                showSeconds:false,
//                disableFocus:false
//            });
//
//            $('.date').datepicker({
//                todayBtn:true,
//                format: "yyyy年mm月dd日",
//                weekStart: 1
//            });
        });
    </script>
@endsection