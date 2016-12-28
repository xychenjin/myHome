@extends($layouts)

@section('title')
    回顾@if(isset($y) && $y) :{!! $y.'年' !!}@endif
@endsection

@section('style')
    {!! HTML::style('css/index.css') !!}
@endsection

@section('content-header')
    <h1>@if(isset($y) && $y) {!! $y.'年' !!}@endif <small>{!! HTML::linkRoute('backward.index', '返回') !!}</small></h1>
@endsection

@section('content')
    @if(isset($y) && $y)
        @include('backward.partials.'. $y)
    @endif
@endsection

@section('script')
    <script>

    </script>
@endsection