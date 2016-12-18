@if(isset($model))
    {!! Form::open(['method' => 'put', 'url' => route('cart.update', ['id'=> $model->id])]) !!}
@else
    {!! Form::open(['method' => 'post', 'url' => route('cart.store')]) !!}
@endif

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">学习日期:</label>
        <div class="col-sm-10">
            {!! Form::text('day', isset($model) ? $model->day : null , ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">开始:</label>
        <div class="col-sm-10">
            {!! Form::text('start', isset($model) ? $model->start : null , ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">结束:</label>
        <div class="col-sm-10">
            {!! Form::text('end', isset($model) ? $model->end : null , ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">标题:</label>
        <div class="col-sm-10">
            {!! Form::text('title', isset($model) ? $model->title : null , ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">内容:</label>
        <div class="col-sm-10">
            {!! Form::textarea('content', isset($model) ? $model->content : null , ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">教练员:</label>
        <div class="col-sm-10">
            {!! Form::text('coach', isset($model) ? $model->coach : null , ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">学时介绍:</label>
        <div class="col-sm-10">
            {!! Form::textarea('period', isset($model) ? $model->period : null , ['class' => 'form-control ']) !!}
        </div>
    </div>
</div>

    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
                {!! Form::submit(isset($model) ? '更新': '保存', ['class' => ' btn btn-primary']) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}
