@if(isset($model))
    {!! Form::open(['url' => route('wage.update', ['id' => $model->id]), 'method' => 'post']) !!}
@else
    {!! Form::open(['url' => route('wage.store'), 'method' => 'put']) !!}
@endif

{!! Form::close() !!}