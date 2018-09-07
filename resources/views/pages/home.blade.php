<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/app.css" />
    <script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
    <link href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
</head>

<style>
    .logoBox{
        position: absolute;
        top: 3rem;
    }
    .logoBoxMain{

    }
    .logoTopTitle{
        position: absolute;
        bottom: -3.5rem;
        left: 0;
        right: 0;
        margin: 0 auto;
        display: inline-block;
        width: 66%;
        text-align: center;
        background: rgba(0,0,0,0.16);
        color: #fff;
        font-size: 1.5rem;
        line-height: 3rem;
    }
    .logo{
        width: 100%;
    }
    .menuBox{
        width: 91vw;
        margin: 0 auto;
        line-height: 2.5rem;
        /*text-align: center;*/
        color: #fff;
        letter-spacing: 2px;
        text-indent: 2px;
        margin-top: 79vw;
        margin-bottom: 9vw;
    }
    .menuBox a{
        color: #fff;
        /*font-weight: 600;*/
        display: inline-block;
        width: 40vw;
        text-align: center;
        border-left: 2px solid #fff;
        margin: 3vw 2vw;
        background: rgba(255,255,255,0.36);
        box-sizing: border-box;
    }
    .menuBox .item{
        line-height: 4rem;
    }
    .menuBox .item:first-child{
        background: limegreen;
        color: #fff;
        border-color: limegreen;

    }
</style>
<body>
<img class="topBg" src="/pages/img/topBg.png" />
<div class="logoBox">
    <div class="logoBoxMain">
        <div class="logoTopTitle">撸羊毛，就来极爱网</div>
        <img class="logo" src="/pages/img/logo-white.png" />
    </div>
</div>
{{--菜单区--}}
<div class="menuBox">
    @php
        dump($menuArray);
    @endphp
    @if($menuArray != 'null')
        @foreach($menuArray as $menuItem)
            <a class="item" href="{{$menuItem->href}}"><div>{{$menuItem->title}}</div></a>
        @endforeach
    @endif
    {{--首页线报--}}
    {{--<div class="item">首页线报</div>--}}
    {{--神价推荐--}}
    {{--<div class="item">神价推荐</div>--}}
    {{--拼团中心--}}
    {{--<div class="item">拼团中心</div>--}}
    {{--网红推荐--}}
    {{--<div class="item">网红推荐</div>--}}
</div>
<style>
    .articleList{
        margin-bottom: 9rem;
    }
    .articleItem{
        width: 90vw;
        min-height: 6rem;
        background: rgba(0,0,0,0.36);
        margin: 0 auto;
        margin-bottom: 4vw;
        padding: 4vw 4vw;
        position: relative;
    }
    .archiveTitle{
        width: 90vw;
        background: rgba(0,0,0,0.36);
        margin: 0 auto;
        margin-bottom: 6vw;
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
        display: inline-block!important;
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
</style>
{{--内容区--}}
{{--最新线报--}}
<div class="archiveTitle">最新线报</div>
<div class="articleList">
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
    <div class="articleItem articleItemImg">
        <div class="show">
            <div class="img">
                <img src="1" alt="">
            </div>
        </div>
        <div class="information">
            <div class="title">见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到</div>
            <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
        </div>
        <div class="time">2018-08-24 08:03:00</div>
    </div>
    <div class="articleItem articleItemImg">
        <div class="show">
            <div class="img">
                <img src="1" alt="">
            </div>
        </div>
        <div class="information">
            <div class="title">见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到</div>
            <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
        </div>
        <div class="time">2018-08-24 08:03:00</div>
    </div>
    <div class="articleItem articleItemWord">
        <div class="title">见识到了附近考虑发送到</div>
        <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
        <div class="time">2018-08-24 08:03:00</div>
    </div>
    <div class="articleItem articleItemImg">
        <div class="show">
            <div class="img">
                <img src="1" alt="">
            </div>
        </div>
        <div class="information">
            <div class="title">见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到</div>
            <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
        </div>
        <div class="time">2018-08-24 08:03:00</div>
    </div>
    <div class="articleItem articleItemWord">
        <div class="title">见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到见识到了附近考虑发送到</div>
        <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
        <div class="time">2018-08-24 08:03:00</div>
    </div>
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
    <div class="articleItem articleItemWord">
        <div class="title">见识到了附近考虑发送到</div>
        <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
        <div class="time">2018-08-24 08:03:00</div>
    </div>
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
    <div class="articleItem articleItemWord">
        <div class="title">见识到了附近考虑发送到</div>
        <div class="describe">山东矿机克里斯健康路附近跨境电商离开家发了多少<span class="dis-time">2018-08-24 08:11:24</span></div>
        <div class="time">2018-08-24 08:03:00</div>
    </div>

</div>
</body>


</html>