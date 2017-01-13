@extends($layouts)

@section('title')
    测试：发红包
@endsection

@section('style')
    <style>

    </style>
@endsection

@section('content-header')
    <h1>发红包<small>返回</small></h1>
@endsection

@section('content')
    <p>
       模仿红包发放原理：随机生成金额数，谁点到多少金额，该用户的账号上金额相加。
    </p>


    @include('bonus.form')
@endsection

@section('script')
    <script>
        $(function(){

        });
    </script>
@endsection

