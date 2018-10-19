
@extends('fanbo/layouts/layout')
@section('web-title')
    {{$siteData['censcms_web_name']}}-{{$articleData['title']}}
@endsection
@section('web-describe')
    {{$siteData['censcms_web_name']}}-{{$articleData['describe']}}
@endsection
@section('menuList')
    <li class="layui-nav-item layui-this"><a href="">资讯正文</a></li>
@endsection
@section('content')
    <style>

        .content{
            margin-top: 20px;
            padding: 20px 20px;
            /*padding: 0 1.5rem;*/
            background: #fff;
        }
        .content .articletitle{
            border-color: #ff7975 !important;
            line-height: 2.5rem;
            font-size: 22px;
            /*padding: 0 20px;*/
        }
        .articletitle_hr{
            background-color: #E1594B;
            height: 3px;
            margin-top: 1rem;
        }
        .content .layui-icon{
            font-size: 32px;
            color: #E1594B;
            margin-right: 1rem;
        }
        .content-words{
            line-height: 2rem;
            color: #626262;
            padding: 20px 0;
        }
        .content-words .describe{
            color: #9a9a9a;
        }
        .content_main{}
        .content_main p{
            text-indent: 1rem;
        }
        .release_time{
            position: relative;
            top: 9px;
            font-size: 14px;
            text-align: right;
            color: #9a9a9a;
        }
        .more_article{
            background: #fff;
            margin-top: 20px;
            padding: 20px 20px;
        }
        .more_article_title{
            font-size: 22px;
            text-align: center;
            /*color: #9a9a9a;*/
        }
        .more_articleList{
            margin-top: 1rem;
        }
        .more_articleList ul{

        }
        .more_articleList ul li{
            font-size: 16px;

            line-height: 2.5rem;
        }
        .more_articleList ul li a{
            color: #9a9a9a;
        }
        .more_articleList ul li a i{
            /*font-size: 14px;*/
            margin-right: 12px;
            color: #E1594B;
        }
        .more_articleList .r-time{
            font-size: 16px;
            line-height: 1rem;
            margin-top: 1rem;
        }
        .content_main_title{
            display: block;
            color: #E1594B;
        }
    </style>

    <div class="content">
        <div class="content-header">
            <h3 class="articletitle"><i class="layui-icon layui-icon-read"></i>{{$articleData['title']}}</h3>
            <div class="release_time">{{$articleData['created_at']}}</div>
            <hr class="articletitle_hr">
        </div>
        <div class="content-words">
            <div class="describe"><span>描述：</span>
                {{$articleData['describe']}}
                <hr>
            </div>
            <div class="content_main">
                <span class="content_main_title">正文：</span>
                {!! $articleData['content'] !!}
            </div>
        </div>
    </div>
    <div class="more_article">
        <div class="more_article_title">更多资讯</div>
        <div class="more_articleList">
            <ul>
                @foreach($articleShow as $showItem)
                <li><a href="/article/{{$showItem['id']}}"><i class="layui-icon layui-icon-read"></i>{{$showItem['title']}}&nbsp;&nbsp;&nbsp;<span class="r-time">{{$showItem['created_at']}}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @endsection