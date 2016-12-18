@extends($layouts)

@section('title')
    学车记录表
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>学车记录表</h1>
@endsection

@section('content')

        <table class="table table-hover">
            <thead>
            <tr>
                <th>学习日期</th>
                <th>出发</th>
                <th>回家</th>
                <th>标题</th>
                <th>内容</th>
                <th>教练员</th>
                <th>学时介绍</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{!! $item->day !!}</td>
                    <td>{!! $item->start !!}</td>
                    <td>{!! $item->end !!}</td>
                    <td>{!! $item->title !!}</td>
                    <td>{!! $item->content !!}</td>
                    <td>{!! $item->coach !!}</td>
                    <td>{!! $item->period !!}</td>
                    <td>{!! link_to_route('cart.edit', '编辑', ['id' => $item->id], []) !!}&nbsp;</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            {!! $data->render() !!}
        </div>


@endsection

@section('script')

@endsection