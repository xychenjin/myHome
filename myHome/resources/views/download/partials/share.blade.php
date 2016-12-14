@if($files)
    <div class="row">
        <label class="col-sm-2">文件列表：</label>
        <div class="col-sm-10">
            @foreach($files as $item)
                <div class="row">{!! HTML::link(rtrim($storagePath , '/').'/'.$item->fileUrl, $item->fileFormat, ['target'=>'_blank'], '') !!}</div>
            @endforeach
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

