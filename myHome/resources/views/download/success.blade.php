@extends($html)

@section('title')
    测试：导出数据库成功
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 class="text-center">导出成功</h1>
@endsection

@section("content")
    <div class="container">

        <div class="line">
            {!! $errors->first('error', '<div class="text-danger">:message</div>') !!}
        </div>

        <div class="text-center success" style="margin-top: 200px;">
            <p>下载成功！</p>
            <span>文件：{!! HTML::link($file, $file, ['target'=>'_blank'], '') !!}</span>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection