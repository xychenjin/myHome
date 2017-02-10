@extends($layouts)

@section('title')
    测试：红包记录
@endsection

@section('style')
    <style>

    </style>
@endsection

@section('content-header')
    <h1>红包记录({!! $data->total() !!})</h1>
@endsection

@section('content')
    @include('bonus.search')

    <table class="table table-hover">
        <thead>
        <tr>
            <th>序号</th>
            <th>金额</th>
            <th>数量</th>
            <th>红包余额</th>
            <th>名称</th>
            <th>红包状态</th>
            <th>红包类型</th>
            <th>用户</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->amount !!}</td>
                <td>{!! $item->number !!}</td>
                <td>{!! $item->balance !!}</td>
                <td>{!! $item->name !!}</td>
                <td>{!! $item->statusDesc !!}</td>
                <td>{!! $item->typeDesc !!}</td>
                <td>{!! $item->owner !!}</td>
                <td>{!! $item->created_at !!}</td>
                <td>{!! link_to_route('bonus.show', '详情', ['id' => $item->id]) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {!! $data->render() !!}
    </div>
@endsection

@section('script')
    <script>
        $(function(){

        });
    </script>
@endsection

