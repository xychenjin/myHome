@extends($layout)

@section('content-header')
	
	
	<h1>
		添加
		&middot;
		<small>{!! link_to_route('admin.users.index', '返回') !!}</small>
	</h1>

@stop

@section('content')
	<div>
		@include('admin::users.form')
	</div>

@stop
