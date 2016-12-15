@extends($html)

@section('title')
    测试：编辑
@endsection

@section('style')

@endsection

@section('content')
    <div class="text-center">
        <h1>编辑</h1><small>{!! link_to_route('commute.index', '返回') !!}</small>
    </div>
    <div class="container">
        <div class="form-horizontal">

            @include('commute.form')

        </div>
    </div>
@endsection
