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

            {{--<div class="form-group">--}}
                {{--<label class="col-sm-2 control-label">&nbsp;</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--{!! Form::button('获取列表', ['class'=>'btn btn-default', 'id'=>'getDb'])!!}--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="form-group">
                <label class="col-sm-2 control-label">存放目录：</label>
                <div class="col-sm-10">
                    {!! Form::text('path', '', ['class'=>'form-control', 'size'=>100, 'id'=>'path']) !!}
                    {!! Form::button('选择目录', ['class'=>'btn btn-default', 'id'=>'getDb', 'onclick' => "browseFolder('path')"])!!}
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
                if ($.trim(data.hostName) == '' || $.trim(data.userName) == '' ) {
                    alert('输入参数错误');
                    return false;
                }

                $.ajax({
                    url:"{{ route('download.getTb') }}" + "?db=" + $(this).val(),
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
                                    .bind('click', bindCheckAll());

                        }
                    }
                });
            } else {
                if ($("#tb_" + $(obj).val()).length)
                    $("#tb_" + $(obj).val()).remove();
            }

        });
    }

    function bindCheckAll() {
        $(".checkAll").bind('click', function () {
            var obj = this;
            var check = $(obj).data('check');
            if (check) {
                $(obj).parent().parent().children().find("[type=checkbox]").each(function(){
                    $(this).attr("checked",false);
                });
                $(obj).data('check', false);
                $(obj).html('全选');
            } else {
                $(obj).parent().parent().children().find("[type=checkbox]").each(function(){
                    $(this).attr("checked",true);
                });
                $(obj).data('check', true);
                $(obj).html('取消');
            }
        });
    }

    function browseFolder(path) {
        try {
            var Message = "\u8bf7\u9009\u62e9\u6587\u4ef6\u5939"; //选择框提示信息

            var xmlHttp;

            //判断浏览器是否支持ActiveX控件
            if(window.ActiveXObject){
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            else if(window.XMLHttpRequest){
                xmlHttp = new XMLHttpRequest()
            }

            var Folder = xmlHttp.BrowseForFolder(0, Message, 64, 17); //起始目录为：我的电脑
            //var Folder = Shell.BrowseForFolder(0, Message, 0); //起始目录为：桌面
            if (Folder != null) {
                Folder = Folder.items(); // 返回 FolderItems 对象
                Folder = Folder.item(); // 返回 Folderitem 对象
                Folder = Folder.Path; // 返回路径
                if (Folder.charAt(Folder.length - 1) != "\\") {
                    Folder = Folder + "\\";
                }
                document.getElementById(path).value = Folder;
                return Folder;
            }
        }
        catch (e) {
            alert(e.message);
        }
    }
</script>
@endsection