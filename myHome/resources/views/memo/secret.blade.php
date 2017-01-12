@extends($layouts)

@section('title')
    备忘录
@endsection

@section('content-header')
    <h1>私密列表</h1>
@endsection

@section('content')
    @if(isset($answered) && $answered == true)
        <div class="row">
            {!! link_to_route('memo.clear' , '清除密码', [], ['class' => 'btn btn-default']) !!}
        </div>
        <nav>账号列表</nav>
        <ul >
            <li>
                <span>用户名：user1</span>&nbsp;<span>密码：123456</span>
            </li>
        </ul>
    @else
        @include('memo.partials.ask')
    @endif

@endsection