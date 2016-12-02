@extends($html)

@section('title')
    测试：导出数据库至指定文件
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 class="text-center">下载数据库并导出</h1>
@endsection

@section("content")
    <div class="container">

        <div class="line"></div>
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
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                    {!! Form::button('获取列表', ['class'=>'btn btn-default', 'id'=>'getList'])!!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">导出类型：</label>
                <div class="col-sm-10">
                    {!! Form::select('type', ['json'=>'.json', 'sql'=>'.sql', 'txt'=>'.txt', 'csv'=>'.csv'],null
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
                alert('参数错误');
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

        $("#getList").click(function() {
            var data = {
                hostName:$("#hostName").val(),
                hostPort:$("#hostPort").val(),
                userName:$("#userName").val(),
                password:$("#password").val()
            };
            if ($.trim(data.hostName) == '' || $.trim(data.userName) == '' ) {
                alert('参数错误');
                return false;
            }

            $.ajax({
                url:"{{ route('download.getList') }}",
                dataType:"json",
                method:"post",
                data:data,

                success:function(res) {
                    if (res.code) {
                        alert(res.msg);
                    } else {
                        $("#db-list").children().remove();
                        $("#db-list").append($(res.data.db));
                    }
                }
            });
        });

    })
</script>
@endsection