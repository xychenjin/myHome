@extends($layouts)

@section('style')
    <style>

    </style>
@endsection

@section('content-header')
    <h1>书库列表</h1>
@endsection

@section('content')
    <table class="table table-hover">
        @foreach($data as $item)

        @endforeach
    </table>
@endsection

@section('script')
    <script>

    </script>
@endsection
