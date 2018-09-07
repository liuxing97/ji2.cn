@extends('layouts.app')

@section('content')
    <div class="pageHeader">
        <h3 class="page-title">@lang('global.menu.archive.list.t') · 修改类别</h3>
        <div class="tips">* 您现在修改的类别名称是-{{$data['archive']}}。</div>
    </div>
    <div class="pageContent">
        <div class="textItem">
            <span class="textTitle">更改分类名称：</span>
            <input class="text archiveNameValue" type="text" placeholder="{{$data['archive']}}">
        </div>
        <div class="textItem">
            <span class="textTitle">更改分类的描述：</span>
            <input class="text archiveDescribe" type="text" placeholder="{{$data['describe']}}">
        </div>
        <div>
            <div data-archive_id="{{$data['id']}}" class="btn-post changeArchive">提交更改</div>
            <div class="btn-post">取消</div>
        </div>
    </div>
@stop
@section('js')
    <script src="/adminlte/js/pages/archive.js"></script>
@stop