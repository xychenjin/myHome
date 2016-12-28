{!! Form::open(['method' => 'get', 'url' => route('backward.detail')]) !!}
<div class="form-group">
    <div class="form-inline">
        {!! Form::label('选择年份:') !!}
        {!! Form::select('y' , $selectedYears, isset($searchData['y']) ? $searchData['y'] : null, ['class' =>'form-control']) !!}
        {!! Form::submit('查看' , ['class' =>'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}