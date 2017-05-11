@extends($layouts)

@section('style')
    <style>
        b{
            color:red;
        }
    </style>
@endsection

@section('content-header')
    <h1>书库列表</h1>
@endsection

@section('content')
    <div class="form-group ">
        {!! Form::label('num', '分发次数:') !!}
        {!! Form::text('times', 10, ['class' => 'form-control'] ) !!}
        <span class="btn btn-default" id="distribute">自动分发</span>
    </div>
    <div class="panel form-group" id="container">

    </div>

    <table class="table table-hover">
        @foreach($data as $item)

        @endforeach
    </table>
@endsection

@section('script')
    <script>

        $(function () {
            $("span[id=distribute]").click(function () {
                $(this).attr('disabled', true).html('分发中..');
                $("div[id=container]").empty();
                var startNew = true;
                var start = 0;
                var total = $("input[name=times]").val();

                try {
                    var whileDistribute = window.setInterval(function () {
                        $("div[id=container]").append("<p>正在发送第 <b>" + (parseInt(start) + 1 ) + '</b> 次Ajax请求');
                        $.ajax({
                            url: "{{ route('read.distribute') }}",
                            data: {time: (parseInt(start) + 1)},
                            success: function (res) {
                                if (res.code) {
                                    $("div[id=container]").append(res.msg + "  服务器返回错误：" + res.data);
                                } else {
                                    $("div[id=container]").append(res.msg + " 已接收到服务器返回成功信息：" + res.data);
                                }
                                startNew = true;
                            },
                            timeout: 1000,
                            complete: function (XMLHttpRequest, status) {
                                if (status == 'timeout') {
                                    $("div[id=container]").append("服务器超时！");
                                }
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                if (textStatus == 'timeout') {
                                    $("div[id=container]").append("服务器超时了！");
                                }
                            },
                            dataType: 'json',
                            method: 'post'
                        });
                        $("div[id=container]").append("</p>");

                        if (start >= parseInt(total) - 1 || startNew == false) {
                            startNew = false;
                            window.clearInterval(whileDistribute);
                            $("span[id=distribute]").attr('disabled', false).html('自动分发');
                        }
                        start++;
                    }, 1000);

                } catch (e) {
                    alert(e.getErrorMessage());
                    console.info(e.getErrorMessage());
                }

            });
        });
    </script>
@endsection
