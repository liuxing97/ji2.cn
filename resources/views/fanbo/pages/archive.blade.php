@extends('fanbo/layouts/layout')
@section('web-title')
    {{$siteData['censcms_web_name']}}-{{$archiveData['title']}}
@endsection
@section('content')
    <style>
        .article{
            margin-top: 12px;
            padding: 20px 20px;
            /*padding: 0 1.5rem;*/
            background: #fff;
            position: relative;
            overflow: hidden;
        }
        .article .articletitle{
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
        .article .layui-icon{
            font-size: 32px;
            color: #E1594B;
            margin-right: 1rem;
        }
        .article-words{
            line-height: 2rem;
            color: #626262;
            padding: 20px 0;
        }
        .article-words .describe{
            color: #9a9a9a;
        }
        .article_main{}
        .article_main p{
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
        .articleList{

        }
        .article_main_title{
            display: block;
            color: #E1594B;
        }
        .pageAct{
            margin-top: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }
        .layui-btn{
            margin: 0 20px;
        }
    </style>


        <div class="archiveTitle">
            {{$archiveData['title']}}
        </div>

    <div class="articleList">
        <style>
            .article-icon{}
            .article-icon-main{
                width: 100%;
                text-align: center;
            }
            .article-icon-main img{
                max-width: 100%;
                max-height: 100%;
            }
        </style>
        <style>
            .headClass{

            }
            .article .layui-icon{
                /*vertical-align: top;*/
            }
            .article .layui-icon:before{
                vertical-align: middle;
            }
            .articleClassValue{
                font-size: 18px;
                margin-left: 12px;
                vertical-align: middle;
                color: brown;
                position: relative;
                top: 1px;
            }
        </style>
        @if($dataListArray['data'])
            @foreach($dataListArray['data'] as $item)
                {{--如果是纯文字，无缩略图--}}
                @if(!$item['icon'])
                    <a href="/article/{{$item['id']}}">
                    <div class="article">
                            <div class="article-header">
                                <h3 class="articletitle"><i class="layui-icon layui-icon-read">
                                        @if($archiveData['alias'] = 'new' && isset($archiveListData))
                                            <span class="articleClassValue">{{$archiveListData[$item['archive']]}}</span>
                                            @endif
                                    </i>{{$item['title']}}</h3>
                                <div class="release_time">{{$item['created_at']}}</div>
                                <hr class="articletitle_hr">
                            </div>
                        <div class="article-words">
                            <div class="describe">
                                <span>描述：</span>
                                {{$item['describe']}}
                            </div>
                        </div>
                    </div>
                    </a>
                @else
                    <a href="/article/{{$item['id']}}">
                    <div class="article">
                        <div class="article-icon">
                            <div class="article-icon-main">
                                <img src="{{$item['icon']}}">
                            </div>
                        </div>
                            <div class="article-header">
                                <h3 class="articletitle"><i class="layui-icon layui-icon-read">
                                        @if($archiveData['alias'] = 'new' && isset($archiveListData))
                                            <span class="articleClassValue">{{$archiveListData[$item['archive']]}}</span>
                                        @endif
                                    </i>{{$item['title']}}</h3>
                                <div class="release_time">{{$item['created_at']}}</div>
                                <hr class="articletitle_hr">
                            </div>
                        <div class="article-words">
                            <div class="describe">
                                <span>描述：</span>
                                {{$item['describe']}}
                            </div>
                        </div>
                    </div>
                    </a>
                @endif
            @endforeach
        @endif
    </div>
    <div class="pageAct">

        @if($dataListArray['prev_page_url'])
            <a href="{{$dataListArray['prev_page_url']}}"><div class="layui-btn layui-btn-primary">上一页</div></a>
        @endif
        @if($dataListArray['next_page_url'])
            <a href="{{$dataListArray['next_page_url']}}"><div class="layui-btn layui-btn-primary">下一页</div></a>
        @endif
    </div>
    @endsection