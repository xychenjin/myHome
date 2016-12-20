@extends($layouts)

@section('title')
    测试：导出数据库成功
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 class="text-center">数据导出</h1>
@endsection

@section("content")
    <div class="container">

        <div class="row">
            {!! link_to_route('download.db', '返回') !!}
        </div>

        <div class="form-group-lg" >
            <h3 class="text-success" style="font-family: 华文细黑;color:red"><small style="color:green;">导出</small>&nbsp;成功！</h3>

            <!--打印错误输出信息-->
            {!! $errors->first('errorsMsg', '<div class="text-danger">:message</div>') !!}

            <div class="row">
                <label class="col-sm-2">&nbsp;</label>
                {!! link_to_route('logs', '查看错误日志', []) !!}
            </div>

            @include('download.partials.share', ['showKey' => true])
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection