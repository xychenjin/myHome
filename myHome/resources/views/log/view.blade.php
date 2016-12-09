<?php use Illuminate\Support\Debug\Dumper;?>
@extends($html)

@section('title')
    测试：查看错误日志
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 class="text-center">日志列表文件</h1>
@endsection

@section("content")
    <div class="container">
        <div class="row text-right" style="margin-right: 20px">{!! link_to_route('download.history', '返回', ['type' => $request->type, 'md5' => $request->md5]) !!}</div>

        <div class="tab-content">
            <div class="form-group">
                @foreach($files as $file)
                    <div class="row">{!! link_to_route('log.view', $file, ['file' => $file], ['target'=>'_blank']) !!}</div>
                @endforeach
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection

