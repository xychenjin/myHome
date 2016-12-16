@extends($layouts)

@section('title')
    测试：查看历史记录
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 class="text-center">查看历史记录</h1> {!! link_to_route('download.db', '返回') !!}
@endsection

@section("content")
    <div class="container">

        <div class="row">

            <label class="col-sm-2">&nbsp;</label>
            <p>{!! link_to_route('logs', '查看错误日志', []) !!}</p>
        </div>

        <div class="form-group-lg" >

            @include('download.partials.share', ['showKey' => false, 'showLogs' => true, 'delete'=>true])
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection