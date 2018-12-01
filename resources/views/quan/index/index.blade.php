@extends("quan.layout")
@section('body')

@endsection
<style>
    html,body{
        background: #f6f7f9!important;
        padding-bottom: 50px;
    }
    .contentMain{
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }
    .app_header{
        /*background: #fff;*/
        padding: 12px 10px;
        position: relative;
    }
    .app_header .logo, .app_header .toggle, .app_header .login{
        display: inline-block;
        line-height: 24px;
        height: 24px;
        vertical-align: middle;
    }
    .app_header_top{
        position: relative;
    }
    .app_header .action{
        height: 22px;
        position: relative;
        top: 1px;
    }
    .app_header .action{
        float: right;
    }
    .app_header .action .layui-icon{
        font-size: 24px;
        color: #ed424b;
    }
    .app_header .toggle{
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        text-align: center;
    }
    .app_header .toggle .item{
        display: inline-block;

        text-align: center;

        width: 50px;
    }
    .app_header .toggle .item:first-child{
        background: #ed424b;

        color: #fff;
    }
</style>
<div class="contentMain">
    {{--头部--}}
    <div class="app_header">
        {{--顶部--}}
        <div class="app_header_top">
            {{--logo--}}
            <div class="logo">
                <img class="img" src="/log32.png">
            </div>
            {{--切换--}}
            <div class="toggle">
                <span class="item">资讯</span>
                <span class="item">团购</span>
            </div>
            {{--登录--}}
            <div class="action">
                <span class="layui-icon layui-icon-username"></span>
            </div>
        </div>
        {{--banner--}}
        <div class="ft-carousel" id="carousel">
            <style>
                #carousel{
                    width: 100%;
                    height: 120px;
                    font-size: 40px;
                    text-align: center;
                    margin-top: 10px;
                    background-color: #464576;
                }
            </style>
            <ul class="carousel-inner">
                <li class="carousel-item"><img src="/module/ft-carousel/img/a1.png" /></li>
                <li class="carousel-item"><img src="/module/ft-carousel//img/a2.png" /></li>
                <li class="carousel-item"><img src="/module/ft-carousel//img/a3.png" /></li>
                <li class="carousel-item"><img src="/module/ft-carousel//img/a4.png" /></li>
                <li class="carousel-item"><img src="/module/ft-carousel//img/a5.png" /></li>
                <li class="carousel-item"><img src="/module/ft-carousel//img/a6.png" /></li>
            </ul>
        </div>
    </div>
    {{--菜单--}}
    <div class="app_header_menu">
        <style>
            .app_header_menu{
                width: 100%;
                background: #fff;
                left: 0;
                margin-top: 10px;
                text-align: center;
                padding: 16px 0;
            }
            .app_header_menu .help{
                color: brown;
                border-bottom: 1px dashed #e5e5e5;
                line-height: 50px;
                position: relative;
                top: -15px;
                width: 90%;
                margin: 0 auto;
            }
            .app_header_menu .item{
                display: inline-block;
                width: 22%;
                margin-right: 6px;
                text-align: center;
                margin-bottom: 12px;
                vertical-align: top;
            }
            .app_header_menu .item:nth-of-type(4n){
                margin-right: 0;
            }
            .app_header_menu .item .icon{
                font-size: 28px;
                width: 40px;
                margin: 0 auto;
                height: 40px;
                color: #ababab;
                line-height: 40px;
            }
            .app_header_menu .icon-group-one{
                background-image: url("data:image/png;base64,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");
                background-size: 100px 100px;
                position: relative;
                top: 0;
                width: 35px!important;
                height: 34px!important;
            }
            .app_header_menu .item .title{

            }
            .app_header_menu .itemList{
                text-align: left;
                width: 90%;
                margin: 0 auto;
            }
        </style>
        <div class="help">一个以生活为驱动的电子商务网站。</div>
        <div class="itemList">
            <div class="item">
                <div class="icon"><img class="img" src="/icon-maney.png" alt=""></div>
                <div class="title">抢红包</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">本日热点</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">去拼团</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">悦动圈</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">科技圈</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">时尚圈</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">各种好券</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">本期拼团</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">自营商品</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-senior"></div>
                <div class="title">积分兑换</div>
            </div>
        </div>
    </div>
    {{--团购说明--}}
    <div class="funcDescribe">
        <style>
            .funcDescribe{
                padding: 10px 20px;
                background: #fff;
                margin-top: 12px;
                position: relative;
                border: 1px solid #e5e5e5;
                overflow: hidden;
            }
            .funcDescribeTitle{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                line-height: 32px;
                background: #fafafa;
                padding: 0 20px;
                color: #333;
                border-bottom: 1px solid #e5e5e5;
                font-weight: bold;
            }
            .funcDescribeValue{
                margin-top: 32px;
            }
            .funcDescribeValue p{
                line-height: 28px;
                /*margin-bottom: 10px;*/
            }
        </style>
        <div class="funcDescribeTitle">团购规则</div>
        <div class="funcDescribeValue">
            <p>官宣团购：官方宣传团购活动，每周日凌晨更新，满10人开团，开团价基础上还有更低，参与人数越多价格越低。</p>
            <p style="border-top: 1px dashed #e5e5e5;margin-top: 10px;padding-top: 10px;">其他商品：可单独购买，也可进行自行团购（满3人），或6位好友助力，即可享受团购价。</p>
        </div>
    </div>
    {{--转换按钮--}}
    <div class="toggleBox">
        <style>
            .toggleBox{
                text-align: center;
                margin-top: 30px;
            }
            .toggleBox .item:first-of-type{
                background: #ed424b;
                color: #fff;
            }
            .toggleBox .item{
                display: inline-block;

                text-align: center;

                width: 66px;

                line-height: 30px;

                margin: 0 16px;
            }
        </style>
        <div class="item">资讯</div>
        <div class="item">团购</div>
    </div>
    {{--本日热团--}}
    <div class="hotTuanBox contentMainBox">
        <style>
            .contentMainBox{

            }
            .contentMainBox .boxTitle{
                font-size: 16px;
                border-left: 2px solid #ed424b;
                font-weight: bold;
                padding-left: 12px;
            }
            .contentMainBox .boxTitle span{
                font-size: 14px;
                margin-left: 10px;
                color: #7a7a7a;
                font-weight: normal;
            }
            .hotTuanBox{
                width: 100%;
                overflow-x: auto;
                margin-top: 16px;
                position: relative;
                background: #fff;
                padding: 20px 10px;
                box-sizing: border-box;
            }
            .hotTuanBoxTitle{

            }
            .hotTuanBoxTitle span{
                font-size: 14px;
                margin-left: 10px;
                color: #7a7a7a;
                font-weight: normal;
            }
            .hotTuanListItem{

            }
            .hotTuanItem{
                width: 30%;
                height: 150px;
                /*background: #0d6aad;*/
                display: inline-block;
            }
            .hotTuanItem:last-of-type{

            }
            .hotTuanItemMain{
                width: 100%;
                /*background: #2ab27b;*/
                height: 150px;
            }
            .hotTuanItemMain .itemTitle{
                font-size: 12px;
                margin-top: 10px;
                height: 30px;
                overflow: hidden;
                color: #33373d;
            }
            #carousel2 .carousel-indicators{
                padding: 3px 10px;
                background: rgba(0, 0, 0, 0.33);
                width: 66px;
                margin: 0 auto;
                right: 0;
                border-radius: 38px;
                bottom: 0;
            }
            .hotTuanItemMain .itemIcon{
                padding: 10px;
                border: 1px solid #e5e5e5;
            }
            .hotTuanItemMain .itemPrice{
                font-size: 12px;
                margin-top: 6px;
                text-align: right;
                color: #7a7a7a;
            }
            .hotTuanItemMain .itemPrice .v{
                color: brown;
            }
            .hotTuanItemMain .team{
                border: 1px solid #e5e5e5;

                margin-top: 10px;

                text-align: center;

                position: relative;

                background: #b7b7b7;

                overflow: hidden;

                border-radius: 10px;
            }
            .hotTuanItemMain .team .v{

                color: #fff;

                position: relative;

                z-index: 999;

                font-size: 12px;
            }
            .hotTuanItemMain .team .b{
                position: absolute;
                top: 0;
                left: 0;
                background: #ab3d3d;
                width: 80%;
                height: 20px;
            }
        </style>
        <div class="hotTuanBoxTitle boxTitle">本周热团<span>官宣拼团，人越多价更低</span></div>
        <div class="ft-carousel" id="carousel2">
            <style>
                #carousel2{
                    width: 100%;
                    height: 232px;
                    font-size: 40px;
                    text-align: center;
                    /*margin: 20px auto;*/
                    margin-top: 26px;
                    /*background-color: #464576;*/
                }
            </style>
            <ul class="carousel-inner">
                @for($t=0;$t<3;$t++)
                    <li class="carousel-item">
                        <div class="hotTuanListItem">
                            @for($i=0;$i<3;$i++)
                                <div class="hotTuanItem">
                                    <div class="hotTuanItemMain">
                                        <div class="itemIcon">
                                            <img class="img" src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" alt="">
                                        </div>
                                        <div class="itemTitle">数据线三合一通用手机充电器多头功能快充苹果安卓一</div>
                                        <div class="itemPrice">开团价<span class="v">¥8394.00</span></div>
                                        {{--拼团情况·外层--}}
                                        <div class="team">
                                            {{--数字说明--}}
                                            <span class="v">711/10人起拼</span>
                                            {{--内层液态柱子--}}
                                            <span class="b"></span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </li>
                    @endfor
            </ul>
        </div>
    </div>
    {{--本日热点--}}
    {{--<div class="hotTop contentItemBox">--}}
        {{--<style>--}}
            {{--.contentItemBox{--}}

            {{--}--}}
            {{--.contentItemBoxTitle{--}}

            {{--}--}}
            {{--.articleItem{--}}

            {{--}--}}
            {{--.articleItem .title{--}}

            {{--}--}}
            {{--.articleItem .cover{--}}

            {{--}--}}
            {{--.articleItem .cover img{--}}

            {{--}--}}
        {{--</style>--}}
        {{--<div class="contentItemBoxTitle">本日热点资讯</div>--}}
        {{--<div class="hotTopList">--}}
            {{--@for($i=0;$i<10;$i++)--}}
                {{--<div class="articleItem">--}}
                    {{--<div class="title">小米与美图合作背后：美图的解脱，小米的多元化</div>--}}
                    {{--<div class="cover">--}}
                        {{--<img src="https://img.alicdn.com/imgextra/https://img.alicdn.com/imgextra/i4/2880071045/O1CN011JaeKs6qwY0g80N_!!2880071045.jpg_430x430q90.jpg" alt="">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endfor--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@section('js')
    <script>
        //        alert(1);
        $("#carousel").FtCarousel(
            {
                index: 0,
                auto: true,
                time: 3000,
                indicators: true,
                buttons: false
            }
        );
        $("#carousel2").FtCarousel(
            {
                index: 0,
                auto: true,
                time: 3000,
                indicators: true,
                buttons: false
            }
        );
    </script>
@endsection