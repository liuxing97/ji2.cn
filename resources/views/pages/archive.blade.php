<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/app.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
</head>
<body>
<style>
    body{
        padding-top: 7rem;
        padding-bottom: 6rem;
    }
    .topSidebar{
        position: fixed;
        background: rgba(0,0,0,0.36);
        height: 4rem;
        line-height: 4rem;
        z-index: 999999;
        width: 100%;
        text-align: left;
        padding: 0 1rem;
        top:0;
    }
    .menuBox{
        display: none;
    }
    .menuBox .item{

    }

    .topSidebar .logo{
        max-width: 100%;
        max-height: 60%;
    }
    .menuList{
        display: table;
        float: right;
        width: 5rem;
        text-align: center;
        vertical-align: middle;
        height: 100%;
    }
    .menuList .display{
        line-height: 2rem;
        position: relative;
        top: 1rem;
        color: #fff;
        border-bottom: 2px solid #fff;
    }
    .menuList:hover .menuListBox{
        display: inline-block;
    }
    .menuListBox{
        /*display: block;*/
        margin-top: 1.5rem;
        color: #fff;
        display: none;
        width: 100%;
    }
    .menuListBox a{
        color: rgba(255,255,255,1);
    }
    .menuListBox .item{
        line-height: 2rem;
        background: rgba(0,0,0,0.36);
        margin-top: 0.5rem;
        width: 100%;
    }



    .articleItem{
        width: 90vw;
        min-height: 6rem;
        background: rgba(0,0,0,0.36);
        /*margin-bottom: 2rem;*/
        margin: 0 auto;
        /*margin-bottom: 0px;*/
        margin-bottom: 1rem;
        padding: 4vw 4vw;
        position: relative;
    }
    .archiveTitle{
        width: 90%;
        background: rgba(0,0,0,0.36);
        margin: 0 auto;
        margin-bottom: 1rem;
        line-height: 3rem;
        text-align: center;
        color: #fff;
        font-size: 1rem;
        letter-spacing: 2px;
        text-indent: 2px;}
    .articleItemImg{

    }
    .articleItemImg .show{
        width: 20vw;
        height: 20vw;
        display: inline-block;
        background: #fff;
    }
    .articleItemImg .img{

    }
    .articleItemImg .img img{

    }
    .articleItem .information{
        display: inline-block;
        width: 56vw;
        margin-left: 4vw;
        vertical-align: top;
    }
    .articleItemWord .title{
        color: #fff;
        font-weight: 600;
        border-left: 2px solid #f24646;
        padding-left: 1rem;
    }
    .articleItem .information .title{
        color: #fff;
        font-weight: 600;
    }
    .articleItemWord .describe{
        color: #fff;
        margin-top: 6px;
        font-size: 90%;
    }
    .articleItem .information .describe{
        color: #fff;
        margin-top: 6px;
        font-size: 90%;
    }
    .articleItem .information .title{
        color: #fff;
        /*margin-top: 6px;*/
        font-size: 90%;
    }
    .articleItem .time{
        position: absolute;
        bottom: -1.5rem;
        width: 100%;
        left: 0;
        text-align: right;
        color: #fff;
        margin-top: 10px;
        font-size: 0.8rem;
        display: none;
    }
    .dis-time{
        margin-top: 6px;
        display: block;
    }
    .articleItemWord .dis-time{
        margin-top: 6px;
        display: block;
        text-align: right;
    }
    .pageAct{
        text-align: center;
        margin-top: 3rem;
    }
    .pageAct .btn-page{
        display: inline-block;
        margin: 0 2rem;
        /*border: 1px solid #e5e5e5;*/
        width: 5rem;
        line-height: 2rem;
        color: #fff;
        background: rgba(0,0,0,0.36);
        border-radius: 3px;
    }
</style>

{{--顶部栏--}}
<div class="topSidebar">
    <a href="/"><img class="logo" src="/pages/img/logo-white.png" /></a>
    @if($menuData)
        <div class="menuList">
            <div class="display">{{$menuData['now']->title}}</div>
            <div class="menuListBox">
                @foreach($menuData['list'] as $menuItem)
                    <a target="{{$menuItem -> type}}" href="{{$menuItem -> href}}"><div class="item">{{$menuItem -> title}}</div></a>
                @endforeach
            </div>
        </div>
        @endif
</div>

<img class="topBg" src="/pages/img/topBg.png" />

{{--内容区--}}
@if($menuData)
    <div class="archiveTitle">{{$menuData['now']->title}}</div>
    @else
    <div class="archiveTitle">{{$archiveData['archive']}}</div>
    @endif
<div class="articleList">
    @if($dataListArray['data'])
        @foreach($dataListArray['data'] as $item)
            {{--如果是纯文字，无缩略图--}}
            @if(!$item['icon'])
                <div class="articleItem articleItemWord">
                    <div class="title">{{$item['title']}}</div>
                    {{--判断是否有描述，如果没有描述，截取头一段话，30位字符--}}
                    <div class="describe">{{$item['describe']}}<span class="dis-time">{{$item['created_at']}}</span></div>
                    <div class="time">{{$item['created_at']}}</div>
                </div>
                @else
                <div class="articleItem articleItemImg">
                    <div class="show">
                        <div class="img">
                            <img src="1" alt="">
                        </div>
                    </div>
                    <div class="information">
                        <div class="title">见识到了附近考虑发送到</div>
                        <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
                    </div>
                    <div class="time">2018-08-24 08:03:00</div>
                </div>
                @endif
            @endforeach
        @endif
</div>
<div class="pageAct">
    @if($dataListArray['prev_page_url'])
            <a href="{{$dataListArray['prev_page_url']}}"><div class="btn-page">上一页</div></a>
        @endif
    @if($dataListArray['next_page_url'])
        <a href="{{$dataListArray['next_page_url']}}"><div class="btn-page">下一页</div></a>
    @endif
</div>

</body>
</html>