
<div class="form-group panel-body ">
    {!! Form::open(['method' => 'get']) !!}
    <div class="form-group row">
        <div class="form-inline">
            <label class="">打卡日期：</label>
            {!! Form::select('day', $selectDays,  isset($searchData['day']) ? $searchData['day'] : null, ['class'=>'form-control ']) !!}
            <label class="">周次：</label>

            <select class="form-control " name="week_th">
                <option {!! ! isset($searchData['week_th'])|| !is_numeric($searchData['week_th']) ? 'selected="selected"':'' !!}>请选择</option>
                @foreach($selectWeeks as $key=>$val)
                    <option id="" value="{!! $key !!}" {!! isset($searchData['week_th'])
                && is_numeric($searchData['week_th']) && $searchData['week_th'] === $key ? 'selected="selected"':'' !!}>{!! $val !!}</option>
                @endforeach
            </select>

            <label class="">工具：</label>
            {!! Form::text('tools', isset($searchData['tool']) ? $searchData['tool'] : null, ['class'=>'form-control ']) !!}
            <label class="">打卡人：</label>
            {!! Form::text('userName', isset($searchData['userName']) ? $searchData['userName'] : null, ['class'=>'form-control ']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="form-inline">
            <label>截止日期：</label>
            {!! Form::select('startDay', $selectDays,  isset($searchData['startDay']) ? $searchData['startDay'] : null, ['class'=>'form-control']) !!}
            - {!! Form::select('endDay', $selectDays,  isset($searchData['endDay']) ? $searchData['endDay'] : null, ['class'=>'form-control']) !!}

            <label>是否补签</label>
            {!! Form::select('subscribe', [''=>'请选择', 1=>'是', 0=>'否'],  isset($searchData['subscribe']) ? $searchData['subscribe'] : null, ['class'=>'form-control']) !!}

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
    </div>
    {!! Form::close() !!}
</div>

