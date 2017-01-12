@extends($layouts)

@section('title')
    备忘录
@endsection

@section('style')
    <meta name="keywords" content="基础命令, Linux, Windows, 服务, 进程, 查找文件" />
@endsection

@section('content-header')
    <h1>Basic篇<small>{!! link_to_route('memo.index','返回', []) !!}</small></h1>
@endsection

@section('content')
    <ul class="col-sm-offset-2">
        <li><a href="#id1">如何启动redis服务？</a></li>
        <li><a href="#id2">如何查找linux文件？</a></li>
        <li><a href="#id3">如何查看端口Windows和Linux，并查找进程，服务？</a></li>
    </ul>

    <div class="form-horizontal panel-body">
        <!-- 如何启动redis服务 -->
        <div class="form-group " id="id1">
            <h4>如何启动redis服务</h4>

            <div class="row col-md-10 ">
                <label class="text-success">下载客户端</label>
                <p class="text-red col-md-offset-1">
                    <a
                            href="https://github-cloud.s3.amazonaws.com/releases/11892946/63209fb0-6b74-11e6-8a0a-fbac7b27d3c1.exe?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAISTNZFOVBIJMK3TQ%2F20170110%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20170110T071635Z&X-Amz-Expires=300&X-Amz-Signature=2cf18b53968480909a3814a502d32dd1b70e1871f7efed5e4ade401f25f2e70a&X-Amz-SignedHeaders=host&actor_id=15082661&response-content-disposition=attachment%3B%20filename%3Dredis-desktop-manager-0.8.8.384.exe&response-content-type=application%2Foctet-stream">redis客户端</a>
                </p>
                <pre class="bg-black-gradient"><span class="text-danger">composer require </span><span class="text-yellow"> predis/predis </span><span class="text-blue">^1.0</span> </pre>
            </div>
            <div class="row col-md-10 ">
                <label class="text-success">启动Redis服务：CMD</label>
                <pre class="bg-black-gradient ">
                    <span class="text-green">d: & cd D:\wamp\Redis\64bit</span>
                    <span class="text-yellow">redis-server.exe</span><span class="text-danger"> redis.conf</span></pre>
            </div>
            <div class="row col-md-10 ">
                <label class="text-success">开启端口</label>
                <pre class="bg-black-gradient "><span class="text-yellow">redis-cli.exe</span><span class="text-danger"> -h </span><span > 127.0.0.1</span><span class="text-danger"> -p</span><span > 6379</span></pre>
            </div>
            <div class="row col-md-10 " >
                <label class="text-success">运行</label>
                <pre class="bg-black-gradient ">
                   <span class="text-yellow"> redis-desktop-manager-0.8.8.384.exe</span></pre>
            </div>
        </div>

        <div class="form-group" id="id2">
            <h4>如何查找Linux文件</h4>
            <div class="row col-md-10  ">
                <label>方法1：find / name aa.txt</label>
                <pre class="bg-black-gradient ">
                    <span class="text-danger">find</span><span class="text-blue"> [目录]</span><span class="text-danger"> name</span><span class="text-blue"> [表达式]</span>
                </pre>
            </div>

            <div class="row col-md-10 ">
                <label>其他：locate|whereis|which|type aa.txt</label>
                <pre class="bg-black-gradient ">
                    <span class="text-danger">locate</span><span class="text-blue"> [文件名]</span>
                    <span class="text-danger">或 whereis</span><span class="text-blue"> [文件名]</span>
                    <span class="text-danger">或 which</span><span class="text-blue"> [文件名]</span>
                    <span class="text-danger">或 type</span><span class="text-blue"> [文件名]</span>
                </pre>
            </div>
        </div>

        <div class="form-group" id="id3">
            <h4>如何查看端口Windows和Linux，并查找进程，服务</h4>
            <div class="row col-md-10 ">
                <label>On Windows：</label>
                <pre class="bg-black-gradient">
                <span class="text-blue">查找端口：</span><span class="text-danger"> netstat -ano|findstr</span><span> 80</span>
                <span class="text-blue">查找程序：</span><span class="text-danger">tasklist|findstr /im </span><span class="text-yellow">httpd.exe</span>
                <span class="text-blue">结束进程：</span><span class="text-danger">taskkill /pid /f </span><span>80</span>
                </pre>
            </div>

            <div class="row col-md-10 ">
                <label>On Linux：</label>
                <pre class="bg-black-gradient">
                <span class="text-blue">查找端口：</span><span class="text-danger"> netstat -apn | grep </span><span> 80</span>
                <span class="text-blue">查找程序：</span><span class="text-danger">ps -aux | grep </span><span class="text-yellow">httpd</span>
                <span class="text-blue">结束进程：</span><span class="text-danger">kill -9</span><span> 80</span>
                </pre>
            </div>
        </div>
    </div>

@endsection