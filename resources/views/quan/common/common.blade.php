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
    .common_header{
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
    .common_header .layui-icon-left{
        position: absolute;
        left: 10px;
    }
    .common_header .common_header_menu{

    }
    .common_header .common_header_menu li{
        display: inline-block;
        margin-right: 12px;
        right: 56px;
        position: relative;
    }
    .common_header .common_header_menu .i:nth-of-type(1){
        border-left: 1px dashed #d0d0d0;
    }
    .common_header .common_header_menu .i:nth-of-type(2){
        background: #ed424b;
        color: #fff;
    }
    .common_header .common_header_menu .i{
        display: inline-block;
        text-align: center;
        width: 50px;
        line-height: 24px;
    }
    .common_header .layui-icon-more{
        position: absolute;
        right: 10px;
        top: 0;
        font-size: 25px;
        color: #878787;
    }
    .common_show{
        background: #fff;
        padding-bottom: 18px;
        box-shadow: 0 0 10px #ccc;
        margin-top: 47px;
    }
    .common_show .common_title{
        font-size: 15px;
        line-height: 1.8rem;
        font-weight: bold;
        padding: 0 10px;
        margin-top: 10px;
    }
    .common_show .common_title .self{
        background: #ed424b;
        color: #fff;
        margin-right: 5px;
        padding: 0 3px;
        border-radius: 2px;
    }
    .common_show .common_source_price{
        text-align: right;
        text-decoration: line-through;
        color: #7a7a7a;
        padding: 0 10px;
        /*margin-top: 16px;*/
    }
    .common_show .common_price{
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
    <div class="common_header">
        <div class="layui-icon layui-icon-left"></div>
        <div class="common_header_menu">
            <li>商品</li>
            <li>详情</li>
            <li style="position: absolute;right: 36px">
                <span class="i">资讯</span>
                <span class="i">团购</span>
            </li>
        </div>
        <div class="layui-icon layui-icon-more"></div>
    </div>
    {{--商品图片--}}
    <div class="common_show">
        {{--banner--}}
        <div class="ft-carousel" id="carousel">
            <style>
                #carousel{
                    width: 100%;

                    height: 228px;

                    font-size: 40px;

                    text-align: center;

                    background-color: #fff;
                }
                .ft-carousel .carousel-indicators span{
                    background-color: #c8c8c8;
                }
            </style>
            <ul class="carousel-inner">
                <li class="carousel-item"><img src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" /></li>
                <li class="carousel-item"><img src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" /></li>
                <li class="carousel-item"><img src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" /></li>
                <li class="carousel-item"><img src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" /></li>
                <li class="carousel-item"><img src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" /></li>
                <li class="carousel-item"><img src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" /></li>
            </ul>
        </div>
        {{--商品标题--}}
        <div class="common_title">
            <span class="self">自营</span>NOGPS 地面波数字电视天线接收器室内小锅盖家用dtmb免费高清通用 室内电视天线防水 3米常规DTMB电视天线+转接头+双面胶
        </div>
        <div class="common_price"><span style="font-size: 14px;color: #7a7a7a;">拼团价：</span><span>￥</span><span>955.00</span></div>
        <div class="common_source_price"><span>原价：</span><span>￥999.00</span></div>
    </div>
    {{--选择·支付情况--}}
    <div class="stateItem">
        <span class="t">支付</span>
        <span class="v">微信支付</span>
    </div>
    {{--选择·已选型号--}}
    <div class="stateItem">
        <span class="t">已选</span>
        <span class="v">天空蓝</span>
    </div>
    {{--选择的格式：运费说明--}}
    <div class="stateItem">
        <span class="t">运费</span>
        <span class="v">免运费</span>
    </div>
    {{--商品详情--}}
    <div class="common_describe">
        <style>
            .common_describe{}
            .describeTitle{
                margin-top: 16px;
                background: #fff;
                border-bottom: 1px solid #e5e5e5;
            }
            .describeTitle span{
                line-height: 40px;
                width: 100px;
                display: inline-block;
                text-align: center;
                /*border-right: 1px solid #e5e5e5;*/
                color: #7a7a7a;
            }
            .describeTitle span:first-of-type{
                color: #9f3a3f;
            }
            .describeList{}
        </style>
        <div class="describeTitle">
            <span>商品详情</span>
            <span>售后保障</span>
        </div>
        <div class="describeList">
            <img class="img" src="https://img30.360buyimg.com/sku/jfs/t19501/246/1222105046/139125/2b0a8e4d/5abf58b5N3cc96b18.jpg!q70.dpg" alt="">
            <img class="img" src="https://img30.360buyimg.com/sku/jfs/t19375/53/1207279334/150658/789aa17c/5abf58b5N66d40d0f.jpg!q70.dpg" alt="">
            <img class="img" src="https://img30.360buyimg.com/sku/jfs/t19378/5/1164432352/68115/4a088472/5abf58b5Nc54345d1.jpg!q70.dpg" alt="">
        </div>
    </div>
    {{--底部菜单--}}
    <div class="common_footer">
        <style>
            .common_footer{
                position: fixed;

                bottom: 0;


                width: 100%;

                height: 50px;

                background: #fff;

                border-top: 1px solid #ddd;

                box-sizing: border-box;
            }
            .buySlef{
                position: absolute;
                line-height: 50px;
                right: 30%;
                text-align: center;
                width: 30%;
                background: #5f5f5f;
                color: #fff;
                bottom: 0;
            }
            .buy{
                position: absolute;

                line-height: 50px;

                right: 0;

                width: 30%;

                text-align: center;

                background: #e43737;

                color: #fff;
                bottom: 0;
            }
        </style>
        <div style="
width: 40%;
position: absolute;
right: 60%;
padding: 0 16px;
text-align: center;
line-height: 21px;
top: 2px;
box-sizing: border-box;
color: #7a7a7a;
">3人团购或6人助力，团购买</div>
        {{--单独买--}}
        <div class="buySlef">单独买</div>
        {{--团价买--}}
        <div class="buy">团购买</div>
    </div>
    <style>
        .common_header, .common_footer{
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