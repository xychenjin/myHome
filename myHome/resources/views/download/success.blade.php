@extends($html)

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

        <div class="line">
            {!! link_to_route('download.db', '返回') !!}
        </div>

        <div class="form-group-lg" >
            <h3 class="text-success" style="font-family: 华文细黑;color:red"><small style="color:green;">导出</small>&nbsp;成功！</h3>

            @if($files)
                <div class="row">
                    <label class="col-sm-2">文件目录：</label>
                    <div class="col-sm-10">
                        @foreach($files as $item)
                            <div class="row">{!! HTML::link($storagePath. '/' .$item, $item, ['target'=>'_blank'], '') !!}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="row">
                <label class="col-sm-2">文件地址：</label>
                {!! HTML::link($file, $file, ['target'=>'_blank'], '') !!}
            </div>
            <div class="row">
                <label class="col-sm-2">Key存储地址：</label>
                {!! link_to_route('download.keyDetail', $jsonFile, [ 'type'=>$request->type, 'md5'=> $request->md5]) !!}
            </div>

            <div class="row">
                <label class="col-sm-2">查看错误日志：</label>
                {!! link_to_route('logs', $jsonFile, [ 'type' => $request->type, 'md5'=> $request->md5]) !!}
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