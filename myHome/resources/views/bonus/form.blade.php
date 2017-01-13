{!! Form::open(['url' => route('make.bonus'), 'method' => 'post']) !!}

<div class="form-group panel-body">
    <div class="row">
        {!! Form::label('money', '金额', []) !!}
        {!! Form::text('money', '', ['name' => 'money', 'class' =>'form-control']) !!}
    </div>

    <div class="row">
        {!! Form::label('number', '数量', []) !!}
        {!! Form::text('number', '', ['name' => 'number', 'class' =>'form-control']) !!}
    </div>

    <div class="row">
        {!! Form::label('name', '标题', []) !!}
        {!! Form::text('name', '', ['name' => 'name', 'class' =>'form-control', 'placeholder' => '恭喜发财，大吉大利']) !!}
    </div>

    <div class="row">
        {!! Form::submit('发红包', ['name' => 'title', 'class' =>'btn btn-primary']) !!}
    </div>
</div>

