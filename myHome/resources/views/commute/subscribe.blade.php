@extends($layouts)

@section('title')
    测试：补签
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>补签</h1>
@endsection

@section('content')
    <div class="container">
        <div class="form-horizontal">
            @include('commute.partials.form')
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function(){

        });
    </script>
@endsection
