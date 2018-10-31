@extends('fanbo/layouts/layout')
@section('web-title')
    {{$siteData['censcms_web_name']}}-双十一转发抢红包！！！快来吧
@endsection
@section('content')
    <style>
        .huodongShow{
            margin: 20px 0;
            background: #fffdfd;
            box-shadow: 0 0 10px #c0bebe;
        }
        .huodongShow img{
           max-width: 100%;
        }
        .huodongDescribe{
            background: #fff;
            padding: 36px 16px;
            line-height: 1.5rem;
            box-shadow: 0 0 10px #c0bebe;
            position: relative;
        }
        .huodongDescribe .btn-join{
            width: 100%;
            background: brown;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            line-height: 2.6rem;
            margin-top: 1.5rem;
        }
        .huodongGuize{
            border: 1px dashed #e5e5e5;
            padding: 12px 18px;
            box-sizing: border-box;
            width: 100%;
        }
        .huodongGuize p{
            margin-bottom: 0.5rem;
        }
        .huodongGuize .title{
            font-size: 16px;
            font-weight: bold;
            margin-top: 0.8rem;
        }
        .huodongGuize .secTitle{
            color: brown;
            margin-bottom: 1.2rem;
            border-bottom: 1px dashed brown;
            line-height: 3rem;
        }
    </style>
    <div class="huodongShow">
        <img src="/qianghongbao02.png" />
    </div>
    <div class="huodongDescribe">
        <div class="huodongGuize">
            <p class="title">双十一，现金红包，抢抢抢！</p>
            <p class="secTitle">活动内容：</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;双十一，别人家的小伙伴都在做活动，我们干什么？当然是，也做活动啦~~~</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;现金红包发放中，先到先得，放完为止哦~</p>
            <p class="secTitle">活动规则：</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;1、点击加入活动，进入活动页面。</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;2、转发活动页面，参与极爱网(ji2.cn)现金红包活动。</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;3、发动您的好友，达到六人助力，现金红包直接入账！</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;4、红包数量888个，抢完为止！</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;5、活动截止日期,2018年11月16日0时0分。</p>
        </div>
        @if($huodongUrl)
            <a href="{{$huodongUrl}}"><div class="btn-join">参与活动</div></a>
            @else
            <a href="{{$applyShouquanUrl}}"><div class="btn-join">申请授权后，可参加活动</div></a>
            @endif
        <div class="shenquanItem" style="margin-top: 2rem;border: 1px solid #e5e5e5;">
            <img style="max-width: 100%" src="/quan01.png" />
        </div>
    </div>
    <div class=""></div>
@endsection