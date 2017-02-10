@extends($layout)

@section('content')

    <div>这是一段HTML代码。</div>
    <p class="show"></p>

    <script >
        var object = function(){
            this.name = 'HTML';
            this.parent = 'XML';
            this.child = 'SHTML';
            this.date = new Date();
        };
        var element = new object();

        document.write(element.name);
    </script>

@endsection