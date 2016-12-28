@extends($layouts)

@section('title')
    回顾过往
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>回顾过往</h1>
@endsection

@section('content')
    @include('backward.search')

    @if(isset($searchData['y']) && $searchData['y'])
        @include('backward.partials.20'. substr($searchData['y'], -2))
    @endif
    
    <p>
        {!! HTML::image('img\summarize.png', '暂无图片') !!}
    </p>
    
@endsection

@section('script')
    <script>

    </script>
@endsection