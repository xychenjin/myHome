@extends($layouts)


@section('title')
    测试：修改密码
@endsection

@section('style')

@endsection

@section('content-header')
    <h1>修改密码</h1>
@endsection

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'put', 'url' => route('admin.users.updatePwd')]) !!}

        <div class="form-group ">
            <div class="row">
                <label class= 'label-control '>密码：</label>
                {!! Form::password('password', ['class' => 'form-control ', 'placeholder' => '请输入字母、数字，6-20位的字符']) !!}
            </div>
            <div class="row">
                <label class= 'label-control'>&nbsp;</label>
                {!! $errors->first('password','<div class="text-danger">:message</div>') !!}
            </div>
        </div>

        <div class="form-group ">
            <div class="row">
                <label class= 'label-control'>确认密码：</label>
                {!! Form::password('password_confirmation',['class' => 'form-control ']) !!}
            </div>
            <div class="row">
                <label class= 'label-control'>&nbsp;</label>
                {!! $errors->first('password_confirmation','<div class="text-danger">:message</div>') !!}
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label>&nbsp;</label>
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection