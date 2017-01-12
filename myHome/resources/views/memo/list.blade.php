@extends($layouts)
@section('content-header')
    <h1>学习记录</h1>
@endsection

@section('content')
    <label>Basic篇</label>
    <ul class="col-sm-offset-2">
        <li><a href="{!! route('memo.study', ['name' => 'basic']) !!}#id1">如何启动redis服务？</a></li>
        <li><a href="{!! route('memo.study', ['name' => 'basic']) !!}#id2">如何查找linux文件？</a></li>
        <li><a href="{!! route('memo.study', ['name' => 'basic']) !!}#id3">如何查看端口Windows和Linux，并查找进程，服务？</a></li>
    </ul>

    <label>Git篇</label>
    <ul class="col-sm-offset-2">
        <li><a href="{!! route('memo.study', ['name' => 'git']) !!}#id1">常用Git命令有哪些？</a></li>
    </ul>

@endsection