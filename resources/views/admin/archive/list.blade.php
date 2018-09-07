@extends('layouts.app')

@section('content')
    <link type="text/css" href="" />
    <style>
        .havntLog{
            text-align: center;
            font-size: 22px;
            margin-top: 3.6rem;
            border-top: 1px dashed #ccc;
            padding-top: 6rem;
        }
        .archiveItem{
            margin-bottom: 2rem;
            background: #fff9;
            border-radius: 3px;
            padding: 3rem 2rem;
            box-shadow: 0 0 10px #e5e5e5;
        }
        .archiveItem .i-msg{
            width: 50%;
            display: inline-block;
            vertical-align: top;
        }
        .archiveItem .i-more{
            width: 29%;
            display: inline-block;
            vertical-align: top;
            line-height: 2.5rem;
            color: #9a9a9a;
        }
        .archiveItem .i-title{
            margin-bottom: 1.5rem;
        }
        .archiveItem .i-describe{
            color: #9a9a9a;
        }
        .archiveItem .i-number{

        }
        .archiveItem .i-created{

        }
        .archiveItem .i-updated{

        }
        .archiveItem .i-act{
            width: 20%;
            display: inline-block;
            vertical-align: top;
        }
        .archiveItem .i-act .i-action{
            width: 70%;
            display: inline-block;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #3c8dbc;
            cursor: pointer;
        }
    </style>
    <div class="pageHeader">
        <h3 class="page-title">@lang('global.menu.archive.list.t')</h3>
        <div class="tips">* 在此对所有分类进行管理。</div>
    </div>
    <div class="pageContent">
        {{-- 一个分类项 --}}
        @if($listArray == [])
            <div class="havntLog">没有记录</div>
            @endif
        @foreach($listArray as $item)
        <div class="archiveItem">
            {{--标题--}}
            <div class="i-msg">
                <div class="i-title">分类名称：{{$item['archive']}}</div>
                <div class="i-describe">分类描述：{{$item['describe']}}</div>
            </div>
            <div class="i-more">
                <div class="i-number">文章数：0</div>
                <div class="i-created">创建时间：{{$item['created_at']}}</div>
                <div class="i-updated">更新时间：{{$item['updated_at']}}</div>
            </div>
            <div class="i-act">
                <div class="i-action changeArchive" onclick="location.href='/admin/cms/archive/change/{{$item['id']}}'">修改</div>
                <div data-archive_id="{{$item['id']}}" class="i-action deleteArchive">删除</div>
            </div>
        </div>
            @endforeach
    </div>
@stop
@section('js')
    <script src="/adminlte/js/pages/archive.js"></script>
@stop