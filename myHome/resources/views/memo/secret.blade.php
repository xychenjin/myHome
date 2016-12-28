@extends($layouts)

@section('title')
    备忘录
@endsection

@section('content')
    @if(isset($answered) && $answered == true)
        <pre >
            <span>账号列表</span>
        </pre>
    @else
        @include('memo.partials.ask')
    @endif

@endsection