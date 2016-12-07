@extends($html)

@section('title')
    测试：导出数据库至指定文件中
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 class="text-center">数据库导出并下载</h1>
@endsection

@section("content")
    <div class="container">

        <div class="line">
            {!! $errors->first('error', '<div class="text-danger">:message</div>') !!}
        </div>

        {!! Form::open(['route' => 'download.dbDown', 'method' => 'put']) !!}
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">主机：</label>
                <div class="col-sm-10">
                {!! Form::text('hostName', "127.0.0.1", ['class'=>'form-control', 'placeholder'=>'127.0.0.1', 'id'=>'hostName']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">端口（默认）：</label>
                <div class="col-sm-10">
                    {!!Form::text('hostPort', "3306", ['class'=>'form-control', 'placeholder'=>'3306', 'id'=>'hostPort']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">用户名：</label>
                <div class="col-sm-10">
                    {!! Form::text('userName', "jimm", ['class'=>'form-control', 'placeholder'=>'', 'id'=>'userName']) !!}
                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码：</label>
                <div class="col-sm-10">
                    {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'', 'id'=>'password', 'value'=>'123456']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                {!! Form::button('测试连接', ['class'=>'btn btn-default', 'id'=>'testConnection'])!!}
                    {!! Form::button('获取列表', ['class'=>'btn btn-default', 'id'=>'getDb'])!!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">数据库列表：</label>
                <div class="col-sm-10" id="db-list"></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">表：</label>
                <div class="col-sm-10" id="tb-list"></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">存放目录：</label>
                <div class="col-sm-10">
                    {!! Form::text('path', $path ? $path : '', ['class'=>'form-control', 'size'=>100, 'id'=>'path']) !!}
                    {{--{!! Form::button('选择目录', ['class'=>'btn btn-default', 'id'=>'getDb', 'onclick' => "browseFolder('path')"])!!}--}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">导出文件类型：</label>
                <div class="col-sm-10">
                    {!! Form::select('fileType', ['json'=>'.json', 'sql'=>'.sql', 'txt'=>'.txt', 'csv'=>'.csv'],null
                        , ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">导出表结构：</label>
                <div class="col-sm-10">
                    <div class="row">
                        {!! Form::radio('structure', '1', true, array('class' => 'col-sm-1 ', 'id'=> 'need-yes')) !!}
                        <label class="col-sm-2 " for="need-yes">需要</label>
                    </div>
                    <div class="row">
                        {!! Form::radio('structure', '0', false, array('class' => 'col-sm-1 ', 'id'=> 'need-no')) !!}
                        <label class="col-sm-2 " for="need-no">不需要</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">导出结果：</label>
                <div class="col-sm-10">
                    {!! Form::select('dataType', ['create'=>'表插入型(INSERT)', 'select'=>'仅结果集'], null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">条数限制：（默认不限制）</label>
                <div class="col-sm-10">
                    {!! Form::text('limit', $limit ? $limit : '0', ['class'=>'form-control', 'size'=>100, 'id'=>'limit']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">排序规则：</label>
                <div class="col-sm-10">
                    {!! Form::select('orderBy', [ 'id-asc'=>'ID顺序', 'id-desc'=>'ID倒序',
                                                'updated-asc'=>'更新时间顺序', 'updated-desc'=>'更新时间顺序',
                                                'id-asc_updated-asc'=>'ID,更新时间顺序', 'id-desc_updated-desc'=>'ID,更新时间倒序',
                                                'id-asc_updated-desc'=>'ID顺序,更新时间倒序', 'id-desc_updated-asc'=>'ID顺序,更新时间倒序'
                                               ], 'id-desc'
                        , ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                {!! Form::submit( '导出', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>

        </div>
        {!! Form::close() !!}
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
                                .bind('click', bindClick());
                    }
                }
            });
        });
    });

    function bindClick(){
        $("[class^=db_]").bind('click', function(){
            var obj = this;
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
                                    .bind('click', bindCheckAll(db));

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

</script>
@endsection