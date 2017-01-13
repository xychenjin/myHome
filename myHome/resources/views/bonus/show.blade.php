@extends($layouts)

@section('title')
    测试：红包日志
@endsection

@section('style')
    <style>

    </style>
@endsection

@section('content-header')
    <h1>红包日志({!! $data->total() !!})<small>{!! HTML::link(isset($lastRedirect) ? $lastRedirect: route('bonus.index'), '返回') !!}</small></h1>
@endsection

@section('content')
    <div class=" panel panel-body">
        <div class="row form-inline">
            <div class="form-group ">
                {!! Form::label('id', '红包:') !!}
                <span class="label-control">{!! $model->amount . '元' !!}</span>
            </div>
            <div class="form-group ">
                {!! Form::label('number', '数量:') !!}
                <span class="label-control">{!! $model->numberDesc  !!}</span>
            </div>
        </div>

        <div class="row form-inline">
            <div class="form-group ">
                {!! Form::label('createdAt', '创建时间:') !!}
                <span class="label-control">{!! $model->created_at  !!}</span>
            </div>
            <div class="form-group ">
                {!! Form::label('status', '红包状态:') !!}
                <span class="label-control">{!! $model->statusDesc  !!}</span>
                @if($model->isFetchOut)
                    &nbsp;
                    (<span class="text-danger">{!! $model->isFetchOutDesc !!}</span>被抢光！)
                @endif
            </div>
        </div>

    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>序号</th>
            <th>用户</th>
            <th>金额</th>
            <th>数量</th>
            <th>红包余额</th>
            <th>名称</th>

            <th>创建时间</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        <?php $count =1; ?>
        @foreach($data as $item)
            <tr>
                <td>{!! $count !!}</td>
                <td>{!! $item->owner !!} @if($item->IsBest)<span class="text-green">最佳</span>@endif</td>
                <td>{!! $item->amount !!}</td>
                <td>{!! $item->number !!}</td>
                <td>{!! $item->balance !!}</td>
                <td>{!! $item->name !!}</td>
                <td>{!! $item->created_at !!}</td>
                <td>{!! $item->desc !!}</td>
                <td>&nbsp;</td>
            </tr>
            <?php $count++;?>
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

