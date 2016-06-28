<?php

?>
@extends($master)

@section('header')

@stop

@section('script')
    <script type="text/javascript">
        time=1799;
        function cs(id){
            i=parseInt(time/60);
            s=time%60;
            var id=document.getElementById('vvv');
            id.innerHTML=i+'分'+(s<10?'0'+s:s)+'秒';
            time--;}
        setInterval(function(){cs();},1000);
    </script>
@stop

@section('content')
    <h1 id="vvv">30分00秒</h1>
@stop
