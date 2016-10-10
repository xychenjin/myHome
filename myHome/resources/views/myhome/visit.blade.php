<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/9/14
 * Time: 11:45
 */

?>

<!doctype>
<html>
    <head>
        <title>验证-非法关键字</title>
        <meta charset="utf-8" />
        <style>
            .text-center{margin: 0 auto;padding: 200px 450px;}
            input[name=q]{height: 44px;width: 320px;padding: 12px 8px;}
            input[name=submit]{height: 44px;width: 65px;font-size: 16px;margin-left: 15px;border: 0;color: #00acd6;border-radius:5px }
            input[name=submit]:hover{color:#fff9e5;cursor: pointer}
            /*.error_msg{color:red;}*/
            span.error_msg{display: block}
            .line{display: inline-block;}
        </style>
    </head>

<body>
    <div class="text-center">
        {!! Form::open(['method' => 'GET']) !!}
        <span id="error_msg" class="error_msg">{!! $error ? htmlspecialchars_decode($error) : '' !!}</span>
        <div class="line">
            <input type="text" name="q" value="{{ $q }}" id="" placeholder="输入文字" />
            <input type="submit" name="submit" value="检验" />
        </div>
        <textarea id="textArea" name="q-t" placeholder="输入一段文字" style="display: none;">

        </textarea>
        {!! Form::close() !!}
    </div>
</body>
</html>