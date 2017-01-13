@extends($layouts)

@section('title')
    测试：锻炼记录
@endsection

@section('style')
    <style>

    </style>
@endsection

@section('content-header')
    <h1>锻炼记录</h1>
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>序号</th>
            <th>运动日期</th>
            <th>运动时长</th>
            <th>星期</th>
            <th>内容</th>
            <th>其他</th>
            <th>自我评价</th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->day !!}</td>
                <td><label>{!! $item->period !!}</label></td>
                <td>{!! $item->weekTh !!}</td>
                <td>{!! $item->desc !!}</td>
                <td>{!! $item->ext !!}</td>
                <td>{!! $item->star !!}</td>
                <td>&nbsp;</td>
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

