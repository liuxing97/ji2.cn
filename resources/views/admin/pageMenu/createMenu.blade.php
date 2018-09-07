@extends('layouts.app')
@section('content')
    <style>
        .pageContent .tips{
            margin-top: 4rem;
            line-height: 6rem;
            padding-left: 4rem;
            border-left: 4px solid #e5e5e5;
            background: rgba(255,255,255,0.66);
            color: #9a9a9a;
            margin-bottom: 3.6rem;
        }
        .proMenu{
            /*margin-bottom: 20rem;*/
        }
        .proMenu a{
        }
        .proMenu .menuItem{
            margin-top: 2rem;
            padding-left: 4rem;
            border-left: 4px solid;
            line-height: 4rem;
            letter-spacing: 3px;
        }
        .btn-post-tijiao{
            margin-left: 0 !important;
            margin-bottom: 12rem;
        }
        .linkType{
            display: inline-block;
            margin-right: 2rem;
        }
        .linkTypeBox{
            border: none;
        }
    </style>
    <div class="pageHeader">
        <h3 class="page-title">@lang('global.menu.menu.create.t')</h3>
        <div class="tips">* 在这里您可以进行创建目录，输入目录名称，输入对应的链接即可添加目录。<br />* 点击立即应用，即可自动更新程序菜单。</div>
    </div>
    <div class="pageContent">
        {{--填写并添加--}}
        <h4>请填写标题及链接</h4>
        <div class="tips">* 分类页面链接，请到分类管理页面查看。</div>
        <div class="textItem">
            <span class="textTitle">请填写菜单名称：</span>
            <input class="text menuItemTitleValue" type="text">
        </div>
        <div class="textItem">
            <span class="textTitle">请填写菜单链接：</span>
            <input class="text menuItemHrefValue" type="text">
        </div>
        <div class="textItem">
            <span class="textTitle">链接类型：</span>
            <div class="text linkTypeBox">
                <div class="linkType"><input type="radio" name="linkType" checked="checked" value="_self">内部链接</div>
                <div class="linkType"><input type="radio" name="linkType" value="_blank">外部链接</div>
            </div>
        </div>
        <div class="btn-post menuItemAppendBtn">添加</div>
        {{--目录预览--}}
        <h4>目录预览</h4>
        <div class="tips">* 如果您是开发人员，请从数据库中根据调用目录，目录的ID在我的目录栏目中。</div>
        <div class="proMenu proMenuDom">
        </div>
        <div class="btn-post btn-post-tijiao menuDataPost">提交</div>
    </div>
@stop
@section('js')
    <script src="/adminlte/js/pages/menu.js"></script>
@stop