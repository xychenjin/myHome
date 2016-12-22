@extends($layouts)

@section('title')
    测试：添加
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>添加</h1>
@endsection

@section('content')
    <div class="container">
        <div class="form-horizontal">

            @include('wage.form')

        </div>
    </div>
@endsection
