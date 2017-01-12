@extends($layouts)

@section('title')
    备忘录
@endsection

@section('style')
    <meta name="keywords" content="常用命令, Git" xmlns="http://www.w3.org/1999/html"/>
@endsection

@section('content-header')
    <h1>Git篇<small>{!! link_to_route('memo.index','返回') !!}</small></h1>
@endsection

@section('content')
    <ul class="col-sm-offset-2">
        <li><a href="#id1">常用Git命令有哪些？</a></li>
    </ul>

    <div class="form-horizontal panel-body">
        <!-- 如何启动redis服务 -->
        <div class="form-group " id="id1">
            <h4>常用Git命令有哪些</h4>
            <div class="row col-md-10 ">
                <pre class="bg-black-gradient">
                    <span class="text-blue">添加文件：</span><span class="text-yellow">git add .</span>
                    <span class="text-blue">查看状态：</span><span class="text-yellow">git status</span>
                    <span class="text-blue">比较差异：</span><span class="text-yellow">git diff --cached|--stash</span><span class="text-blue">（比较缓存/stash里的差异）</span>
                    <span class="text-blue">查看日志：</span><span class="text-yellow">git log -p </span><span class="text-blue"> [hash|文件|commitMessage]</span>
                    <span class="text-blue">拉取/推送：</span><span class="text-yellow">git pull/push origin [branch分支]</span>
                    <span class="text-blue">创建分支：</span><span class="text-yellow">git branch </span><span class="text-blue">[new分支名]</span><span class="text-blue"> 或者</span><span class="text-yellow"> git checkout -b </span><span class="text-blue">[new分支名]</span>
                    <span class="text-blue">暂不提交，存入暂存区：</span><span class="text-yellow">git stash</span>
                    <span class="text-blue">暂存区列表：</span><span class="text-yellow">git stash list</span>
                    <span class="text-blue">清空暂存区列表：</span><span class="text-yellow">git stash clean</span>
                    <span class="text-blue">取出暂存区：</span><span class="text-yellow">git stash pop stash@{0}</span>
                    <span class="text-blue">查看分支：</span><span class="text-yellow">git branch</span>
                    <span class="text-blue">切换分支：</span><span class="text-yellow">git checkout [分支名]</span>
                    <span class="text-blue">丢弃本地修改：</span><span class="text-yellow">git checkout .</span>
                    <span class="text-blue">合并分支：</span><span class="text-yellow">git checkout [分支名] git merge [别的分支名]</span>
                    <span class="text-blue">查看分支：</span><span class="text-yellow">git branch -a</span>
                    <span class="text-blue">查看本地所有分支：</span><span class="text-yellow">git branch -r</span>
                    <span class="text-blue">删除分支：</span><span class="text-yellow">git branch -d [分支名]</span>
                    <span class="text-blue">强制删除分支：</span><span class="text-yellow">git branch -D [分支名]</span>
                    <span class="text-blue">提交：</span><span class="text-yellow">git commit -m ''</span>
                    <span class="text-blue">查看本地配置：</span><span class="text-yellow">git config -l </span>
                    <span class="text-blue">设置本地配置：</span><span class="text-yellow">git config user.name 'xxx' </span>
                    <span class="text-blue">查看本地全局配置：</span><span class="text-yellow">git config --global -l </span>
                    <span class="text-blue">设置本地全局配置：</span><span class="text-yellow">git config --global [user.name] 'xxx' </span>
                    <span class="text-blue">查看远程仓库：</span><span class="text-yellow">git remote -v</span>
                    <span class="text-blue">查看远程库：</span><span class="text-yellow">git remote show</span>
                    <span class="text-blue">从git中删除文件：</span><span class="text-yellow">git rm [文件或完整目录]</span>
                    <span class="text-blue">复制版本库：</span><span class="text-yellow">git clone [git版本库]</span>
                    <span class="text-blue">git初始化：</span><span class="text-yellow">git init</span>
                </pre>
            </div>

        </div>

    </div>

@endsection