@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.permissions.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.permissions.store']) !!}
@endif
	<div class="form-group">
		{!! Form::label('name', '名称:') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		{!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('slug', '别名:') !!}
		{!! Form::text('slug', null, ['class' => 'form-control']) !!}
		{!! $errors->first('slug', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('description', '描述:') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		{!! $errors->first('description', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::submit(isset($model) ? '更新' : '保存', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
