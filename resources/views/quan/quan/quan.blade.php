@extends("quan.layout")
@section('body')

@endsection
    <style>
        html,body{
            background: #f6f7f9!important;
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
                        /*margin: 20px auto;*/
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
                    /*position: absolute;*/
                    /*height: 100px;*/
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
                    width: 20%;
                    margin-right: 15px;
                    text-align: center;
                    margin-bottom: 12px;
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
                {{--<div class="item">--}}
                {{--<div style="--}}
                {{--left: 3px;--}}
                {{--" class="icon icon-group-one">--}}
                {{--</div>--}}
                {{--<div class="title">本日热点</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div style="--}}
                {{--padding: 2px;--}}
                {{--box-sizing: border-box;--}}
                {{--position: relative;--}}
                {{--left: 2px;--}}
                {{--top: 1px;--}}
                {{--opacity: 0.88;--}}
                {{--" class="icon">--}}
                {{--<img class="img" src="/tuan.png" alt="">--}}
                {{--</div>--}}
                {{--<div class="title">去拼团</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div style="--}}
                {{--background-position-x: 210px;--}}

                {{--background-position-y: 69px;--}}

                {{--left: 3px;--}}

                {{--background-size: 105px 105px;--}}
                {{--" class="icon layui-icon icon-group-one"></div>--}}
                {{--<div class="title">去拼团</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div style="position: relative;top: 5px;" class="icon">--}}
                {{--<img class="img" src="/yue.png" alt="">--}}
                {{--</div>--}}
                {{--<div class="title">悦动圈</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div style="color: #a4c63e;" class="icon layui-icon layui-icon-app">--}}
                {{--</div>--}}
                {{--<div class="title">科技圈</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div class="icon layui-icon layui-icon-release"></div>--}}
                {{--<div class="title">时尚圈</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div class="icon layui-icon layui-icon-app"></div>--}}
                {{--<div class="title">各种好券</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div class="icon layui-icon layui-icon-app"></div>--}}
                {{--<div class="title">本期拼团</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div class="icon layui-icon layui-icon-app"></div>--}}
                {{--<div class="title">自营商品</div>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<div class="icon layui-icon layui-icon-app"></div>--}}
                {{--<div class="title">积分兑换</div>--}}
                {{--</div>--}}
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

        <div>
            <style>
                .goTuan{}
                .goTuanItem{
                    background: #fff;

                    margin-top: 20px;

                    padding: 32px 12px;

                    position: relative;
                }
                .goTuanItem .left{
                    display: inline-block;

                    margin-right: 5px;

                    width: 25%;
                }
                .goTuanItem .left .show{
                    width: 100%;

                    text-align: center;

                    padding: 10px;

                    box-sizing: border-box;

                    position: relative;

                    top: -5px;
                }
                .goTuanItem .right{
                    display: inline-block;

                    width: 70%;

                    vertical-align: top;
                }
                .goTuanItem .right .t{
                    margin-bottom: 10px;

                    font-weight: bold;

                    color: #4d4d4d;
                }
                .goTuanItem .right .self{
                    background: brown;

                    color: #fff;

                    display: inline-block;

                    padding: 2px 5px;

                    border-radius: 3px;

                    font-size: 14px;
                }
                .goTuanItem .right .p{
                    margin-top: 10px;

                    color: brown;

                    font-weight: bold;
                }
                .goTuanItem .right .p-h{
                    margin-top: 10px;

                    font-size: 13px;

                    color: #7a7a7a;
                }
                .goTuanItem .right .team{
                    border: 1px solid #e5e5e5;

                    margin-top: 10px;

                    text-align: center;

                    position: relative;

                    background: #eaeaea;
                }
                .goTuanItem .right .team .v{
                    color: #fff;

                    position: relative;

                    z-index: 999;
                }
                .goTuanItem .right .team .b{
                    position: absolute;

                    top: 0;

                    left: 0;

                    background: #57ba57;

                    width: 80%;

                    height: 20px;
                }
                .goTuanItem .buyBtn{
                    margin-top: 20px;

                    text-align: right;
                }
                .goTuanItem .buyBtn .item{
                    display: inline-block;

                    line-height: 30px;

                    margin-left: 10px;

                    background: #57ba57;

                    padding: 0 22px;

                    color: #fff;

                    border-radius: 30px;
                    box-sizing: border-box;
                    height: 30px;
                }
            </style>
            {{--三个圈子--}}
            <style>
                .quan_block{
                    background: #fff;

                    margin-top: 27px;

                    border: 1px solid #e5e5e5;
                }
                .quan_block_header{
                    text-align: center;
                    line-height: 77px;
                    font-size: 22px;
                    background: #f8f8f8
                }
                .quan_block .articleList{}
                .quan_block .articleList .articleItem{
                    border-top: 1px solid #e5e5e5;

                    padding: 12px 20px;
                }
                .quan_block .articleList .articleItem .t{
                    font-size: 18px;
                    line-height: 34px;
                    padding-left: 12px;
                    position: relative;

                }
                .quan_block .articleList .articleItem .t .left{
                    border-left: 2px solid brown;
                    display: inline-block;
                    line-height: 34px;
                    position: absolute;
                    left: 0;
                }
                .quan_block .articleList .articleItem .v{
                    color: #7a7a7a;
                    line-height: 1.5rem;
                    margin-top: 14px;
                    border-top: 1px dashed #e5e5e5;
                    padding: 12px 0;
                    /*height: 81px;*/
                    /*overflow: hidden;*/
                }
                .quan_block .articleList .articleItem .v .i{
                    float: left;
                    width: 100px;
                    height: 100px;
                    margin-right: 14px;
                    margin-top: 8px;
                }
                .quan_block .articleList .articleItem .p{
                    margin-top: 18px;
                }
                .quan_block .articleList .articleItem .p .p-icon{
                    width: 32px;

                    display: inline-block;

                    box-sizing: border-box;

                    margin-right: 6px;
                }
                .quan_block .articleList .articleItem .p .p-name{
                    display: inline-block;
                    color: #9e9e9e;
                }
                .quan_block .articleList .articleItem .article-time{
                    text-align: center;

                    color: #8d8d8d;

                    line-height: 56px;

                    border-top: 1px dashed #e5e5e5;

                }
            </style>
            <div class="quan_block">
                <div class="quan_block_header">
                    <div>悦动圈·热点</div>
                </div>
                <div class="articleList">
                    @for($i=0;$i<5;$i++)
                        <div class="articleItem">
                            <div class="t">
                                <span class="left">&nbsp;</span>
                                <span>小米与美图合作背后：美图的解脱，小米的多元化</span>
                            </div>
                            <div class="p">
                                <div class="p-icon">
                                    <img class="img" src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132"
                                         alt=""></div>
                                <div class="p-name">简约不失繁华</div>
                                {{--<div class="p-time">发布时间：2018-11-20 08:23:83</div>--}}
                            </div>
                            <div class="v">
                                <div class="i">
                                    <div style="
                                /*vertical-align: middle;*/
                                /*display: table-cell;*/
                                height: 100px;
                                /*border: 1px solid #e5e5e5;*/
                                /*padding: 5px;*/
                                box-sizing: border-box;
                                ">
                                        <img class="img" src="http://cms-bucket.nosdn.127.net/2018/11/20/00d4ca78e67e47fca08dabee9567f43a.png?imageView&thumbnail=190y120">

                                    </div>
                                </div>
                                <span>
                                南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯【包邮】【在售价】268.00元【下单链接】https://m
                            </span>
                                {{--美图手机则定位高端女性，小米的这一举动不仅可以将女性最关注的“自拍技术”纳入体系，而且将美图手机流量带入进来，还增加了女性用户市场。但是否能如愿达到效果，还有待市场检验。--}}
                            </div>
                            <div class="article-time">发布时间：2018-11-20 08:23:83</div>
                        </div>
                    @endfor
                </div>
                <div style="
                text-align: center;
                line-height: 50px;
                border-top: 1px solid #e5e5e5;
                font-size: 14px;
                color: #646464;
                letter-spacing: 6px;
                background: #f7f7f7;
">阅读更多</div>
            </div>
            <style>
                .quan_tuan{}
            </style>
            <div class="quan_tuan">
                <style>
                    .quan_tuan{
                        border: 1px solid #e5e5e5;

                        margin-top: 20px;
                    }
                    .quan_tuan .goTuanItem{
                        margin-top: 0;

                        border-top: 1px solid #e5e5e5;
                    }
                    .quan_tuan .quan_tuan_title{
                        line-height: 77px;

                        background: #fff;

                        text-align: center;

                        background: #f7f7f7;

                        font-size: 18px;

                        font-weight: bold;

                        color: #6f6f6f;
                    }
                </style>
                <div class="quan_tuan_title">圈内拼团</div>
                @for($i=0;$i<4;$i++)
                    <div class="goTuanItem">
                        {{--左侧样图--}}
                        <div class="left">
                            <div class="show">
                                <img class="img" src="https://img.alicdn.com/imgextra/https://img.alicdn.com/imgextra/i4/2880071045/O1CN011JaeKs6qwY0g80N_!!2880071045.jpg_430x430q90.jpg" />
                            </div>
                        </div>
                        {{--右侧信息--}}
                        <div class="right">
                            {{--标题--}}
                            <div class="t">南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯</div>
                            {{--自营标签--}}
                            <div class="self">自营</div>
                            {{--价格--}}
                            <div class="p"><span>¥</span>99.9（起团价）</div>
                            {{--起团价说明--}}
                            <div class="p-h">起团价：基础价格，拼团人数越多，价格越低。</div>
                            {{--拼团情况·外层--}}
                            <div class="team">
                                {{--数字说明--}}
                                <span class="v">711/10人起拼</span>
                                {{--内层液态柱子--}}
                                <span class="b"></span>
                            </div>
                            {{--去拼团--}}
                            <div class="buyBtn">
                                {{--独立购--}}
                                <div style="color: brown;

border: 1px solid brown;
background: none;
" class="item">独立购</div>
                                {{--去拼团--}}
                                <div style="
border: 1px solid #57ba57;
" class="item">去拼团</div>
                            </div>
                        </div>
                    </div>
                @endfor
                <div style="
                text-align: center;
                line-height: 50px;
                border-top: 1px solid #e5e5e5;
                font-size: 14px;
                color: #646464;
                letter-spacing: 6px;
                background: #f7f7f7;
">本期拼团</div>
            </div>
            <div class="quan_block">
                <div class="quan_block_header">
                    <div>科技圈</div>
                    <a style="display: none" href="/2.0/index">
                        <div style="
                    color: brown;
                    font-size: 15px;
                    position: relative;
                    line-height: 30px;
                    top: -6px;
                    letter-spacing: 3px;
                "><span class="layui-icon layui-icon-tree"></span>进入圈子</div>
                    </a>
                </div>
                <div class="articleList">
                    @for($i=0;$i<5;$i++)
                        <div class="articleItem">
                            <div class="t">
                                <span class="left">&nbsp;</span>
                                <span>小米与美图合作背后：美图的解脱，小米的多元化</span>
                            </div>
                            <div class="p">
                                <div class="p-icon">
                                    <img class="img" src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132"
                                         alt=""></div>
                                <div class="p-name">简约不失繁华</div>
                                {{--<div class="p-time">发布时间：2018-11-20 08:23:83</div>--}}
                            </div>
                            <div class="v">
                                <div class="i">
                                    <div style="
                                /*vertical-align: middle;*/
                                /*display: table-cell;*/
                                height: 100px;
                                /*border: 1px solid #e5e5e5;*/
                                /*padding: 5px;*/
                                box-sizing: border-box;
                                ">
                                        <img class="img" src="http://cms-bucket.nosdn.127.net/2018/11/20/00d4ca78e67e47fca08dabee9567f43a.png?imageView&thumbnail=190y120">

                                    </div>
                                </div>
                                <span>
                                南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯【包邮】【在售价】268.00元【下单链接】https://m
                            </span>
                                {{--美图手机则定位高端女性，小米的这一举动不仅可以将女性最关注的“自拍技术”纳入体系，而且将美图手机流量带入进来，还增加了女性用户市场。但是否能如愿达到效果，还有待市场检验。--}}
                            </div>
                            <div class="article-time">发布时间：2018-11-20 08:23:83</div>
                        </div>
                    @endfor
                </div>
                <div style="
                text-align: center;
                line-height: 50px;
                border-top: 1px solid #e5e5e5;
                font-size: 14px;
                color: #646464;
                letter-spacing: 6px;
                background: #f7f7f7;
">阅读更多</div>
            </div>
            <div class="quan_tuan">
                <div class="quan_tuan_title">圈内拼团</div>
                @for($i=0;$i<4;$i++)
                    <div class="goTuanItem">
                        {{--左侧样图--}}
                        <div class="left">
                            <div class="show">
                                <img class="img" src="https://img.alicdn.com/imgextra/https://img.alicdn.com/imgextra/i4/2880071045/O1CN011JaeKs6qwY0g80N_!!2880071045.jpg_430x430q90.jpg" />
                            </div>
                        </div>
                        {{--右侧信息--}}
                        <div class="right">
                            {{--标题--}}
                            <div class="t">南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯</div>
                            {{--自营标签--}}
                            <div class="self">自营</div>
                            {{--价格--}}
                            <div class="p"><span>¥</span>99.9（起团价）</div>
                            {{--起团价说明--}}
                            <div class="p-h">起团价：基础价格，拼团人数越多，价格越低。</div>
                            {{--拼团情况·外层--}}
                            <div class="team">
                                {{--数字说明--}}
                                <span class="v">711/10人起拼</span>
                                {{--内层液态柱子--}}
                                <span class="b"></span>
                            </div>
                            {{--去拼团--}}
                            <div class="buyBtn">
                                {{--独立购--}}
                                <div style="color: brown;

border: 1px solid brown;
background: none;
" class="item">独立购</div>
                                {{--去拼团--}}
                                <div style="
border: 1px solid #57ba57;
" class="item">去拼团</div>
                            </div>
                        </div>
                    </div>
                @endfor
                <div style="
                text-align: center;
                line-height: 50px;
                border-top: 1px solid #e5e5e5;
                font-size: 14px;
                color: #646464;
                letter-spacing: 6px;
                background: #f7f7f7;
">本期拼团</div>
            </div>
            <div class="quan_block">
                <div class="quan_block_header">
                    <div>时尚圈</div>
                    <a style="display: none" href="/2.0/index">
                        <div style="
                    color: brown;
                    font-size: 15px;
                    position: relative;
                    line-height: 30px;
                    top: -6px;
                    letter-spacing: 3px;
                "><span class="layui-icon layui-icon-tree"></span>进入圈子</div>
                    </a>
                </div>
                <div class="articleList">
                    @for($i=0;$i<5;$i++)
                        <div class="articleItem">
                            <div class="t">
                                <span class="left">&nbsp;</span>
                                <span>小米与美图合作背后：美图的解脱，小米的多元化</span>
                            </div>
                            <div class="p">
                                <div class="p-icon">
                                    <img class="img" src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132"
                                         alt=""></div>
                                <div class="p-name">简约不失繁华</div>
                                {{--<div class="p-time">发布时间：2018-11-20 08:23:83</div>--}}
                            </div>
                            <div class="v">
                                <div class="i">
                                    <div style="
                                /*vertical-align: middle;*/
                                /*display: table-cell;*/
                                height: 100px;
                                /*border: 1px solid #e5e5e5;*/
                                /*padding: 5px;*/
                                box-sizing: border-box;
                                ">
                                        <img class="img" src="http://cms-bucket.nosdn.127.net/2018/11/20/00d4ca78e67e47fca08dabee9567f43a.png?imageView&thumbnail=190y120">

                                    </div>
                                </div>
                                <span>
                                南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯【包邮】【在售价】268.00元【下单链接】https://m
                            </span>
                                {{--美图手机则定位高端女性，小米的这一举动不仅可以将女性最关注的“自拍技术”纳入体系，而且将美图手机流量带入进来，还增加了女性用户市场。但是否能如愿达到效果，还有待市场检验。--}}
                            </div>
                            <div class="article-time">发布时间：2018-11-20 08:23:83</div>
                        </div>
                    @endfor
                </div>
                <div style="
                text-align: center;
                line-height: 50px;
                border-top: 1px solid #e5e5e5;
                font-size: 14px;
                color: #646464;
                letter-spacing: 6px;
                background: #f7f7f7;
">阅读更多</div>
            </div>
            <div class="quan_tuan">
                <div class="quan_tuan_title">圈内拼团</div>
                @for($i=0;$i<4;$i++)
                    <div class="goTuanItem">
                        {{--左侧样图--}}
                        <div class="left">
                            <div class="show">
                                <img class="img" src="https://img.alicdn.com/imgextra/https://img.alicdn.com/imgextra/i4/2880071045/O1CN011JaeKs6qwY0g80N_!!2880071045.jpg_430x430q90.jpg" />
                            </div>
                        </div>
                        {{--右侧信息--}}
                        <div class="right">
                            {{--标题--}}
                            <div class="t">南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯</div>
                            {{--自营标签--}}
                            <div class="self">自营</div>
                            {{--价格--}}
                            <div class="p"><span>¥</span>99.9（起团价）</div>
                            {{--起团价说明--}}
                            <div class="p-h">起团价：基础价格，拼团人数越多，价格越低。</div>
                            {{--拼团情况·外层--}}
                            <div class="team">
                                {{--数字说明--}}
                                <span class="v">711/10人起拼</span>
                                {{--内层液态柱子--}}
                                <span class="b"></span>
                            </div>
                            {{--去拼团--}}
                            <div class="buyBtn">
                                {{--独立购--}}
                                <div style="color: brown;

border: 1px solid brown;
background: none;
" class="item">独立购</div>
                                {{--去拼团--}}
                                <div style="
border: 1px solid #57ba57;
" class="item">去拼团</div>
                            </div>
                        </div>
                    </div>
                @endfor
                <div style="
                text-align: center;
                line-height: 50px;
                border-top: 1px solid #e5e5e5;
                font-size: 14px;
                color: #646464;
                letter-spacing: 6px;
                background: #f7f7f7;
">本期拼团</div>
            </div>
        </div>
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
    </script>
@endsection