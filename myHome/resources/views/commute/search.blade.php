
<div class="form-group panel-body ">
    {!! Form::open(['method' => 'get']) !!}
    <div class="form-inline">
        <label>打卡日期：</label>
        {!! Form::select('day', $selectDays,  isset($searchData['day']) ? $searchData['day'] : null, ['class'=>'form-control']) !!}
        <label>周次：</label>

        <select class="form-control" name="week_th">
            <option >请选择</option>
            @foreach($selectWeeks as $key=>$val)
                <option id="" value="{!! $key !!}">{!! $val !!}</option>
            @endforeach
        </select>
        
        <label>工具：</label>
        {!! Form::text('tools', isset($searchData['tool']) ? $searchData['tool'] : null, ['class'=>'form-control']) !!}
        <label>打卡人：</label>
        {!! Form::text('userName', isset($searchData['userName']) ? $searchData['userName'] : null, ['class'=>'form-control']) !!}
        <label>截止日期：</label>
        {!! Form::select('startDay', $selectDays,  isset($searchData['startDay']) ? $searchData['startDay'] : null, ['class'=>'form-control']) !!}
        - {!! Form::select('endDay', $selectDays,  isset($searchData['endDay']) ? $searchData['endDay'] : null, ['class'=>'form-control']) !!}

        {!! Form::submit('查询', ['class'=>'btn btn-primary']) !!}

        @if (isset($searchData['day'])
         || isset($searchData['week'])
         || isset($searchData['tool'])
         || isset($searchData['userName'])
         || isset($searchData['startDay'])
         || isset($searchData['endDay'])
        )
            {!! link_to_route('commute.index', '清除') !!}
        @endif
    </div>
    {!! Form::close() !!}
</div>

