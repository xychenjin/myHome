<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/9/22
 * Time: 11:50
 */

?>

<!doctype>
<html>
<head>
    <title>验证-非法关键字</title>
    <meta charset="utf-8" />
    <style>
        .text-center{margin: 0 auto;padding: 180px 350px;}
        input[name=q]{height: 44px;width: 550px;padding: 12px 8px;}
        input[name=submit]{height: 44px;width: 65px;font-size: 16px;margin-left: 15px;border: 0;color: #00acd6;border-radius:5px }
        input[name=submit]:hover{color:#fff9e5;cursor: pointer;background: #ffaf0f}
        /*.error_msg{color:red;}*/
        span.error_msg{display: block}
        .line{display: inline-block;width: 100%;}
    </style>
</head>

<body>
<div class="text-center">
    {{--{!! Form::open(['method' => 'GET']) !!}--}}
    <span id="error_msg" class="error_msg">{!! $error ? htmlspecialchars_decode($error) : '' !!}</span>
    <div class="line table-row">
        <input type="checkbox" name="code[]" value="1" id="err_200" />
        <label for="err_200">200 Ok</label>

        <input type="checkbox" name="code[]" value="1" id="err_302" />
        <label for="err_302">302 url not existed</label>

        <input type="checkbox" name="code[]" value="1" id="err_403" />
        <label for="err_403">403 forbidden</label>

        <input type="checkbox" name="code[]" value="1" id="err_404" />
        <label for="err_404">404 not found</label>

        <input type="checkbox" name="code[]" value="1" id="err_500" />
        <label for="err_500">500 internal server error</label>
    </div>

    <div class="line table-row">
        <input data-id="testCode" data-role="" id="testCode2" type="button" value="data 测试" onclick="alert($(this).data('rol2e') == this.id )"/>
        <del>aaaaaa</del>
    </div>

    <div class="line table-row">
        <input type="text" name="q" value="{{ $q }}" id="" placeholder="输入文字" />
        <input type="submit" name="submit" value="检验" />
    </div>
        <textarea id="textArea" name="q-t" placeholder="输入一段文字" style="display: none;">

        </textarea>
    {{--{!! Form::close() !!}--}}
</div>

<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
<script>
    $("input[type=submit]").click(function(){
       try {
           var data = $( ":input" ).serializeArray();
           $.ajax({
               url: "{{ route('http.code.post.ajax') }}",
               data: data,
               type: 'POST',
               success: function(res) {
                   if ( res.code != '0') {
                       alert('请求失败');
                       return false;
                   }else
                       alert('请求成功');
                   return true;
               },
               dataType: 'json',
               error: function (jqXHR, textStatus, errorThrown) {
                   /*弹出jqXHR对象的信息*/
//                   alert(jqXHR.responseText);
//                   alert(jqXHR.status);
//                   alert(jqXHR.readyState);
//                   alert(jqXHR.statusText);
//                   /*弹出其他两个参数的信息*/
//                   alert(textStatus);
//                   alert(errorThrown);
//                   console.log(jqXHR.status);
//                   console.log(jqXHR.statusText);
                   alert(jqXHR.status + jqXHR.statusText);
               }
           }) ;

       } catch (e) {
           alert(e.message);
       }
    });
</script>
</body>
</html>