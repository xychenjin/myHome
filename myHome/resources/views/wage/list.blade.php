@extends($layouts)

@section('title')
    测试：转账记录
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>转账记录</h1>
@endsection

@section('content')
    <div class="container">
        <div class="form-horizontal">

            @include('wage.search')

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>入账日期</th>
                        <th>转账时间</th>
                        <th>对方打钱账户名</th>
                        <th>己方收钱账户名</th>
                        <th>转入金额</th>
                        <th>余额</th>
                        <th>支付手续费</th>
                        <th>入账时间</th>
                        <th>通过方式</th>
                        <th>备注</th>
                        <th>创建时间</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{!! $item->id !!}</td>
                            <td>{!! $item->received_date !!}</td>
                            <td>{!! $item->sent_at !!}</td>
                            <td>{!! $item->sent_account !!}</td>
                            <td>{!! $item->saved_account !!}</td>
                            <td>{!! $item->received_amount !!}</td>
                            <td>{!! $item->balance !!}</td>
                            <td>{!! $item->tax !!}</td>
                            <td>{!! $item->received_at !!}</td>
                            <td>{!! $item->transWayDesc !!}</td>
                            <td>{!! $item->notice !!}</td>
                            <td>{!! $item->created_at !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {!! $data->render()!!}
            </div>

        </div>
    </div>
@endsection
