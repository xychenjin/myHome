@extends($layout)

@section('content-header')
	<h1>
		角色列表 ({!! $roles->count() !!})
		&middot;
		<small>{!! link_to_route('admin.roles.create', '添加') !!}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>序号</th>
			<th>名称</th>
			<th>别名</th>
			<th>描述</th>
			<th>权限</th>
			<th>创建时间</th>
			<th class="text-center">操作</th>
		</thead>
		<tbody>
			@foreach ($roles as $role)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $role->name !!}</td>
				<td>{!! $role->slug !!}</td>
				<td>{!! $role->description !!}</td>
				<td>
					@foreach($role->permissions as $permission)
						&bullet; {!! $permission->name !!}<br>
					@endforeach
				</td>
				<td>{!! $role->created_at !!}</td>
				<td class="text-center">
					<a href="{!! route('admin.roles.edit', $role->id) !!}">编辑</a>
					&middot;
					@include('admin::partials.modal', ['data' => $role, 'name' => 'roles'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($roles) !!}
	</div>
@stop
