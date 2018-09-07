@extends('layouts.app')
@section('content')
    <div class="pageHeader">
        <h3 class="page-title">@lang('global.menu.archive.create.t')</h3>
        <div class="tips">* 如果您要发布文章，请先进行创建分类操作，文章将发布到分类下进行管理。</div>
    </div>
    <div class="pageContent">
        {{--创建分类--}}
        <div class="textItem">
            <span class="textTitle">请填写分类名称：</span>
            <input class="text archiveNameValue" type="text">
        </div>
        <div class="textItem">
            <span class="textTitle">分类的描述：</span>
            <input class="text archiveDescribe" type="text">
        </div>
        <div>
            <div id="createArchive" class="btn-post">提交</div>
        </div>
    </div>
@stop
@section('js')
    <script src="/adminlte/js/pages/archive.js"></script>

@stop