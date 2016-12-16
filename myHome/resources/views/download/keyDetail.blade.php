<?php use Illuminate\Support\Debug\Dumper;?>
@extends($layouts)

@section('title')
    测试：查看存储Key详情
@endsection
@section('style')
    <link rel="shortcut ico" type="images/x-icon" href="/favicon.ico" />
@endsection

@section('content-header')
    <h1 class="text-center">查看Key</h1>
@endsection

@section("content")
    <div class="container">
        <div class="row text-right" style="margin-right: 20px">{!! link_to_route('download.success', '返回', ['type' => $request->type, 'md5' => $request->md5]) !!}</div>

        <ul class="nav nav-tabs" id="myTabs" role="tablist" style="margin-bottom:20px;">
            <li role="presentation" class="active">
                <a href="#json" aria-controls="detail" role="tab" data-toggle="tab">
                    JSON
                </a>
            </li>

            <li role="presentation" class="">
                <a href="#array" aria-controls="finance" role="tab" data-toggle="tab">
                    数组
                </a>
            </li>

        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="json">
                <div class="form-group bg-success">
                    {!! pp($json) !!}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane " id="array">
                <div class="">
                    {!! pp($array) !!}
                </div>
            </div>

        </div>

    </div>

@endsection

@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection