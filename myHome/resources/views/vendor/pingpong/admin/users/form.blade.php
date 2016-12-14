@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.users.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.users.store']) !!}
@endif
	<div class="form-group">
		{!! Form::label('name', '名称:') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		{!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('email', '邮箱:') !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}
		{!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('password', '密码:') !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
		{!! $errors->first('password', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('role', '角色:') !!}
		{!! Form::select('role', $roles, isset($role) ? $role : null, ['class' => 'form-control']) !!}
		{!! $errors->first('role', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::submit(isset($model) ? '更新' : '保存', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
