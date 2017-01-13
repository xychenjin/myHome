@extends($layouts)

@section('title')
    测试：抢红包
@endsection

@section('style')
    <style>

    </style>
@endsection

@section('content-header')
    <h1>抢红包<small>{!! link_to_route('bonus.index', '返回') !!}</small></h1>
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>序号</th>
            <th>金额</th>
            <th>数量</th>
            <th>余额</th>
            <th>名称</th>
            <th>红包状态</th>
            <th>红包类型</th>
            <th>用户</th>
            <th>创建时间</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->amount !!}</td>
                <td>{!! $item->numberDesc !!}</td>
                <td>{!! $item->balance !!}</td>
                <td>{!! $item->name !!}</td>
                <td>{!! $item->statusDesc !!}</td>
                <td>{!! $item->typeDesc !!}</td>
                <td>{!! $item->owner !!}</td>
                <td>{!! $item->created_at !!}</td>
                <td>{!! $item->desc !!}</td>
                <td>{!! link_to_route('fetch.bonus', '抢红包', ['id' => $item->id], ['class' => 'fetch btn btn-danger']) !!}
                    @if($item->hasLogs)&middot;
                    {!! link_to_route('bonus.show', '查看已抢', ['id' => $item->id, 'redirect'=> \Input::url()]) !!}
                    @endif
                </td>
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
            $('.fetch'). click(function(){
               $(this).attr('disabled', true);
            });
        });
    </script>
@endsection

