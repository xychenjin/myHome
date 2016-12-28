<a data-toggle="modal" href="#modal-ask" id="show">
    查看
</a>
<div id="modal-ask" class="modal text-left fade">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['method' => 'put', 'route' => ["memo.ask"]])!!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title">请输入密码</h1>
            </div>
            <div class="modal-body">
                {!! Form::label('请输入密码：') !!}
                {!! Form::password('pwd', ['class' => 'form-control']) !!}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(function(){
        $("button[type=button]").click(function(){
           history.go(-1);
        });

    });
</script>