@extends($layouts)

@section('content')

    <div>这是一段HTML代码。</div>
    <p class="show"></p>

    <script >
        var object = function(){
            this.name = 'HTML';
            this.parent = 'XML';
            this.child = 'SHTML';
            this.date = new Date();
            this.getName = function() {
                return this.name;
            };
        };
        var element = new object();

        object.prototype.run = function(){
            return "this:" + this.name + ", parent:" + this.parent + ", child:" + this.child;
        };

        document.write(element.run());
//        document.write(element.date.getFullYear() + '-' + element.date.getMonth() + '-' + element.date.getDate()
//                + " " + element.date.getHours() + ':' + element.date.getMinutes()+ ':' +element.date.getSeconds());
    </script>

@endsection