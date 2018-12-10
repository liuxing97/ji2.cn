@extends("quan.layout")
@section('body')

@endsection
<style>
    html,body{
        background: #f6f7f9!important;
        /*padding-bottom: 50px;*/
    }
    .contentMain{
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }
    .app_header{
        position: fixed;
        text-align: center;
        line-height: 46px;
        background: #fff;
        border-bottom: 1px solid #e5e5e5;
        font-size: 14px;
        top: 0;
        z-index: 9999;
        width: 100%;
    }
    .app_header .layui-icon-left{
        position: absolute;
        left: 10px;
    }
    .app_header .app_header_menu{

    }
    .app_header .app_header_menu li{
        display: inline-block;
        margin-right: 12px;
        right: 56px;
        position: relative;
    }
    .app_header .app_header_menu .i:nth-of-type(1){
        border-left: 1px dashed #d0d0d0;
    }
    .app_header .app_header_menu .i:nth-of-type(2){
        background: #ed424b;
        color: #fff;
    }
    .app_header .app_header_menu .i{
        display: inline-block;
        text-align: center;
        width: 50px;
        line-height: 24px;
    }
    .app_header .layui-icon-more{
        position: absolute;
        right: 10px;
        top: 0;
        font-size: 25px;
        color: #878787;
    }
    .app_show{
        background: #fff;
        padding-bottom: 18px;
        box-shadow: 0 0 10px #ccc;
        margin-top: 47px;
    }
    .app_show .app_title{
        font-size: 15px;
        line-height: 1.8rem;
        font-weight: bold;
        padding: 0 10px;
        margin-top: 10px;
    }
    .app_show .app_title .self{
        background: #ed424b;
        color: #fff;
        margin-right: 5px;
        padding: 0 3px;
        border-radius: 2px;
    }
    .app_show .app_source_price{
        text-align: right;
        text-decoration: line-through;
        color: #7a7a7a;
        padding: 0 10px;
        /*margin-top: 16px;*/
    }
    .app_show .app_price{
        text-align: right;
        font-size: 22px;
        color: #ed424b;
        padding: 0 10px;
        margin-top: 8px;
    }
    .stateItem{
        line-height: 48px;

        background: #fff;

        margin-top: 20px;

        padding: 0 10px;
    }
    .stateItem .t{
        color: #767676;
        font-size: 12px;
        margin-right: 10px;
    }
    .stateItem .v{

    }
</style>
<div class="contentMain">
    {{--商品头部--}}
    <div class="app_header">
        <style>
            .app_header, .app_footer{
                max-width: 400px;
            }
            .footer{
                background: #2eaf2e;
                line-height: 1.5rem;
                color: #fff;
                padding: 36px 16px;
                margin-top: 20px;
            }
            .footer p{
                margin-bottom: 12px;
            }
        </style>
        <div class="layui-icon layui-icon-left"></div>
        <div class="app_header_menu">
            <li>自营商品分类</li>
            <li style="position: absolute;right: 36px">
                <span class="i">资讯</span>
                <span class="i">团购</span>
            </li>
        </div>
        <div class="layui-icon layui-icon-more"></div>
    </div>
    {{--自营商品分类--}}
    <div class="selfClass">
            <style>
                .selfClass{
                    padding: 18px 20px;
                    background: #fff;
                    margin-top: 47px;
                }
                .selfClassTitle{
                    background: #ed424b;
                    width: 100px;
                    text-align: center;
                    color: #fff;
                    line-height: 31px;
                    border-radius: 2px;
                }
                .selfClassTitle span{

                }
                .selfClassList{
                    margin-top: 18px;
                }
                .selfClassList .item{
                    box-sizing: border-box;
                    display: inline-block;
                    width: 30%;
                    text-align: center;
                    line-height: 28px;
                    border: 1px dashed #e5e5e5;
                    margin-bottom: 12px;
                    margin-right: 2.3%;
                }
                .selfClassList .item:nth-of-type(3n){
                    margin-right: 0;
                }
                .selfClassList .item:nth-of-type(1){
                    border: 1px solid #dd3737;
                    color: #dd3737;
                }
            </style>
            <div class="selfClassTitle"><span>自营商品分类</span></div>
            <div class="selfClassList">
                <div class="item">科技圈</div>
                <div class="item">时尚圈</div>
                <div class="item">悦动圈</div>
                <div class="item">手机</div>
                <div class="item">笔记本</div>
            </div>
        </div>
    {{--自营商品--}}
    <div id="self_item" class="contentMainBox-tuan">
        <div class="hotTuanBoxTitle boxTitle">科技圈<span>自营商品列表</span></div>
        <div style="text-align: center">
            <style>
                .commonItem{
                    display: inline-block;
                    width: 47%;
                    margin-right: 3%;
                    margin-top: 30px;
                    background: #fff;
                    box-sizing: border-box;
                    padding: 22px 12px;
                    box-shadow: 0 0 10px #e5e5e5;
                }
                .commonItem:nth-of-type(2n){
                    margin-right: 0;
                }
                .commonItem .title{
                    margin-top: 12px;
                    line-height: 1.5rem;
                    text-align: left;
                    height: 45px;
                    overflow: hidden;
                }
                .commonItem .title .from{
                    background: #ed424b;
                    color: #fff;
                    margin-right: 5px;
                    padding: 0 3px;
                    border-radius: 2px;
                }
                .commonItem .cover{
                    padding: 10px;
                    border: 1px solid #e5e5e5;
                }
                .commonItem .price{
                    text-align: right;
                    margin-top: 10px;
                }
                .commonItem .price .t{
                    font-size: 14px;
                    color: #7a7a7a;
                }
                .commonItem .price .v{
                    color: #ed424b;
                    font-size: 16px;
                    font-weight: bold;
                }
                .commonItem .source-price{
                    text-align: right;

                    color: #7a7a7a;

                    text-decoration: line-through;

                    margin-top: 10px;
                }
                .commonItem .source-price .t{
                    /*display: none;*/
                }
                .commonItem .source-price .v{
                }
                .commonItem .team{
                    border: 1px solid #e5e5e5;

                    margin-top: 10px;

                    text-align: center;

                    position: relative;

                    background: #eaeaea;
                }
                .commonItem .team .v{
                    color: #fff;

                    position: relative;

                    z-index: 999;
                }
                .commonItem .team .b{
                    position: absolute;

                    top: 0;

                    left: 0;

                    background: #57ba57;

                    width: 80%;

                    height: 20px;
                }
            </style>
            <div style="display: inline-block;text-align: center" class="">
                @for($i=0;$i<10;$i++)
                    <div class="commonItem">
                        <div class="cover">
                            <img class="img" src="https://img.alicdn.com/imgextra/https://img.alicdn.com/imgextra/i4/2880071045/O1CN011JaeKs6qwY0g80N_!!2880071045.jpg_430x430q90.jpg" alt="">
                        </div>
                        <div class="title"><span class="from">自营</span>南极人电热毯护膝毯加热坐垫电暖垫办公室暖脚宝插电褥子暖身毯</div>
                        {{--价格--}}
                        <div class="source-price"><span class="t">独购价</span><span class="v">￥2999.00</span></div>
                        <div class="price"><span class="t">团购价</span><span class="v">￥1999.00</span></div>
                        {{--拼团情况·外层--}}
                        {{--<div class="team">--}}
                        {{--数字说明--}}
                        {{--<span class="v">有2人在团/3人起团</span>--}}
                        {{--内层液态柱子--}}
                        {{--<span class="b"></span>--}}
                        {{--</div>--}}
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <style>
        .contentMainBox{
            margin-top: 20px;
            background: #fff;
            padding: 20px 10px;
        }
        .contentMainBox-tuan{
            margin-top: 20px;
        }
        .contentMainBox-tuan .boxTitle{
            font-size: 18px;
            font-weight: bold;
            /*padding-left: 12px;*/
            text-align: center;
        }
        .contentMainBox-tuan .boxTitle span{
            font-size: 14px;
            /*margin-left: 10px;*/
            color: #7a7a7a;
            font-weight: normal;
            display: block;
            margin-top: 10px;
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

    </style>
    <div class="footer">
        <p>极爱网，爱运动，爱科技，爱生活，更爱极爱网。<br>一个以生活为驱动的，电子商务网站。</p>
        <p>Copyright ©2018-2019 极爱网 陕ICP备18006045号-2</p>
    </div>
</div>
<style>
    .articleItem{
        margin-top: 20px;
        border-bottom: 1px dashed #e5e5e5;
        text-align: center;
    }
    .articleItem:last-of-type{
        border-bottom: none;
    }
    .articleItem .title{
        width: 67%;
        display: inline-block;
        vertical-align: top;
        font-size: 14px;
        font-weight: bold;
        color: #4a4a4a;
        text-align: left;
        line-height: 1.5rem;
    }
    .articleItem .cover{
        height: 66px;
        overflow: hidden;
        text-align: center;
        display: inline-block;
        width: 25%;
        margin-left: 1%;
    }
    .articleItem .cover img{
        max-height: inherit;
    }
</style>
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