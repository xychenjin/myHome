{!! Form::open(['method' => 'get']) !!}
    <div class="row">
        <div class="form-inline">
        <label class="">卡号或卡密：</label>
        {!! Form::text('name', isset($searchData['name']) ? $searchData['name'] : null, ['class' => 'form-control ' ,
         'placeholder' =>'卡号或卡密', 'style' => 'width:250px;']) !!}

        <label>卡类型：</label>
        {!! Form::select('type', $selectTypes, isset($searchData['type']) ? $searchData['type'] : null, ['class' => 'form-control']) !!}

        <label>卡状态：</label>
        {!! Form::select('status', $selectStatus, isset($searchData['status']) ? $searchData['status'] : null, ['class' => 'form-control']) !!}

        {!! Form::submit('查询', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}


