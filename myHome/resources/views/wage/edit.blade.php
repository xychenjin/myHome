@extends($layouts)

@section('title')
    测试：编辑
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>编辑<small>{!! link_to_route('wage.index', '返回') !!}</small></h1>
@endsection

@section('content')
    <div class="container">
        <div class="form-horizontal">

            @include('wage.form')

        </div>
    </div>
@endsection
