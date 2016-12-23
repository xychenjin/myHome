@extends($layouts)
<?php
$id = str_random();
?>
@section('title')
    测试：打卡记录表
@endsection

@section('style')

@endsection

@section('content-header')
   <h1>打卡记录表</h1>
@endsection

@section('content')

    <div class="container">
        {{--<div class="form-horizontal">--}}
            <div class="form-group">
                <div class="row text-right">
                    {!! link_to_route('commute.create', '打卡',[], ['class' => 'btn btn-warning']) !!}
                        <a data-toggle="modal" href="#popup-{!! $id !!}" class='btn btn-success'>
                            导出文件
                        </a>
                </div>
            </div>

            @include('commute.search')

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>周次</th>
                        <th>打卡日期</th>
                        <th>出发时间</th>
                        <th>到公司打卡时间</th>
                        {{--<th>下班打卡时间</th>--}}
                        <th>周几</th>
                        <th>天次</th>
                        <th>上车时间</th>
                        <th>工具</th>
                        <th>备注说明</th>
                        <th>打卡人</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{!! $item->id !!}</td>
                            <td>{!! $item->weekTh !!}</td>
                            <td>{!! link_to_route( 'commute.detail', $item->day, ['id' => $item->id],['class' => $item->is_subscribe ? 'text-warning' : '']) !!}</td>
                            <td>{!! $item->start_at !!}</td>
                            <td>{!! $item->clock_at !!}</td>
                            {{--<td>{!! $item->clock_off_at > 0 ? $item->clock_off_at : null !!}</td>--}}
                            <td>{!! $item->weekdayDesc !!}</td>
                            <td>{!! $item->day_th ? '第'. $item->day_th .'天': null !!}</td>
                            <td>{!! $item->boarding_at > 0 ?  $item->boarding_at: null !!}</td>
                            <td>{!! $item->tools !!}</td>
                            <td>{!! $item->desc !!}</td>
                            <td>{!! !is_null($item->user()->first()) ? $item->user()->first()->name : null !!}</td>
                            <td>{!! $item->created_at !!}</td>
                            <td>
                                {!! HTML::link(route('commute.edit',['id' => $item->id]), '编辑') !!} &middot;
                                <a data-toggle="modal" href="#modal-delete-{!! $item->id !!}" class="btn btn-danger">
                                    删除
                                </a>
                                <div id="modal-delete-{!! $item->id !!}" class="modal text-left fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            {!! Form::open(['method' => 'get', 'route' => ["commute.destroy", $item->id]])!!}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h1 class="modal-title">删除数据</h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    删除将不可见，不可编辑，确认删除数据?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary delete">确认</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div id="popup-{!! $id !!}" class="modal text-left fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h1 class="modal-title">
                                导出数据到文件
                            </h1>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">导出文件类型：</label>
                                    <div class="col-sm-10">
                                        {!! Form::select('fileType', ['json'=>'.json', 'sql'=>'.sql', 'txt'=>'.txt', 'csv'=>'.csv'],null
                                            , ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-10">
                                        {!! $errors->first('fileType', '<div class="text-danger">:message</div>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">存放目录：</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('path', isset($path )? $path : '', ['class'=>'form-control', 'size'=>100, 'id'=>'path']) !!}
                                        {{--{!! Form::button('选择目录', ['class'=>'btn btn-default', 'id'=>'getDb', 'onclick' => "browseFolder('path')"])!!}--}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-10">
                                        {!! $errors->first('path', '<div class="text-danger">:message</div>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">导出结果：</label>
                                    <div class="col-sm-10">
                                        {!! Form::select('dataType', $dataType, null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-10">
                                        {!! $errors->first('dataType', '<div class="text-danger">:message</div>') !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-primary" id='confirm-{!! $id !!}'>确认</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        </div>
                        {!! Form::close() !!}
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="text-center">
                {!! $data->render() !!}
            </div>
        </div>
    {{--</div>--}}
@endsection

@section('script')
    <script>
        $(function(){
            $("a[id^=confirm-]").click(function() {
                var params = {
                    fileType: $("select[name=fileType]").val(),
                    path:$("input[name=path]").val(),
                    dataType:$("select[name=dataType]").val()
                };
                window.location.href = "{!! route('commute.export') !!}" + '?' + $.param(params);
            });

            $(".delete").click(function(){
                $(this).attr('disabled', true);
            });

            if ($('.delete').attr('disabled')) $('.delete').removeAttr('disabled');
        });
    </script>
@endsection
