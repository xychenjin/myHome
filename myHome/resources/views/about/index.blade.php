@extends($layouts)

@section('title')
    关于本系统
@endsection

@section('style')
    <style>

    </style>
@endsection

@section('content-header')
    <h1>关于本系统</h1>
@endsection

@section('content')
    <div class="form-group">
        <p class="text-success">
            本系统采用laravel 5.1版本框架开发，配合Composer,Git等版本工具管理，内置了bootstrap静态样式和文件。<br>
            <span>初衷是用于公司中，闲暇时间的自我学习，任务紧张时的代码调试所用，所以应该会看到有很多的垃圾代码。
                但为了生活和记录所用，更方便的记录生活的点点滴滴，更加站在个人需求的角度上来开发，Do what you want!
                <br></span>
            <span>截至2016年12月底，基本功能、大致框架已搭建完毕，细节及优化部分仍待开发...<br></span>
            <span>后续功能待开发中......</span>
        </p>

        <label>项目清单列表以及说明：</label>
        <ul class="text-success">
            <li>用户管理：该模块沿用laravel 组件Pingpong后台管理，保存和展示了用于系统登录的用户信息，另外还限制了角色和权限，增添了几分人性的色彩。</li>
            <li>考勤管理：该模块记录和展示了每天上班打卡，出发路程等细节信息，主要功能是打卡、补签和记录导出，方便回顾和排查考勤记录。不再依赖bbb.txt文件来管理</li>
            <li>学车管理：记录了学习驾照的心路历程，包括报名、考试、练车等全部的过程。每次练车了要记着来添加记录哦！</li>
            <li>转账管理：记录了个人生活中的转账记录，涵盖网银转账，ATM，支付宝，微信等渠道。</li>
            <li>卡管理：卡记录表，可以发自定义卡，也可以记录银行卡等敏感信息。</li>
            <li>健身管理：健身记录表，每次锻炼的记录，评价等。</li>
            <li>红包管理：模拟的支付宝、微信发红包系统，系统较小，暂不支持大批量，交互性较强的场景。</li>
            <li>数据库管理：12月中旬左右开发完毕，管理本地数据库，并支持数据库数据导出和备份等。</li>
            <li>备忘录：学习、行程，重要事项的记录。</li>
            <li>回顾过往：回顾这些年（2010起）来，在外面打拼的心路历程，感悟，进步，心得。</li>
            <li>关于本系统：介绍说明性描述本系统的由来，初衷。</li>
        </ul>
    </div>
@endsection

@section('script')
    <script>
        $(function(){

        });
    </script>
@endsection

