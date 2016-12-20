@extends($layouts)

@section('title')
    测试：查看历史记录
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 >查看历史记录 <small>{!! link_to_route('download.db', '返回') !!}</small></h1>
@endsection

@section("content")

        <div class="form-group-lg" >

            @include('download.partials.share', ['showKey' => false, 'showLogs' => true, 'delete'=>true])
        </div>


@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection