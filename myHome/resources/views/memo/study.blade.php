@if(! empty($name) )
    @include('memo.study.'. $name)
@else
    <div class="form-group">
        <p>Sorry! 你要找的页面飞走了..</p>
    </div>
@endif


