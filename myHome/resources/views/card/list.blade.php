@extends($layouts)

@section('title')
    测试：查看卡列表
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 >查看卡列表</h1>
@endsection

@section("content")
    <div class="container">
        <div class="form-horizontal">

        @include('card.search')

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>序号</th>
                    <th>卡号</th>
                    <th>卡密</th>
                    <th>卡类型</th>
                    <th>卡状态</th>
                    <th>创建日期</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{!! $item->id !!}</td>
                        <td>{!! $item->card_no !!}</td>
                        <td><label>{!! $item->cardPwdDesc !!}</label></td>
                        <td>{!! $item->cardTypeDesc !!}</td>
                        <td>{!! $item->cardStatusDesc !!}</td>
                        <td>{!! $item->created_at !!}</td>
                        <td>&nbsp;</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {!! $data->render() !!}
        </div>

    </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection