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
        box-shadow: 0 0 10px #ccc;
        margin-top: 47px;
        padding: 16px 10px;
        padding-bottom: 66px;
        position: relative;
    }
    .common_show .common_title{
        font-size: 15px;
        line-height: 1.8rem;
        font-weight: bold;
        padding: 0 10px;
        display: inline-block;
        width: 68%;
        box-sizing: border-box;
        vertical-align: top;
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
    .common_show .common_photo{
        width: 30%;
        display: inline-table;
        height: 100px;
        border: 1px solid #e5e5e5;
        box-sizing: border-box;
    }
    .common_show .common_photo_main{
        vertical-align: middle;
        display: table-cell;
        width: 30%;
        height: 100px;
        padding: 6px;
    }
    .common_show_back{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        color: #fff;
        background: #ed424b;
        line-height: 46px;
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
            <li>单独买·就是壕</li>
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
        <div class="common_photo">
            <div class="common_photo_main">
                <img class="img" src="https://gaitaobao2.alicdn.com/tfscom/i1/1893021893/TB1UlbwdfjM8KJjSZFNXXbQjFXa_!!0-item_pic.jpg_300x300q90.jpg" alt="">
            </div>
        </div>
        {{--商品标题--}}
        <div class="common_title">
            <span class="self">自营</span>NOGPS 地面波数字电视天线接收器室内小锅盖家用dtmb免费高清通用 室内电视天线防水 3米常规DTMB电视天线+转接头+双面胶
        </div>
        <div class="common_price"><span style="font-size: 14px;color: #7a7a7a;">拼团价：</span><span>￥</span><span>955.00</span></div>
        <div class="common_source_price"><span>原价：</span><span>￥999.00</span></div>
        {{--返回商品--}}
        <a href="/2.0/common">
            <div class="common_show_back">返回商品</div>
        </a>
    </div>
    {{--购买方式--}}
    <div class="commonBuyType">
        <style>
            .commonBuyType{
                background: #fff;

                margin-top: 20px;

                border: 1px solid #e5e5e5;
            }
            .commonBuyType .assistance{
                padding: 16px 10px;
                color: #7a7a7a;
            }
            .commonBuyType .assistanceList{
                padding: 50px 10px;


                text-align: center;

                color: #7a7a7a;

                padding-top: 20px;
            }
            .commonBuyType .assistanceList .tuanPriceBuy{
            }
            .tuanPriceBuy .goTuan,.tuanPriceBuy .toBuy{
                width: 120px;
                margin: 10px 16px;
            }
            .tuanPriceBuy .goTuan{
                display: inline-block;


                line-height: 36px;

                color: #ed424b;

                background: #fff;

                box-shadow: 0 0 10px #e5e5e5;

                border: 1px solid #c7c7c7;
            }
            .tuanPriceBuy .toBuy{
                display: inline-block;
                line-height: 36px;
                color: #fff;
                background: #ed424b;
                box-shadow: 0 0 10px #e5e5e5;
                border: 1px solid #ed424b;
            }
        </style>
        <div class="assistance">生成订单，邀请6位微信好友访问，即可享受团购价</div>
        <div class="assistanceList">
            {{--输入手机号，给一个二维码，截图并进行转发（唯一标识：手机号+商品号）。--}}
            <div class="tuanPriceBuy">
                <div class="goTuan">享受团购价</div>
                <div class="toBuy">仍然直接购买</div>
            </div>
        </div>
    </div>
    {{--团购说明--}}
    <div class="tuanHelp">
        <style>
            .tuanHelp{
                background: #fff;
                padding: 36px 16px;
                margin-top: 36px;
                position: relative;
                padding-top: 70px;
            }
            .tuanHelpTitle{
                position: absolute;
                top: 0;
                left: 0;
                font-size: 14px;
                padding: 0 16px;
                line-height: 36px;
                background: #ccc3;
                width: 100%;
                box-sizing: border-box;
                text-align: left;
                border: 1px solid #e5e5e5;
                font-weight: bold;
            }
            .tuanHelp p{
                line-height: 1.5rem;
                font-size: 13px;
                margin-bottom: 10px;
                color: #747474;
            }
        </style>
        <div class="tuanHelpTitle">为什么我们推荐您进行团购</div>
        <p>填写预约信息，24小时内，邀请6位好友点击助力，享受团购价。</p>
        <p>24小时内，6位以上助力数，每10人减5元可累积！</p>
    </div>
    {{--填写收货等信息--}}
    <div class="userInfor">
        <style>
            .userInfor{
                background: #fff;
                padding: 36px 26px;
                margin-top: 36px;
                position: relative;
            }
            .userInfor .userInforTitle{
                position: absolute;
                top: 0;
                left: 0;
                font-size: 14px;
                padding: 0 16px;
                line-height: 36px;
                background: #ccc3;
                width: 100%;
                box-sizing: border-box;
                text-align: left;
                border: 1px solid #e5e5e5;
                font-weight: bold;
            }
            .userInfor .userInforHelp{
                margin-top: 12px;
                font-size: 13px;
                color: #9a9a9a;
                line-height: 30px;
            }
            .userInfor .userInformation{
                margin-top: 16px;
            }
            .userInfor .userInformation ul{

            }
            .userInfor .userInformation ul li{
                margin-bottom: 22px;
            }
            .userInfor .userInformation ul li .t{
                width: 30%;
                display: inline-block;
                vertical-align: middle;
            }
            .userInfor .userInformation ul li .v{
                display: inline-block;
                width: 69%;
                vertical-align: middle;
            }
            .userInfor .userInformation ul li .v .input{
                line-height: 28px;
                width: 95%;
                border: 1px solid #e5e5e5;
            }
            .userInfor .postOrder{
                text-align: center;
                line-height: 36px;
                background: #ed424b;
                margin: 0 auto;
                color: #fff;
                border-radius: 3px;
                width: 120px;
            }
        </style>
        {{--预约信息--}}
        <div class="userInforTitle">购物信息</div>
        <div class="userInforHelp">确认直接购买吗？我们将在您下订单后进行电话确认！</div>
        <div class="userInformation">
            <ul>
                <li><span class="t">您的姓名</span><span class="v"><input class="input" type="text"></span></li>
                <li><span class="t">联系方式</span><span class="v"><input class="input" type="text"></span></li>
                <li><span class="t">收货地址</span><span class="v"><input class="input" type="text"></span></li>
            </ul>
        </div>
        <div class="postOrder">提交订单</div>
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