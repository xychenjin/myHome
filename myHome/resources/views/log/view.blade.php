<?php use Illuminate\Support\Debug\Dumper;?>
@extends($layouts)

@section('title')
    测试：查看错误日志
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 >日志列表文件</h1>
@endsection

@section("content")

        <div class="form-group">
            @foreach($files as $file)
               <p>{!! link_to_route('log.view', $file->fileFormat, ['file' => $file->fileUrl], ['target'=>'_blank']) !!}</p>
            @endforeach
        </div>


@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection

