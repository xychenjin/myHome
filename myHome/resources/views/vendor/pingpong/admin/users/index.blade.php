@extends($layout)

@section('content-header')
	<h1>
		{!! $title or '用户列表' !!} ({!! $users->count() !!})
		&middot;
		<small>{!! link_to_route('admin.users.create', '新增') !!}</small>
	</h1>
@stop

@section('content')

	@if(isset($search))
		@include('admin::users.search-form')
	@endif

	<table class="table">
		<thead>
			<th>序号</th>
			<th>名称</th>
			<th>邮箱</th>
			<th>注册时间</th>
			<th class="text-center">操作</th>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $user->name !!}</td>
				<td>{!! $user->email !!}</td>
				<td>{!! $user->created_at !!}</td>
				<td class="text-center">
					<a href="{!! route('admin.users.edit', $user->id) !!}">编辑</a>
					&middot;
					@include('admin::partials.modal', ['data' => $user, 'name' => 'users'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($users) !!}
	</div>
@stop
