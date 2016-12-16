@if($files)
    <div class="row">
        <label class="col-sm-2">文件列表：</label>
        <div class="col-sm-10">
            @foreach($files as $key => $item)
                <?php $md5 = md5($item->fileUrl); ?>
                <div class="row">
                    {!! HTML::link(rtrim($storagePath , '/').'/'.$item->fileUrl, $item->fileFormat, ['target'=>'_blank'], '') !!}
                    @if(isset($delete) && $delete)
                        <a data-toggle="modal" href="#modal-delete-{!! $md5 !!}" class="btn ">
                            delete
                        </a>
                        <div id="modal-delete-{!! $md5 !!}" class="modal text-left fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {!! Form::open(['method' => 'get', 'route' => ["download.delete"]])!!}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h1 class="modal-title">删除文件</h1>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            {!! $item->fileFormat !!} 文件，确认删除?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">确认</button>
                                        {!! Form::hidden('file', $item->fileUrl) !!}
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    @endif
                </div>
            @endforeach

            <div>
                @if($files instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {!!  $files->render() !!}
                @endif
            </div>
        </div>
    </div>
@endif

@if(! empty($file))
    <div class="row">
        <label class="col-sm-2">文件地址：</label>
        {!! HTML::link($file, $file, ['target'=>'_blank'], '') !!}
    </div>
@endif

@if(isset($showKey) && $showKey)
    <div class="row">
        <label class="col-sm-2">Key存储地址：</label>
        @if(! empty($request->md5) && ! empty($request->type))
            {!! link_to_route('download.keyDetail', $jsonFile, [ 'type'=>$request->type, 'md5'=> $request->md5]) !!}
        @endif
    </div>
@endif

