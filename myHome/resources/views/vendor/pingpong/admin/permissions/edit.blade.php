@extends($layout)

@section('content-header')
	
	<h1>
		编辑
		&middot;
		<small>{!! link_to_route('admin.permissions.index', '返回') !!}</small>
	</h1>
	
@stop

@section('content')
	
	<div>
		@include('admin::permissions.form', array('model' => $permission))
	</div>

@stop
