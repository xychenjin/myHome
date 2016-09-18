<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>myHome Code test</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('admin::partials.style')
    @yield('style')
    <style>
        p.default{color:red;}
        p.default.disabled{color:green;}
    </style>
</head>
<body class="skin-blue fixed">

<div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
            @include('admin::partials.flashes')
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--            <h1  class="h1">抢购器1：<font class="vvv">30分00秒</font></h1>
            <h1  class="h1">抢购器2：<font class="vvv">30分00秒</font></h1>
            <h1  class="h1">抢购器3：<font class="vvv">30分00秒</font></h1>
            <h1 class="h1">抢购器4：<font class="vvv">30分00秒</font></h1>

            <button class="btn" id="run">click me</button>
            <button class="btn" id="reset">reset</button>

            <div id="show" style="background: #ffaf0f;width:100px;height:100px;font-size:16px;text-align: center;line-height: 100px">Thank you!</div>

            <button id="contains" class="">Contains</button>
            <div>John Resig</div>
            <div>George Martin</div>
            <div>Malcom John Sinclair</div>
            <div>J. Ohn</div>

            <button id="empty" class="btn">empty</button>
            <table class="table" border="1">
                <tr><td>Value 1</td><td></td></tr>
                <tr><td>Value 2</td><td></td></tr>
            </table>

            <h1>选择器测试</h1>
            <button class="toggle" id="toggle">toggle</button>
            <p class="default">显示</p>
            <p class="default disabled">隐藏</p>

            <button class="filter" id="filter">filter</button>
            <div class="filter">
                <ol><li>Hello</li></ol>
            </div>
            <div class="filter">How are you?</div>

            <button class="map" id="map">map</button>
            <p><b>Values: </b></p>
            <form>
                <input type="text" name="name" value="John"/>
                <input type="text" name="password" value="password"/>
                <input type="text" name="url" value="http://ejohn.org/"/>
            </form>

            <button class="has" id="has">has</button>
            <ul>
                <li>list item 1</li>
                <li>list item 2
                    <ul>
                        <li>list item 2-a</li>
                        <li>list item 2-b</li>
                    </ul>
                </li>
                <li>list item 3</li>
                <li>list item 4</li>
            </ul>

            <button class="clone" id="clone">clone me</button>

            <p>Hello</p><p id="selected">Hello Again</p>

            <button class="css" id="css">css</button>

            <button class="block" id="block">block me</button>
            <div class="block-me" id="block-me" style="width: 100px;height:100px;background: red;text-align: center;line-height: 100px;">block</div>

            <button class="bind" id="bind">bind me</button>

            <button class="bind-more" id="bind-more">bind more</button>

            <br/>
            <a href="http://www.baidu.com" class="preventDefault">this is a link to www.baidu.com,when I click this link,It will be prevented my Jump</a>

            <br/>
            <h2>测试数据：</h2>
            <span>['Hello', 'sir', ',', 'welcome', 'to', 'China', '!' ]</span>
            <br/>
            <span>{hello:'hello', jim: 'Jim', a: '!'}</span>
            <br/>
            <button class="each" id="each">each</button>--}}

        {{--<input type="text" id="test" name="test" value="test" class="test" />--}}
        {{--<button id="button" class="button" name="click">click me</button>--}}

        {{--<div>A div</div>--}}
        {{--<button>Get "blah" from the div</button>--}}
        {{--<button>Set "blah" to "hello"</button>--}}
        {{--<button>Set "blah" to 86</button>--}}
        {{--<button>Remove "blah" from the div</button>--}}
        {{--<p>The "blah" value of this div is <span>?</span></p>--}}

            <form>
                <div><input type="text" name="a" value="1" id="a"></div>
                <div><input type="text" name="b" value="2" id="b"></div>
                <div><input type="hidden" name="c" value="3" id="c"></div>
                <div>
                    <textarea name="d" rows="8" cols="40">4</textarea>
                </div>
                <div><select name="e">
                        <option value="5" selected="selected">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select></div>
                <div>
                    <input type="checkbox" name="f" value="8" id="f">
                </div>
                <div>
                    <input type="submit" name="g" value="Submit" id="g">
                </div>
            </form>


        {{--<a href="http://www.baidu.com" click="alert('ok?')">click me</a>--}}
        </section>
    </aside>
    <!-- /.right-side -->
</div>
<!-- ./wrapper -->

<!-- add new calendar event modal -->
@include('admin::partials.script')
<script type="text/javascript">
//    time=1799;
//    function cs(id){
//        t=parseInt(time/60);
//        s=time%60;
//        if (time <0 ){
//            return true;
//        }
//        var ids=document.getElementsByClassName('vvv');
//        for(var i=0; i<ids.length; i++){
//            ids[i].innerHTML = t+'分'+(s<10?'0'+s:s)+'秒';
//        }
//
//        time--;
//    }
//    setInterval(function(){cs();},1000);
//
//    $("#run").click(function(){
//        $("div#show:not(:animated)").animate({height:"+=20",width:"+=20",fontSize:"+=2",lineHeight:"+=20"},1000);
//
//    });
//    $("#reset").click(function(){
//       $("div#show:not(:animated)").animate({height:"100px",width:"100px",lineHeight:'100px',fontSize:"16px"},500);
//    });
//
//    $("#contains").click(function(){
//        var contains = $(".content div:contains('John')");
//
//        for(var i=0;i<contains.length;i++){
//            alert(contains[i].innerHTML);
//        }
//
//    });
//
//    $("#empty").click(function(){
////        var td = $(".table td:not(:empty)");
//        var td = $(".table td:parent");
//        for(var i=0 ; i<td.length; i++){
//            alert(td[i].innerHTML);
//        }
//    });
//
//    $("#toggle").click(function(){
//        $("p").toggleClass('disabled');
//    });
//
//    $("button[id=filter]").click(function(){
//        var ol = $("div.filter").filter(function(index){
//            return $("ol",this).length === 0;
//        });
//        for(var i =0;i<ol.length; i++){
//            alert(ol[i].innerHTML);
//        }
//    });
//
//    $("button[class=map]").click(function(){
//        var str = $("form :input").map(function(){
//            return $(this).val();
//        }).get().join(',');
//
//        if ( $(this).next('p:contains("'+str+'")').length ){
//            alert('it has existed!');
//        }else {
//            $(this).next('p').append(str);
//        }
//
//    });
//
//
//    $("button[class=has]").click(function(){
//        $("ul li").has('ul').css('background-color','red');
//    });
//
//    $("button[class=clone]").click(function(){
//        if (! $(this).next().hasClass('clone') && ! $(this).prev().hasClass('clone') ){
//            $(this).clone(true).insertAfter(this);
//        }
//    });
//
//    $("button[class=css]").click(function(){
//        alert($(this).css('color'));
//    });
//
//    $("button[class=block]").click(function(){
//       $("div[class=block-me]").css({
//           width:function(index,value){
//               return parseFloat(value) * 1.2;
//           },
//           height:function(index,value){
//               return parseFloat(value) * 1.2;
//           },
//           "line-height":$("div[class=block-me]").innerHeight() + 'px',
//           "font-size":parseInt($("div[class=block-me]").css('font-size').slice(-2))+2+'px'
//       });
//    });
//
//    function handler(event){
//            alert(event.data.foo);
//    }
//    $("button[class=bind]").bind('click',{foo:'bar'},handler);
//
//    $("button[class=bind-more]").bind({
//       click:function(event){
//           alert(event.type);
//       },
//       dbClick:function(event){
//           alert(event.type);
//       }
////       focus:function(event){
////           alert(event.type);
////       }
//    });
//
//    $("a[class=preventDefault]").click(function(e){
//        alert('I prevented the Jump!');
//        e.preventDefault();
//    });
//
//    jQuery.fx.off = true;
//
//    $("button[class=each]").click(function(){
//        var msg = '';
//        var arr = ['Hello', 'sir', ',', 'welcome', 'to', 'China', '!' ];
//        var obj = {hello:'hello', jim: 'Jim', a: '!'};
//        $.each(arr,function(index,value){
//            alert(index+' => '+ value);
//        });
//
//        for(k in obj ){
//            msg += ' '+obj[k];
//        }
//        alert(msg);
//    });

//    $(document).ready(function(e){
//
//        $("button[id=button]").click(function(e){
//            var value = $(this).prev().val();
//            alert(value);
//        })
//
//    });
//
//    $( "button" ).click(function() {
//        var value;
//
//        switch ( $( "button" ).index( this ) ) {
//            case 0 :
//                value = $( "div" ).data( "blah" );
//                break;
//            case 1 :
//                $( "div" ).data( "blah", "hello" );
//                value = "Stored!";
//                break;
//            case 2 :
//                $( "div" ).data( "blah", 86 );
//                value = "Stored!";
//                break;
//            case 3 :
//                $( "div" ).removeData( "blah" );
//                value = "Removed!";
//                break;
//        }
//
//        $( "span" ).text( "" + value );
//    });

//    $( "a" ).click(function( event ) {
//        alert( event.isDefaultPrevented() ); // false
//        event.preventDefault();
//        alert( event.isDefaultPrevented() ); // true
//    });
    $("form").submit(function(){
        var text = $(this).serialize();
        console.log(text);
        return false;
    });

    function aaa(){
        $.ajax({
            url:"{{ route('myhome.ajax.test') }}",
            data:{1:'aaa', 2:'bbb'},
            success:function(res){
                if(res.code){
                   alert('something wrong!');
                }else
                    alert('success');
            },
            method:'POST',
            statusCode:{404:function(){
                alert('page not found');
            },500:function(){
               alert('something wrong');
            }}
        });
    }
aaa();
</script>
</body>
</html>
