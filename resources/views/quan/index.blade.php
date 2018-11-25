@extends("quan.layout")
@section('body')
    <style>
        .fixMenu{
            display: none;
            position: fixed;

            bottom: 10px;

            right: 10px;

            text-align: center;

            z-index: 9999;

            background: #2ea52e;

            padding: 10px;

            color: #fff;

            border-radius: 3px;
        }
        .fixMenu .layui-icon{
            font-size: 22px;
        }
    </style>
    {{--菜单--}}
    <div class="fixMenu">
        <div class="layui-icon layui-icon-spread-left"></div>
        <div>菜单</div>
    </div>
    {{--背景--}}
    <style>
        .app_header{
            /*background: #35b44a;*/
            background: #2ea52e;
            min-height: 100px;
            width: 100%;
            padding: 20px 24px;
            box-sizing: border-box;
            padding-top: 40px;
            padding-bottom: 40px;
            border-radius: 15px;
            margin-top: -15px;
        }
        .logoBox{
            width: 200px;
            margin: 0 auto;
            /*margin-top: 28px;*/
        }
        .logoBox img{
            width: 100%;
        }
        .app_describe{
            background: #fff;
            margin-top: 24px;
        }
        .app_describe_top_logo{
            display: inline-block;
            width: 22%;
            float: left;
            border-right: 1px solid #e5e5e5;
            padding-right: 2%;
        }
        .app_describe_top_msg{
            float: left;
            font-size: 14px;
            color: #7f7f7f;
            width: 68%;
            margin-left: 7%;
        }
        .app_describe_top_msg p{
            font-size: 13px;
            /*letter-spacing: 2px;*/
        }
        .app_describe_top_msg p:last-child{
            margin-top: 6px;
        }
        .app_describe_top{
            width: 90%;
            margin: 0 auto;
            box-sizing: border-box;
            padding: 20px 0;
        }
        .app_describe_bottom{
            line-height: 22px;
            font-size: 14px;
            text-align: center;
            border-top: 1px solid #e5e5e5;
            width: 92%;
            color: #6a6a6a;
            margin: 0 auto;
            padding: 10px 10px;
            box-sizing: border-box;
        }
        .app_mrt{
            padding: 16px 36px;

            background: #fff;

            margin-top: 36px;

            /*border: 1px solid #e5e5e5;*/

            /*box-shadow: 0 0 10px #cecece;*/

            border-radius: 12px;
        }
        .mrt-logoBox{
            width: 100px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
    <style>
        .appFixMenu{
            position: fixed;
            z-index: 99999;
            background: rgba(0, 0, 0, 0.59);

            color: #fff;

            width: 136px;

            line-height: 28px;

            line-height: 36px;

            text-align: center;

            bottom: 20px;

            border-radius: 40px;

            left: 20px;

            left: 0;

            right: 0;

            margin: 0 auto;
        }
        .appFixMenu .this{}
        .appFixMenu .layui-icon{
            margin-left: 8px;

            position: relative;

            top: 1px;
        }
    </style>
    <div class="appFixMenu"><span class="this">名人堂</span><span class="layui-icon layui-icon-spread-left"></span></div>
    {{--应用标签--}}
    <style>
        .appLabel{
            position: absolute;
            top: 0;
            left: 0;
            background: #fff;
            height: 100%;
            z-index: 9999;
            box-shadow: 0 0 10px #7a7a7a;
            padding: 16px 0;
            width: 210px;
        }
        .appLabel .i:nth-of-type(1){
            text-align: center;
            padding: 16px 18px;
            line-height: 28px;
            color: #868686;
        }
        .appLabel .i:nth-of-type(1) .layui-icon{
            margin-left: 0;
        }
        .appLabel .i{
            width: 210px;
            line-height: 50px;
            box-sizing: border-box;
            padding: 0 20px;
            padding-left: 26px;
            color: #424242;
        }
        .appLabel .i:nth-of-type(2){
            background: #f2f2f2;
            border-left: 6px solid brown;
            color: brown;
        }
        .appLabel .i .layui-icon{
            margin-left: 20px;
            font-size: 20px;
            position: relative;
            top: 3px;
        }
        .app_header,.app_mrt,.help-point,.app_body{
            position: relative;
            left: 225px;
        }
    </style>
    <div class="appLabel">
        <div style="position: fixed">
            <div class="i">
                {{--<span class="layui-icon layui-icon-share"></span>--}}
                爱运动，爱科技，爱生活，更爱极爱网。
            </div>
            {{--<div>顶部</div>--}}
            <div class="i"><span>名人堂</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>科技圈</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>时尚圈</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>惠购物</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>TOP热点</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>全部分类</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>积分兑换</span><span class="layui-icon layui-icon-senior"></span></div>
        </div>
        {{--<div class="i">悦动圈</div>--}}
        {{--<div class="i">科技圈</div>--}}
        {{--<div class="i">时尚圈</div>--}}
        {{--<div class="i">惠购物</div>--}}
        {{--<div class="i">TOP热点</div>--}}
        {{--<div class="i">全部分类</div>--}}
        {{--<div class="i">积分兑换</div>--}}
    </div>
    {{--应用头部--}}
    <div class="app_header">
        {{--Logo--}}
        <div class="logoBox">
            <img src="/quan/logo.png" >
        </div>
        {{--应用描述--}}
        <div class="app_describe">
            {{--介绍--}}
            <div class="app_describe_top">
                {{--极爱网Logo--}}
                <div class="app_describe_top_logo">
                    <div class="table">
                        <div class="table-cell">
                            <img style="max-width: 100%;" src="/quan/logo2.png">
                        </div>
                    </div>
                </div>
                {{--极爱网介绍--}}
                <div class="app_describe_top_msg">
                    <p>极爱网，爱运动，爱科技，爱生活，更爱极爱网。</p>
                    <p>一个以生活为驱动的，电子商务网站。</p>
                </div>
                <div class="clear"></div>
            </div>
            {{--描述--}}
            <div class="app_describe_bottom">
                <p>我们的理念，以生活为驱动的电子商务网站！</p>
            </div>
        </div>
        {{--几个圈子入口--}}
        <style>
            .circle_entry{
                text-align: center;
                margin-top: 15px;
            }
            .circle_entry .item{
                display: inline-block;
                width: 100px;
            }
            .circle_entry .item .bottom{
                height: 18px;
                width: 25px;
                border-bottom: 2px dashed #fff;
                margin: 0 auto;
            }
        </style>
        <div class="circle_entry">
            <div class="item">
                <img class="img" src="/quan/yuedongquan.png">
                <div class="bottom"></div>
            </div>
            <div class="item">
                <img class="img" src="/quan/shishangquan.png">
                <div class="bottom"></div>
            </div>
            <div class="item">
                <img class="img" src="/quan/kejiquan.png">
                <div class="bottom"></div>
            </div>
        </div>
        {{--圈子介绍--}}
        <style>
            .circle_about{
                color: #fff;
                margin-top: 33px;
            }
            .circle_about .c-item{
                margin-top: 6px;

                line-height: 26px;

                text-align: center;
            }
            .circle_about .c-item .t{
                display: inline-block;

                width: 21%;
            }
            .circle_about .c-item .v{
                display: inline-block;

                width: 77%;

                vertical-align: top;

                text-align: left;
            }
        </style>
        <div class="circle_about">
            <div class="c-item">
                <div class="t">悦动圈：</div>
                <div class="v">分享运动生活，挑战自我！更有运动奖励</div>
            </div>
            <div class="c-item">
                <div class="t">科技圈：</div>
                <div class="v">来来来，分享阅读最新科技咨询，大家一起做科技达人</div>
            </div>
            <div class="c-item">
                <div class="t">科技圈：</div>
                <div class="v">快快快，时尚是什么？大家一起来交流</div>
            </div>
        </div>
    </div>
    <style>
        .huodongTuiguang .title{}
    </style>
    {{--活动推广--}}
    <div class="huodongTuiguang">
        <div class="title">活动推广</div>
        <div class="v">转发领红包</div>
    </div>
    {{--名人堂--}}
    <div class="app_mrt">
        <div class="mrt-logoBox">
            <img class="img" src="/quan/mingrentang.png">
        </div>
        <style>
            .mrt-badge_list{}
            .mrt-badge_list-main{
                margin-top: 20px;

                height: 360px;

                overflow: hidden;
            }
            .show_or_hide{
                text-align: center;
                color: #4e4e4e;
                width: 50%;
                margin: 0 auto;
                border-top: 2px dashed #c3c3c3;
                margin-top: 40px;
                padding-top: 6px;

            }
            .show_or_hide span{
                font-size: 37px;

                opacity: 0.7;
            }
            .mrt-badge_list-main .item{
                margin-bottom: 30px;
            }
            .mrt-badge_list-main .item .item-badge{
                padding-bottom: 23px;
                border-bottom: 2px dashed #e3e3e3;
            }
            .mrt-badge_list-main .item .item-badge .icon{
                display: inline-block;
                width: 22%;
                vertical-align: middle;
            }
            .mrt-badge_list-main .item .item-badge .describe{
                background: url("/quan/badge/yuedongquan.png") no-repeat;
                display: inline-block;
                width: 68%;
                background-size: 34%;
                padding-top: 37px;
                vertical-align: middle;
                /*color: #fff;*/
                font-size: 14px;
                position: relative;
                top: 6px;
            }
            .mrt-badge_list-main .item .item-badge .describe .t{
                margin-top: 6px;
                color: brown;
            }
            .mrt-badge_list-main .item .item-badge .describe .v{
                margin-top: 6px;

                color: #adadad;

                line-height: 1.8rem;

            }
            .mrt-badge_list-main .item .item-state{
                position: relative;
                font-size: 14px;
                /*color: #fff;*/
                padding: 10px 0;
            }
            .mrt-badge_list-main .item .item-state .number{
                color: brown;
            }
            .mrt-badge_list-main .item .item-state .msg{
                margin-top: 2rem;

                color: #adadad;

                line-height: 1.8rem;
            }
            .mrt-badge_list-main .item .item-state .join{
                background: brown;
                display: inline-block;
                width: 100px;
                text-align: center;
                line-height: 30px;
                border-radius: 3px;
                margin-top: 10px;
                position: absolute;
                color: #fff;
                top: 0;
                right: 0;
            }
        </style>
        {{--徽章列表--}}
        <div class="mrt-badge_list">
            {{--列表--}}
            <div class="mrt-badge_list-main">
                <div class="item">
                    <div class="item-badge">
                        <div class="icon">
                            <img class="img" src="/quan/badge/badge-run-30-color.png">
                        </div>
                        <div class="describe">
                            <p class="t">青铜跑者</p>
                            <p class="v">联系30天，3000米跑步，挑战达成，即可获得该徽章！</p>
                        </div>
                    </div>
                    <div class="item-state">
                        {{--达成人数--}}
                        <p class="number">
                            达成人数：<span>0人</span>&nbsp;&nbsp;&nbsp;<span>+1000积分</span>
                        </p>
                        {{--荣誉信息--}}
                        <p class="msg">
                            看似平凡，却很难得，看似难得，却也很简单，唯一可以确定的是，这是伟大人生的第一步，来挑战吧！
                        </p>
                        {{--加入挑战--}}
                        <div class="join">加入挑战</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item-badge">
                        <div class="icon">
                            <img class="img" src="/quan/badge/badge-run-30-color.png">
                        </div>
                        <div class="describe">
                            <p class="t">科技狂魔</p>
                            <p class="v">连续30天，发表科技文章！</p>
                        </div>
                    </div>
                    <div class="item-state">
                        {{--达成人数--}}
                        <p class="number">
                            达成人数：<span>0人</span>&nbsp;&nbsp;&nbsp;<span>+1000积分</span>
                        </p>
                        {{--荣誉信息--}}
                        <p class="msg">
                            看似平凡，却很难得，看似难得，却也很简单，唯一可以确定的是，这是伟大人生的第一步，来挑战吧！
                        </p>
                        {{--加入挑战--}}
                        <div class="join">加入挑战</div>
                    </div>
                </div>
                <div class="item">
                    <div class="item-badge">
                        <div class="icon">
                            <img class="img" src="/quan/badge/badge-run-30-color.png">
                        </div>
                        <div class="describe">
                            <p class="t">青铜跑者</p>
                            <p class="v">联系30天，3000米跑步，挑战达成，即可获得该徽章！</p>
                        </div>
                    </div>
                    <div class="item-state">
                        {{--达成人数--}}
                        <p class="number">
                            达成人数：<span>0人</span>&nbsp;&nbsp;&nbsp;<span>+1000积分</span>
                        </p>
                        {{--荣誉信息--}}
                        <p class="msg">
                            看似平凡，却很难得，看似难得，却也很简单，唯一可以确定的是，这是伟大人生的第一步，来挑战吧！
                        </p>
                        {{--加入挑战--}}
                        <div class="join">加入挑战</div>
                    </div>
                </div>
            </div>
            {{--隐藏与展示--}}
            <div class="show_or_hide">
                {{--隐藏--}}
                <span style="display: none" class="layui-icon-up layui-icon"></span>
                <span class="layui-icon-down layui-icon"></span>
                {{--显示全部--}}
            </div>
        </div>
    </div>
    <style>
        .app_body{}
        .classOfArchive{
            /*height: 120px;*/

            background: #ffffff;

            margin-top: 36px;

            border-radius: 9px;

            /*box-shadow: 0 0 10px #afafaf;*/

            overflow: hidden;
        }
        .classOfArchive .icon{
            width: 120px;

            height: 120px;

            box-sizing: border-box;

            font-size: 22px;

            padding: 32px;

            display: inline-block;

            vertical-align: middle;
        }
        .classOfArchive .icon_after{
            position: relative;
            left: -20px;
            display: inline-block;

        }
        .classOfArchive .then{
            display: inline-block;

            font-size: 16px;

            color: #454545;

            letter-spacing: 6px;

            padding: 10px;

            border-bottom: 2px solid brown;

            position: relative;
        }
    </style>
    <style>
        .help-point{
            margin-top: 30px;
            background: #fff;
            border: 1px solid #e5e5e5;
            /*padding: 8px 12px;*/
        }
        .help-point .t{
            padding: 8px 12px;
            border-bottom: 1px dashed #e5e5e5;
            color: #393939;
        }
        .help-point .v{
            line-height: 30px;
            color: #7a7a7a;
            padding: 8px 12px;
            text-align: center;
        }
    </style>
    {{--积分规则--}}
    <div class="help-point">
        <div class="t">积分使用指南</div>
        <div class="v">
            每积分可抵扣0.01人民币<br>
            积分可用来抵扣本站自营商品<br>
            仅部分商品，不可全部抵扣
        </div>
    </div>
    {{--应用中部--}}
    <div class="app_body">
        {{--本期推荐·每个星期的软文--}}
        {{--本周主题--}}
        <style>
            .weekShow{
                background: #fff;
                margin-top: 20px;
                padding: 20px 20px;
                border-radius: 12px;
                /*box-shadow: 0 0 10px #cdcdcd;*/
            }
            .more_top{}
        </style>
        <div class="weekShow">
            <div style="font-size: 22px;color: brown;">惠购物（周推）</div>
            <div style="color: brown;margin-top: 20px;padding-top: 20px;border-top: 1px dashed #d2d2d2">
                <img class="img" src="/chihuo.jpg" alt="">
            </div>
        </div>
        {{--今日最热·从运动圈·科技圈·时尚圈中挑选热门文章·按热度进行排名--}}
        <style>
            .quanTop{
                margin-top: 35px;
                background: #fff;
                padding: 12px 20px;
                box-sizing: border-box;
                border-radius: 8px;
                /*box-shadow: 0 0 10px #d4d4d4;*/
            }
            .quan_hasPhoto{}
            .quan_header{}
            .quan_header .quan_title{
                display: inline-block;
                vertical-align: middle;
                line-height: 40px;
                font-size: 18px;
            }
            .quan_header .publisher{
                display: inline-block;
                vertical-align: middle;
                line-height: 40px;
                float: right;
                text-align: right;
                position: relative;
                top: -1px;
            }
            .quan_header .publisher .n{
                display: inline-block;
                vertical-align: middle;
                margin-right: 12px;
                padding-right: 12px;
                color: #7a7a7a;
                border-right: 1px solid #e5e5e5;
            }
            .quan_header .publisher .i{
                width: 30px;
                height: 30px;
                display: inline-block;
                /*vertical-align: middle;*/
            }
            .quan_header .badge{
                vertical-align: middle;
                display: block;
                margin-top: 12px;
                text-align: center;
            }
            .quan_header .badge .t{
                display: block;
                vertical-align: middle;
                color: #7a7a7a;
            }
            .quan_header .badge .v{
                vertical-align: middle;
                display: inline-block;
                margin-top: 12px;
                letter-spacing: 8px;
            }
            .quan_header .badge .v .item{
                display: inline-block;
                width: 60px;
                /*background: brown;*/
                text-align: right;
            }
            .quan_content{
                min-height: 100px;

                border-top: 1px dashed #a6a6a6;

                margin-top: 16px;

                padding: 12px 6px;

                line-height: 26px;

                color: #7a7a7a;
            }
            .quan_content .words{
            }
            .quan_content .photoList{

                width: 80%;

                margin: 0 auto;

                margin-top: 26px;

                margin-bottom: 12px;
            }
            .quan_content .photoList .item{
                display: inline-block;

                width: 30%;

                margin-right: 2.5%;

                border: 1px solid #e5e5e5;

                padding: 6px;

                box-sizing: border-box;
            }
            .quan_content .photoList .item:nth-of-type(3n){
                margin-right: 0;
            }
            .quan_content .photoList .item img{
                max-width: 100%;

                max-height: 100%;
            }
        </style>
        @for($t=1;$t<11;$t++)
            <div class="quanTop quan-hasPhoto">
                {{--圈名称-发布人-头衔--}}
                <div class="quan_header">
                    {{--圈名称-left--}}
                    <div class="quan_title"><span>本日热点</span><span>·Top{{$t}}</span></div>
                    {{--发布人：right，从左向右--}}
                    <div class="publisher">
                        {{--发布人名称--}}
                        <div class="n">简约不失繁华</div>
                        {{--发布人Logo--}}
                        <div class="i"><img style="max-height: 100%;max-width: 100%" src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132" /></div>
                    </div>
                    {{--头衔--}}
                    <div class="badge">
                        <div class="t">用户徽章</div>
                        <div class="v">
                            <div class="item"><img style="max-width: 100%;max-height: 100%" src="/quan/badge/badge-run-30-color.png"></div>
                            <div class="item"><img style="max-width: 100%;max-height: 100%" src="/quan/badge/badge-run-30-color.png"></div>
                            <div class="item"><img style="max-width: 100%;max-height: 100%" src="/quan/badge/badge-run-30-color.png"></div>
                        </div>
                    </div>
                </div>
                {{--圈内容--}}
                <div class="quan_content">
                    <script>

                    </script>
                    <div class="words">今天是跑步第43天，坚持了这么长时间，令人意想不到，打卡签到，顺便给大家分享下我路上拍到的景色。</div>
                    <div class="photoList">
                        <div class="item">
                            <div class="table">
                                <div class="table-cell">
                                    <img src="https://img.alicdn.com/imgextra/https://img.alicdn.com/imgextra/i4/2880071045/O1CN011JaeKs6qwY0g80N_!!2880071045.jpg_430x430q90.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="table">
                                <div class="table-cell">
                                    <img src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="table">
                                <div class="table-cell">
                                    <img src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--发布时间--}}
                <style>
                    .quan_time{
                        text-align: center;
                        color: #7a7a7a;
                        border-top: 1px dashed #e5e5e5;
                        line-height: 44px;
                    }
                    .quan_commentList{
                        display: none;
                    }
                    .quan_commentList .quan_comment{
                        border-left: 3px solid #e5e5e5;

                        padding: 12px 8px;

                        margin-bottom: 26px;

                        padding-left: 18px;
                    }
                    .quan_commentList .quan_comment .quan_comment_user{

                    }
                    .quan_commentList .quan_comment .quan_comment_user .user_icon{
                        width: 32px;

                        display: inline-block;
                    }
                    .quan_commentList .quan_comment .quan_comment_user .user_name{
                        display: inline-block;
                        color: #7a7a7a;

                        margin-left: 12px;
                    }
                    .quan_user_commit_value{
                        line-height: 26px;
                        margin-top: 12px;
                    }
                    .quan_fav{
                        text-align: center;
                        margin-bottom: 28px;
                        margin-top: 16px;
                    }
                    .quan_fav .btn-like{
                        display: inline-block;
                        /*border: 1px solid #e5e5e5;*/
                        line-height: 25px;
                        padding: 0 12px;
                        text-align: center;
                        border-radius: 41px;
                        color: #7a7a7a;
                        margin: 0 16px;
                        background: #f2f2f2
                    }
                    .quan_fav .btn-like{

                    }
                </style>
                <div class="quan_time">
                    发布时间：2018-11-18 08:24:00
                </div>
                {{--喜欢--}}
                <div class="quan_fav">
                    <div class="btn-like">喜欢(101)</div>
                    <div class="btn-like btn-dislike">不喜欢(0)</div>
                </div>
                {{--评论·显示最热点的3条--}}
                <div class="quan_commentList">
                    {{-- 一条 --}}
                    <div class="quan_comment">
                        <div class="quan_comment_user">
                            {{--图标--}}
                            <div class="user_icon">
                                <img class="img" src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132" />
                            </div>
                            {{--姓名--}}
                            <div class="user_name">简约不失繁华</div>
                        </div>
                        <div class="quan_user_commit_value">这里是评论内容</div>
                    </div>
                    <div class="quan_comment">
                        <div class="quan_comment_user">
                            {{--图标--}}
                            <div class="user_icon">
                                <img class="img" src="http://thirdwx.qlogo.cn/mmopen/vi_32/nDDvSR6JUpC7oJNlsQtz9Yia0QNyO1LrYkWxOlj4nVRsdV0MjbVgoaBWsPbzVibqU8TticianlBiatwWcjZB84UuzyA/132" />
                            </div>
                            {{--姓名--}}
                            <div class="user_name">简约不失繁华</div>
                        </div>
                        <div class="quan_user_commit_value">这里是评论内容</div>
                    </div>
                </div>
                <div class="show_or_hide">
                    {{--隐藏--}}
                    <span style="display: none" class="layui-icon-up layui-icon"></span>
                    <span class="layui-icon-down layui-icon"></span>
                    {{--显示全部--}}
                </div>
            </div>
            @endfor
        {{--商品分类--}}
        @for($t=1;$t<6;$t++)
            <div class="classOfArchive">
                <div class="icon">
                    酷玩智能
                </div>
                <div class="icon_after layui-icon layui-icon-right"></div>
                <div class="then">最新推荐</div>
                <style>
                    .classOfArchive .commodity{
                        border-top: 1px solid #e5e5e5;
                        padding: 12px;
                    }
                    .classOfArchive .commodity .commodity-icon{
                        width: 30%;
                        text-align: center;
                        float: left;
                        /*margin-top: 12px;*/
                        box-sizing: border-box;
                        padding: 10px;
                    }
                    .classOfArchive .commodity .commodity-describe{
                        /*padding-top: 12px;*/
                        width: 70%;
                        float: right;
                        box-sizing: border-box;
                        padding: 10px;
                    }
                    .classOfArchive .commodity .commodity-describe .t{
                        margin-bottom: 14px;

                        color: brown;

                        font-size: 14px;
                        line-height: 26px;
                    }
                    .classOfArchive .commodity .commodity-describe .v{
                        background: brown;

                        color: #fff;

                        margin-top: 20px;

                        line-height: 36px;

                        text-align: center;

                        border-radius: 3px;
                    }
                </style>
                <div class="commodity">
                    {{--商品图标--}}
                    <div class="commodity-icon">
                        <img style="max-width: 100%;max-height: 100%" src="https://img.alicdn.com/imgextra/https://img.alicdn.com/imgextra/i4/2880071045/O1CN011JaeKs6qwY0g80N_!!2880071045.jpg_430x430q90.jpg" />
                    </div>
                    {{--描述--}}
                    <div class="commodity-describe">
                        <div class="t">南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯</div>
                        <div class="v">
                            <div>查看详情</div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            @endfor
        <style>
            @keyframes refresh{
                from{
                    /*text-shadow: 0 0 10px #fff;*/
                    /*background: #0d6aad;*/
                }
                50%{
                    /*text-shadow: 0 0 26px #0063f3;*/
                }
                to{
                    /*text-shadow: 0 0 10px #fff;*/
                    /*background: #fff;*/
                }
            }
            @-moz-keyframes refresh /* Firefox */
            {
                from{
                    text-shadow: 0 0 10px #fff;
                    background: #0d6aad;
                }
                to{
                    text-shadow: 0 0 10px #333;
                    background: #fff;
                }
            }

            @-webkit-keyframes refresh /* Safari 和 Chrome */
            {
            }

            @-o-keyframes refresh /* Opera */
            {
            }
            .refreshBtn{
                margin: 0 auto;
                margin-top: 36px;
                text-align: center;
                font-size: 44px;
                color: #a1a1a1;
                text-shadow: 0 0 10px #eee;
                animation: refresh 3s infinite;
                -moz-animation: refresh 3s infinite;	/* Firefox */
                -webkit-animation: refresh 3s infinite;	/* Safari 和 Chrome */
                -o-animation: refresh 3s infinite;	/* Opera */
            }
        </style>
        <div style="display: none" class="refreshBtn layui-icon-refresh-3 layui-icon"></div>
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
        <div class="quan_block">
            <div class="quan_block_header">
                <div>运动圈</div>
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
        {{--三个圈子路径--}}
        <style>
            .go_circle{
                background: #2eaf2e;
                padding: 10px 16px 33px 16px;
                margin-top: 36px;
                border-radius: 12px;
            }
            .footer{
                margin-top: -10px;
                background: #2eaf2e;
                line-height: 1.5rem;
                color: #fff;
                padding: 36px 16px;
                border-top: 1px dashed #fff;
            }
            .footer p{
                margin-bottom: 12px;
            }
        </style>
        <div class="go_circle">
            <div class="circle_entry">
                <div class="item">
                    <img class="img" src="/quan/yuedongquan.png">
                    <div class="bottom"></div>
                </div>
                <div class="item">
                    <img class="img" src="/quan/shishangquan.png">
                    <div class="bottom"></div>
                </div>
                <div class="item">
                    <img class="img" src="/quan/kejiquan.png">
                    <div class="bottom"></div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>极爱网，爱运动，爱科技，爱生活，更爱极爱网。<br>一个以生活为驱动的，电子商务网站。</p>
            <p>Copyright ©2018-2019 极爱网 陕ICP备18006045号-2</p>
        </div>
    </div>
    @endsection
@section('js')
    <script>
        //使照片尺寸相同
        $(document).ready(function (){
            var width = $('.photoList').width();
            width = width*0.28-6-6;
            $('.quan_content .photoList .item img').css({'max-height':width});
        })
    </script>
    @endsection