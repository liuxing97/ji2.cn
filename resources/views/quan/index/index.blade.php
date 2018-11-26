@extends("quan.layout")
@section('body')
    <style>
        body{
            overflow-x: hidden;
        }
        .contentMain{
            max-width: 400px;
            margin: 0 auto;
            /*left: 105px;*/
            position: relative;
            left: 220px;
        }
        @media only screen and (min-width: 660px){
            .contentMain{
                left: 105px;
            }
        }
        .contentMain .app_header{
            /*background: #35b44a;*/
            background: #2ea52e;
            min-height: 100%;
            width: 100%;
            padding: 20px 24px;
            box-sizing: border-box;
            padding-top: 40px;
            padding-bottom: 40px;
            /* border-radius: 15px; */
            /*margin-top: -15px;*/
        }
        .contentMain .app_header .logoBox{
            width: 200px;
            margin: 0 auto;
            /*margin-top: 28px;*/
        }
        .contentMain .app_header .logoBox img{
            width: 100%;
        }
        .contentMain .app_header .app_describe{
            background: #fff;
            margin-top: 24px;
        }
        .contentMain .app_header .app_describe_top_logo{
            display: inline-block;
            width: 22%;
            float: left;
            border-right: 1px solid #e5e5e5;
            padding-right: 2%;
        }
        .contentMain .app_header .app_describe_top_msg{
            float: left;
            font-size: 14px;
            color: #7f7f7f;
            width: 68%;
            margin-left: 7%;
        }
        .contentMain .app_header .app_describe_top_msg p{
            font-size: 13px;
            /*letter-spacing: 2px;*/
        }
        .contentMain .app_header .app_describe_top_msg p:last-child{
            margin-top: 6px;
        }
        .contentMain .app_header .app_describe_top{
            width: 90%;
            margin: 0 auto;
            box-sizing: border-box;
            padding: 20px 0;
        }
        .contentMain .app_header .app_describe_bottom{
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
    </style>
    <div class="contentMain layui-anim layui-anim-upbit">
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
    </div>

    {{--外部·应用菜单--}}
    <style>
        .appLabel{
            position: fixed;
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
        .appLabel .i-class{

        }
        .contentBox{}
    </style>
    <div class="appLabel">
        <div style="position: fixed;
height: 100%;overflow: auto;">
            <div class="i">
                {{--<span class="layui-icon layui-icon-share"></span>--}}
                爱运动，爱科技，爱生活，更爱极爱网。
            </div>
            {{--<div>顶部</div>--}}
            <div class="i"><span>抢红包</span><span class="layui-icon layui-icon-senior"></span></div>

            <div class="i"><span>名人堂</span><span class="layui-icon layui-icon-senior"></span></div>

            <div class="i"><span>热门话题</span><span class="layui-icon layui-icon-senior"></span></div>

            <div class="i"><span>悦动圈</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>科技圈</span><span class="layui-icon layui-icon-senior"></span></div>
            <div class="i"><span>时尚圈</span><span class="layui-icon layui-icon-senior"></span></div>

            {{--<div class="i"><span>惠购物</span><span class="layui-icon layui-icon-senior"></span></div>--}}
            <div class="i"><span>商品分类</span><span class="layui-icon layui-icon-senior"></span></div>
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
    {{--外部·当前菜单--}}
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

@endsection

@section('js')
    <script>

    </script>
@endsection