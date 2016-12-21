@extends($layouts)

@section('title')
    测试：导出数据库至指定文件中
@endsection

@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
    <style>

    </style>
@endsection

@section('content-header')
    <h1 >MySql数据库导出并下载</h1>
@endsection

@section("content")

        {!! Form::open(['route' => 'download.dbDown', 'method' => 'put']) !!}
        {{--<div class="form-horizontal">--}}
            <div class="form-group">
                <div class="row">
                    <label class="col-md-2 control-label">主机：</label>
                    <div class="col-sm-10">
                        {!! Form::text('hostName', "127.0.0.1", ['class'=>'form-control', 'placeholder'=>'127.0.0.1', 'id'=>'hostName']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('hostName', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-md-2 control-label">端口（默认）：</label>
                    <div class="col-sm-10">
                        {!!Form::text('hostPort', "3306", ['class'=>'form-control', 'placeholder'=>'3306', 'id'=>'hostPort']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('hostPort', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">用户名：</label>
                    <div class="col-sm-10">
                        {!! Form::text('userName', "jimm", ['class'=>'form-control', 'placeholder'=>'', 'id'=>'userName']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('userName', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">密码：</label>
                    <div class="col-sm-10">
                        {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'', 'id'=>'password', 'value'=>'123456']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('password', '<div class="text-danger">:message</div>') !!}
                        {!! $errors->first('connectionFailed', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                {!! Form::button('测试连接', ['class'=>'btn btn-default', 'id'=>'testConnection'])!!}
                    {!! Form::button('获取列表', ['class'=>'btn btn-default', 'id'=>'getDb'])!!}
                    {!! HTML::link(route('download.history'), '查看历史记录', ['target'=>'_blank'], '') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">数据库列表：</label>
                    <div class="col-sm-10" id="db-list"></div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('dbName', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">表：</label>
                    <div class="col-sm-10" id="tb-list"></div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('tbName', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">存放目录：</label>
                    <div class="col-sm-10">
                        {!! Form::text('path', $path ? $path : '', ['class'=>'form-control', 'size'=>100, 'id'=>'path']) !!}
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
                    <label class="col-sm-2 control-label">导出表结构：</label>
                    <div class="col-sm-10 row">
                        <div class="col-md-2">
                            {!! Form::radio('structure', '1', true, array('class' => 'col-sm-1 ', 'id'=> 'need-yes')) !!}
                            <label class="control-label" for="need-yes">需要</label>
                        </div>
                        <div class="col-md-2">
                            {!! Form::radio('structure', '0', false, array('class' => 'col-sm-1 ', 'id'=> 'need-no')) !!}
                            <label class="control-label" for="need-no">不需要</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('structure', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">是否导出数据：</label>
                    <div class="col-sm-10 row">
                        <div class="col-md-2">
                            {!! Form::radio('export', '1', true, array('class' => 'col-sm-1 ', 'id'=> 'export-yes')) !!}
                            <label class="control-label" for="export-yes">导出</label>
                        </div>
                        <div class="col-md-2">
                            {!! Form::radio('export', '0', false, array('class' => 'col-sm-1 ', 'id'=> 'export-no')) !!}
                            <label class="control-label" for="export-no">不导出</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('structure', '<div class="text-danger">:message</div>') !!}
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

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">单表导出条数限制：（默认不限制）</label>
                    <div class="col-sm-10">
                        {!! Form::text('limit', $limit ? $limit : '0', ['class'=>'form-control', 'size'=>100, 'id'=>'limit']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('limit', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">排序规则：</label>
                    <div class="col-sm-10">
                        {!! Form::select('orderBy', [ 'id-asc'=>'id ASC', 'id-desc'=>'id DESC',
                                                    'updated-asc'=>'updated_at ASC', 'updated-desc'=>'updated_at DESC',
                                                    'id-asc_updated-asc'=>'id ASC，updated_at ASC', 'id-desc_updated-desc'=>'id DESC，updated_at DESC',
                                                    'id-asc_updated-desc'=>'id ASC，updated_at DESC', 'id-desc_updated-asc'=>'id DESC，updated_at ASC'
                                                   ], 'id-desc'
                            , ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('orderBy', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">添加文字：</label>
                    <div class="col-sm-10">
                        {!! Form::textarea('desc', isset($desc) ? $desc : null, ['class'=>'form-control', 'placeholder'=> '导出文件中，输入自定义信息']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-sm-10">
                        {!! $errors->first('desc', '<div class="text-danger">:message</div>') !!}
                        {!! $errors->first('downloadFailed', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                {!! Form::submit( '导出', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>

        {{--</div>--}}
        {!! Form::close() !!}

        <div id="loading" style="display: none;">
            加载中..
            <img src="{!! staticUrl('recources/img/loading072.gif') !!}" mce_src="{!! staticUrl('recources/img/loading072.gif') !!}" alt="loading.." />
        </div>


@endsection

@section('script')
<script>

    $(function() {
        //测试连接
        $('#testConnection').click(function() {
            var data = {
                hostName:$("#hostName").val(),
                hostPort:$("#hostPort").val(),
                userName:$("#userName").val(),
                password:$("#password").val()
            };
            if ($.trim(data.hostName) == '' || $.trim(data.userName) == '' ) {
                alert('输入参数错误');
                return false;
            }

            $.ajax({
                url:"{{ route('download.connect') }}",
                dataType:"json",
                method:"post",
                data:data,

                success:function(res) {
                    if (res.code) {
                        alert(res.msg);
                    } else {
                        alert('连接成功!');
                    }
                }
            });
        });

        $("#getDb").click(function() {
            var data = {
                hostName:$("#hostName").val(),
                hostPort:$("#hostPort").val(),
                userName:$("#userName").val(),
                password:$("#password").val()
            };
            if ($.trim(data.hostName) == '' || $.trim(data.userName) == '' ) {
                alert('输入参数错误');
                return false;
            }

            $.ajax({
                url:"{{ route('download.getDb') }}",

                dataType:"json",
                method:"post",
                data:data,

                success:function(res) {
                    if (res.code) {
                        alert(res.msg);
                    } else {
                        $("#db-list").children().remove();
                        $("#db-list").append($(res.data.db))
                                .bind('click', bindClick())
                                .bind('click', clearDanger());
                        $("#tb-list").children().remove();

                    }
                }
            });
        });

        $("input[type=submit]").click(function() {
            $(this).attr('disabled', true);
        });

        $("input[type=submit]").attr('disabled', false);

        $("#export-yes, #export-no").on('ifClicked', function(event) {
            var p = $(this).parents('.form-group');
            var v = $(this).val();
            var show = true;
            if (v == '0') {
                show = false;
            }
            var dom = p.nextAll('.form-group');
            if (dom === undefined) return false;
            var c = parseInt(dom.length)-1;
            var n = p.nextAll('.form-group:lt('+ c +')');
            show ? n.show() : n.hide();
            return true;
        });
    });

    function bindClick(){
        $("[class^=db_]").bind('click', function(){
            var obj = this;
            var par = $(obj).parents('row').next('row').find('.text-danger');
            if (par.length) par.remove();

            if ($(this).is(':checked') ) {
                var data = {
                    hostName:$("#hostName").val(),
                    hostPort:$("#hostPort").val(),
                    userName:$("#userName").val(),
                    password:$("#password").val()
                };

                var db = $(this).val();

                if ($.trim(data.hostName) == '' || $.trim(data.userName) == '' ) {
                    alert('输入参数错误');
                    return false;
                }

                $.ajax({
                    url:"{{ route('download.getTb') }}" + "?db=" + db,
                    dataType:"json",
                    method:"post",
                    data:data,
                    success:function(res) {
                        if (res.code) {
                            alert(res.msg);
                        } else {
                            if ($("#tb_" + $(obj).val()).length)
                                $("#tb_" + $(obj).val()).remove();
                            $("#tb-list").append($(res.data.tb))
                                    .bind('click', bindCheckAll(db))
                                    .bind('click', clearDanger());

                        }
                    }
                });
            } else {
                if ($("#tb_" + $(obj).val()).length)
                    $("#tb_" + $(obj).val()).remove();
            }

        });
    }

    function bindCheckAll(db) {
        $("button[id=checkAll_" + db +"]").bind('click', function () {
            var obj = this;
            var par = $(obj).parents('.row').next('.row').find('.text-danger');
            if (par.length) par.remove();

            var check = $(obj).data('check');
            if (check) {
                $(obj).parent().parent().children().find("[type=checkbox]:checked").each(function(){
                   $(this).prop('checked', false);
                });
                $(obj).data('check', false);
                $(obj).html('全选');
            } else {
                $(obj).parent().parent().children().find("[type=checkbox]").each(function(){
                    $(this).prop('checked', true);
                });
                $(obj).data('check', true);
                $(obj).html('取消');
            }
        });
    }

    function clearDanger()
    {
        $("input[type=checkbox]").change(function() {
            var par = $(this).parents('.row').next('.row').find('.text-danger');
            if (par.length) par.remove();
        });
    }

    $("form input, form select").change(function() {
        var par = $(this).parents('.row').next('.row').find('.text-danger');
        if (par.length) par.remove();
    });
</script>

@endsection