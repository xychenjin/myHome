@extends($layout)

@section('content-header')
	
	<h1>
		新增
		&middot;
		<small>{!! link_to_route('admin.roles.index', '返回') !!}</small>
	</h1>
	
@stop

@section('content')

	<div>
		@include('admin::roles.form')
	</div>

@stop
