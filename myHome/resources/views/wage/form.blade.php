@if(isset($model))
    {!! Form::open(['url' => route('wage.update', ['id' => $model->id]), 'method' => 'put']) !!}
@else
    {!! Form::open(['url' => route('wage.store'), 'method' => 'post']) !!}
@endif

<div class="form-group">
    <div class="row">
        <label>对方打钱账户：</label>
        {!! Form::text('sent_account', isset($model) ? $model->sent_account : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('sent_account','<div class="text-danger">:message</div>') !!}
    </div>

</div>

<div class="form-group">
    <div class="row">
        <label>转账时间：</label>
        {!! Form::text('sent_at', isset($model) ? $model->sent_at : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('sent_at','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>转账日期：</label>
        {!! Form::text('sent_date', isset($model) ? $model->sent_date : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('sent_date','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>交易金额：</label>
        {!! Form::text('received_amount', isset($model) ? $model->received_amount : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('received_amount','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>支付手续费：</label>
        {!! Form::text('tax', isset($model) ? $model->tax : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('tax','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>己方收钱账户：</label>
        {!! Form::text('saved_account', isset($model) ? $model->saved_account : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('saved_account','<div class="text-danger">:message</div>') !!}
    </div>

</div>

<div class="form-group">
    <div class="row">
        <label>入账时间：</label>
        {!! Form::text('received_at', isset($model) ? $model->received_at : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('received_at','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>入账日期：</label>
        {!! Form::text('received_date', isset($model) ? $model->received_date : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('received_date','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>转账渠道：</label>
        {!! Form::select('trans_way', $selectedWays, isset($model) ? $model->trans_way : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('trans_way','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>备注：</label>
        {!! Form::textarea('notice', isset($model) ? $model->notice : null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <label>&nbsp;</label>
        {!! $errors->first('notice','<div class="text-danger">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <div class="row">
        <label>&nbsp;</label>
        {!! Form::submit( isset($model) ? '更新' : '保存', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

{!! Form::close() !!}