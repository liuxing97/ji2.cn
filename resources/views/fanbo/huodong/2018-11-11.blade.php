@extends('fanbo/layouts/layout')
@section('web-title')
    {{$siteData['censcms_web_name']}}-双十一转发抢红包！！！快来吧
@endsection
@php
    $shenqiArray = new \App\CmsArticle();
    $shenqiArray =  $shenqiArray -> where('archive','23')->orderBy('id','desc') -> take(3) -> get() -> toArray();
@endphp
@section('content')
    <style>
        .huodongShow{
            margin: 20px 0;
            background: #fffdfd;
            box-shadow: 0 0 10px #c0bebe;
        }
        .huodongShow img{
           max-width: 100%;
        }
        .huodongDescribe{
            background: #fff;
            padding: 36px 16px;
            line-height: 1.5rem;
            box-shadow: 0 0 10px #c0bebe;
            position: relative;
        }
        .huodongDescribe .btn-join{
            width: 100%;
            background: brown;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            line-height: 2.6rem;
            margin-top: 1.5rem;
        }
        .huodongGuize{
            border: 1px dashed #e5e5e5;
            padding: 12px 18px;
            box-sizing: border-box;
            width: 100%;
        }
        .huodongGuize p{
            margin-bottom: 0.5rem;
        }
        .huodongGuize .title{
            font-size: 16px;
            font-weight: bold;
            margin-top: 0.8rem;
        }
        .huodongGuize .secTitle{
            color: brown;
            margin-bottom: 1.2rem;
            border-bottom: 1px dashed brown;
            line-height: 3rem;
        }
    </style>
    <div class="huodongShow">
        <img src="/qianghongbao02.png" />
    </div>
    <div class="huodongDescribe">
        <div class="huodongGuize">
            <p class="title">双十一，现金红包，抢抢抢！</p>
            <p class="secTitle">活动内容：</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;双十一，别人家的小伙伴都在做活动，我们干什么？当然是，也做活动啦~~~</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;现金红包发放中，先到先得，放完为止哦~</p>
            <p class="secTitle">活动规则：</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;1、点击加入活动，进入活动页面。</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;2、转发活动页面，参与极爱网(ji2.cn)现金红包活动。</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;3、发动您的好友，达到六人助力，现金红包直接入账！</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;4、红包数量888个，抢完为止！</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;5、活动截止日期,2018年11月16日0时0分。</p>
        </div>
        @if($huodongUrl)
            <a href="{{$huodongUrl}}"><div class="btn-join">参与活动</div></a>
            @else
            <a href="{{$applyShouquanUrl}}"><div class="btn-join">申请授权后，可参加活动</div></a>
            @endif
        {{--<div class="shenquanItem" style="margin-top: 2rem;border: 1px solid #e5e5e5;">--}}
            {{--<img style="max-width: 100%" src="/quan01.png" />--}}
        {{--</div>--}}
    </div>










    <style>
        .haoquan{

        }
        .huodongTitle{
            text-align: center;
            background: white;
            color: #858585;
            margin-top: 20px;
            line-height: 55px;
            font-size: 16px;
            box-shadow: 0 0 10px #c0bebe;
            border-left: 15px solid brown;
            position: relative;
        }
        .haoquanList{

        }
        .haoquanList .huodongItem{
            /*width: 48%;*/
            padding: 20px;
            box-sizing: border-box;
            background: #fff;
            display: inline-block;
            margin-top: 12px;
            box-shadow: 0 0 10px #c0bebe;
            /*margin-right: 3%;*/
            position: relative;
        }
        .haoquanList .huodongItem:nth-of-type(2n){
            margin-right: 0;
        }
        .haoquanList .huodongItem img{
            max-width: 100%;
            max-height: 100%;
        }
        .btn-haoquan-more{

        }
        .more{
            background: #e8012f;

            color: #fff;

            margin-top: 20px;

            line-height: 50px;

            text-align: center;
        }
        .shenqi{

        }
    </style>

    {{--迎战双十一--}}
    <div class="haoquan">
        <div class="huodongTitle">迎战双十一，好券送不停</div>
        <div style="width: 100%;margin-top: 12px;box-shadow: 0 0 10px #c0bebe;">
            <img style="max-height: 100%; max-width: 100%" src="/quan04.png" />
        </div>
        <div class="haoquanList">
            @for($t=6;$t<11;$t++)
            <div class="huodongItem">
                <img src="/huodongimg/{{$t}}.jpg" alt="">
            </div>
                @endfor
                <a href="/archive/quan"><div class="more">更多好券</div></a>
        </div>
    </div>
    <div class="shenqi">
        <div class="huodongTitle">神奇百货</div>
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







        <style>
            .article{
                margin-top: 20px;
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
        @if($shenqiArray)
            @foreach($shenqiArray as $item)
                {{--如果是纯文字，无缩略图--}}
                @if(!$item['icon'])
                    <a href="/article/{{$item['id']}}">
                        <div class="article">
                            <div class="article-header">
                                <h3 class="articletitle"><i class="layui-icon layui-icon-read"></i>{{$item['title']}}</h3>
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
                                <h3 class="articletitle"><i class="layui-icon layui-icon-read"></i>{{$item['title']}}</h3>
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

    <a href="/">
        <div style="color:brown;text-align: center;margin-top: 20px;background: #fff;border-radius: 3px;line-height: 50px;" class="moreItem">更多商品</div>
    </a>









@endsection