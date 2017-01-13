{!! Form::open(['method' => 'get']) !!}
    <div class="panel-body">
        <div class="form-group form-inline">
            {!! Form::label('status', '红包状态') !!}
            {!! Form::select('status', $selectStatus, isset($searchData['status'])? $searchData['status'] : null, ['class' => 'form-control']) !!}
            {!! Form::label('type', '红包类型') !!}
            {!! Form::select('type', $selectType, isset($searchData['type'])? $searchData['type'] : null, ['class' => 'form-control']) !!}
            {!! Form::submit('搜索', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

{!! Form::close() !!}