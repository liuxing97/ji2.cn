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
    .loginBg{}
    .loginMain{
        width: 100%;
        border-radius: 12px;
        background: #fff;
        height: 100%;
        position: relative;
        top: -10px;
        padding-top: 36px;
        text-align: center
    }
    .loginMain .logoBox{
        width: 100px;
        margin: 0 auto;
        text-align: center;
    }
    .loginMain .userInfor{}
    .loginMain .userInfor .input{
        display: block;

        margin: 0 auto;
        margin-top: 20px;


        width: 80%;

        border: none;

        border-bottom: 1px solid #e5e5e5;
        height: 38px;
        position: relative;
    }
    .loginMain .userInfor .input .layui-icon{
        position: absolute;
        left: 0;
        line-height: 38px;
    }
    .loginMain .userInfor .input input{
        line-height: 38px;

        border: none;

        outline: none;
        position: absolute;
        left: 69px;
    }
    .loginMain .userInfor .userPhone{}
    .loginMain .userInfor .userPw{}
    .loginMain .other{
        width: 80%;

        color: #3281a9;

        margin: 0 auto;

        margin-top: 0px;

        text-align: right;

        margin-top: 16px;
    }
    .loginMain .other span{
        font-size: 12px;
    }
    .get-vercode{
        display: inline-block;
        width: 120px;
        line-height: 30px;
        background: #f2f2f2;
        color: #4d4d4d;
        position: absolute;
        right: 0;
    }
</style>
<div class="contentMain">
    <div class="loginBg"><img style="width: 100% " src="/welcome.png" alt=""></div>
    <div class="loginMain">
        <div class="logoBox">
            <img style="width: 100%" src="/log32.png" alt="">
        </div>
        {{--填写--}}
        <div class="userInfor">
            <div class="input">
                <span class="layui-icon layui-icon-cellphone"></span>
                <span style="position: absolute;line-height: 38px;left: 28px;">+86</span>
                <input class="userPhone" type="text">
            </div>
            <div class="input">
                <span class="layui-icon layui-icon-vercode"></span>
                <input style="left: 28px" class="userNumber" type="text" >
                <span class="get-vercode">获取验证码</span>
            </div>
        </div>
        {{--其他--}}
        {{--<div class="other">--}}
            {{--<span style="float: left">忘记密码</span>--}}
            {{--<span style="float: right">用户注册</span>--}}
            {{--<span style="clear: both"></span>--}}
        {{--</div>--}}
        {{--登录--}}
        <style>
            .loginBtn{
                width: 80%;

                margin: 0 auto;

                line-height: 40px;

                color: #fff;

                background: #EE434C;

                background: linear-gradient(to right, #EE434C, #F14B4E);

                opacity: 0.7;

                border-radius: 100px;
                margin-top: 36px;
            }
        </style>
        <div class="loginBtn">登录 / 注册</div>
        <style>
            .loginTypeList{
                margin-top: 36px;
            }
            .loginTypeList .item{
                line-height: 30px;
                margin-bottom: 12px;
            }
            .loginTypeList .item .icon{
                display: inline-block;
                color: #646464;
                font-size: 22px;
                vertical-align: middle;
            }
            .loginTypeList .item .title{
                display: inline-block;
                font-size: 14px;
                margin-left: 10px;
                color: #7a7a7a;
            }
        </style>
        {{--登录方式选择/密码登录/微信登录--}}
        <div class="loginTypeList">
            <div class="item">
                <div class="icon layui-icon layui-icon-cellphone"></div>
                <div class="title">密码登录</div>
            </div>
            <div class="item">
                <div class="icon layui-icon layui-icon-login-wechat"></div>
                <div class="title">微信登录</div>
            </div>
        </div>
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