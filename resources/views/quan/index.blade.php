@extends("quan.layout")
@section('content')
    {{--背景--}}
    <style>
        .app_header{
            background: #35b44a;
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

        }
        .mrt-logoBox{
            width: 100px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
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
                    color: #fff;
                    line-height: 66px;
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
                    border-bottom: 2px dashed #fff;
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
                    color: #fff;
                    font-size: 14px;
                    position: relative;
                    top: 6px;
                }
                .mrt-badge_list-main .item .item-badge .describe .t{
                    margin-top: 6px;
                }
                .mrt-badge_list-main .item .item-badge .describe .v{
                    margin-top: 6px;

                }
                .mrt-badge_list-main .item .item-state{
                    position: relative;
                    font-size: 14px;
                    color: #fff;
                    padding: 10px 0;
                }
                .mrt-badge_list-main .item .item-state .number{

                }
                .mrt-badge_list-main .item .item-state .msg{
                    margin-top: 20px;
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
                                <img class="img" src="/quan/badge/badge-run-30.png">
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
                                <img class="img" src="/quan/badge/badge-run-30.png">
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
                                <img class="img" src="/quan/badge/badge-run-30.png">
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
        </div>
    </div>

    <style>
        .app_body{}
        .classOfArchive{
            height: 120px;

            background: #ffffff;

            margin-top: 36px;

            border-radius: 9px;

            box-shadow: 0 0 10px #afafaf;

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
    {{--应用中部--}}
    <div class="app_body">
        {{--本期推荐·每个星期的软文--}}

        {{--今日最热·从运动圈·科技圈·时尚圈中挑选热门文章·按热度进行排名--}}

        {{--一个演示类别--}}
        {{--点击标题，显示所有标题，二次点击后进入该分类，主页上只显示3个最新更新的分类--}}
        <div class="classOfArchive">
            <div class="icon">
                酷玩智能
            </div>
            <div class="icon_after layui-icon layui-icon-right"></div>
            <div class="then">最新推荐</div>
            <div class="commodity">
            </div>
        </div>
        {{--今日最热2·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热3·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--1一个演示类别·今日特惠--}}
        {{--今日最热4·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热5·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热6·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热7·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热8·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--2一个演示类别·健康生活--}}
        {{--今日最热9·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热10·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热11·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热12·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热13·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热14·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--3一个演示类别·吃喝独乐--}}
        {{--今日最热15·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热16·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热17·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热18·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热19·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--今日最热20·从运动圈·科技圈·时尚圈中挑选热门文章--}}
        {{--三个圈子路径--}}
    </div>
    @show