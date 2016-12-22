@extends($layouts)

@section('title')
    测试：添加打卡单
@endsection

@section('style')

@endsection

@section('content-header')
    <h1><strong class="text-warning">{!! date('Y年m月d日') !!}</strong><small>{!! link_to_route('commute.index', '返回') !!}</small></h1>
@endsection

@section('content')

    <div class="container">
        <div class="form-horizontal">
            @if($commuted)
                <div class="form-group">
                    <div class="row">
                        <h1>^_^ 你今天已经 <strong class="text-warning">打过卡</strong> 了，请明天再来！
                            <small>{!! link_to_route('commute.subscribe', '补签', [], ['class'=>'btn btn-info']) !!}</small></h1>
                    </div>
                </div>
            @else
                @include('commute.partials.form')
            @endif

        </div>
    </div>
@endsection
