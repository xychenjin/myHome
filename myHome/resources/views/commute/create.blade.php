@extends($html)

@section('title')
    测试：添加打卡单
@endsection

@section('style')

@endsection

@section('content')
    <div class="text-center">
        <h1><strong class="text-warning">{!! date('Y年m月d日') !!}</strong></h1><small>{!! link_to_route('commute.index', '返回') !!}</small>
    </div>
    <div class="container">
        <div class="form-horizontal">

            @include('commute.form')

        </div>
    </div>
@endsection
