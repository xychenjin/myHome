{!! Form::open(['method' => 'get']) !!}

    <div class="row">
        <div class="form-inline">
            <label>转账方式：</label>
            {!! Form::select('way', $selectedWays, isset($searchData['way']) ? $searchData['way'] : null , ['class' => 'form-control']) !!}

            <label>入账日期：</label>
            {!! Form::select('startDate', $selectedDates, isset($searchData['startDate']) ? $searchData['startDate'] : null, ['class' => 'form-control'] ) !!}
            -
            {!! Form::select('endDate', $selectedDates, isset($searchData['endDate']) ? $searchData['endDate'] : null, ['class' => 'form-control'] ) !!}

            {!! Form::submit('查询', ['class' => 'btn btn-primary']) !!}

        </div>
    </div>

{!! Form::close() !!}