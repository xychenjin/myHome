@if(isset($model))
    {!! Form::open(['url' => route('exercise.update', ['id' => $model->id]), 'method' => 'put']) !!}
@else
    {!! Form::open(['url' => route('exercise.store'), 'method' => 'post']) !!}
@endif

<div class="form-group">
    <div class="row">
        {!! Form::label('day', '日期', ['for' => 'day']) !!}
        {!! Form::text('day', isset($model) ? $model->day : null, ['class' => 'form-control', 'name' => 'day']) !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('period', '运动时长', ['for' => 'period']) !!}
        {!! Form::text('period', isset($model) ? $model->period : null, ['class' => 'form-control', 'name' => 'period']) !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('weekTh', '星期', ['for' => 'day']) !!}
        {!! Form::text('weekTh', isset($model) ? $model->weekTh : null, ['class' => 'form-control', 'name' => 'weekTh']) !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('desc', '内容', ['for' => 'day']) !!}
        {!! Form::textarea('desc', isset($model) ? $model->desc : null, ['class' => 'form-control', 'name' => 'desc']) !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('ext', '其他', ['for' => 'day']) !!}
        {!! Form::textarea('ext', isset($model) ? $model->ext : null, ['class' => 'form-control', 'name' => 'day']) !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('star', '评价', ['for' => 'star']) !!}
        {!! Form::radio('star', isset($model) ? $model->star : null, ['class' => 'form-control', 'name' => 'star']) !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::submit(isset($model) ? '更新' : '保存', ['class' => 'btn btn-primary']) !!}
    </div>
</div>