@extends($layout)

@section('content-header')
	
	<h1>
		权限列表 ({!! $permissions->count() !!})
		&middot;
		<small>{!! link_to_route('admin.permissions.create', '新增') !!}</small>
	</h1>
	
@stop

@section('content')

	<table class="table">
		<thead>
			<th>序号</th>
			<th>名称</th>
			<th>别名</th>
			<th>描述</th>
			<th>创建时间</th>
			<th class="text-center">操作</th>
		</thead>
		<tbody>
			@foreach ($permissions as $permission)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $permission->name !!}</td>
				<td>{!! $permission->slug !!}</td>
				<td>{!! $permission->description !!}</td>
				<td>{!! $permission->created_at !!}</td>
				<td class="text-center">
					<a href="{!! route('admin.permissions.edit', $permission->id) !!}">编辑</a>
					&middot;
					@include('admin::partials.modal', ['data' => $permission, 'name' => 'permissions'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($permissions) !!}
	</div>
@stop
