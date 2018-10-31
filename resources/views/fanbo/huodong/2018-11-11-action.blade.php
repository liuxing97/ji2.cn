@php
{{--    $userIdentity = 'visitor';--}}
@endphp
@extends('fanbo/layouts/layout')
@section('web-title')
    {{$siteData['censcms_web_name']}}-双十一转发抢红包！！！快来吧
@endsection
@section('content')
    <style>
        .huodongShow{
            position: relative;
            margin: 20px 0;
            background: #fffdfd;
            box-shadow: 0 0 10px #c0bebe;
        }
        .huodongShow img{
            max-width: 100%;
        }
    </style>
    <div>
        <style>
            .visitorShow{
                background: #fff;
                margin-top: 16px;
                border-radius: 3px;
                padding: 25px 12px;
                box-sizing: border-box;
                text-align: center;
                box-shadow: 0 0 10px #b9b9b9;
                background: url("/pricebg.png");
                background-size: 175%;
            }
            .originatorIcon{
                display: inline-block;
                width: 20%;
                margin-right: 5%;
                padding: 7px;
                box-sizing: border-box;
                border: 1px dashed #e5e5e5;
                border-radius: 3px;
                vertical-align: middle;
            }
            .originatorIcon img{
                max-width: 100%;
                max-height: 100%;
            }
            .originatorInfo{
                display: inline-block;
                width: 70%;
                text-align: left;
                vertical-align: middle;
            }
            .originatorInfo p{

            }
            .btnBox{
                width: 100%;
                background: #fff;
                box-sizing: border-box;
            }
            .btn-zhuli{
                width: 100%;
                background: brown;
                color: #fff;
                text-align: center;
                line-height: 38px;
                box-sizing: border-box;
                border-radius: 3px;
                margin-top: 1.5rem;
                display: inline-block;
            }
            .btn-qiang{
                width: 100%;
                background: green;
                color: #fff;
                text-align: center;
                line-height: 38px;
                box-sizing: border-box;
                border-radius: 3px;
                margin-top: 1rem;
                display: inline-block;
            }
            .helperIconListTitle{
                text-align: left;

                width: 95%;

                margin: 0 auto;

                margin-top: 1.5rem;

                color: brown;
            }
            .helperIconList{
                width: 95%;

                margin: 0 auto;


                text-align: left;

                margin-top: 1rem;

                border: 1px solid #e5e5e5;

                padding: 12px 12px 2px 12px;
            }
            .helperIconItem{
                display: inline-block;

                width: 50px;

                height: 50px;

                margin-right: 10px;

                margin-bottom: 10px;

                overflow: hidden;

                border-radius: 100%;

                padding: 5px;

                border: 1px dashed #bcbcbc;

                box-sizing: border-box;
            }
            .helperIconItem:last-child{
                margin-right: 0;
            }
            .helperIconItem img{
                max-height: 100%;
                max-width: 100%;
                border-radius: 100%;
            }
        </style>
        @if($userIdentity == 'visitor')
            @php
                echo $userIdentity;
            @endphp
            {{--助力者显示--}}
            <div class="visitorShow">
                <div class="originatorIcon">
                    <img src="{{$originatorData['headimgurl']}}" alt="">
                </div>
                <div class="originatorInfo">
                    <p style="color: brown;">您的好友【 {{$originatorData['nickname']}} 】正在抢红包！</p>
                    <p style="margin-top: 1rem;">还需要@php
                            $num = 2-$helperNum;
                            if($num <0){
                                echo "0";
                            }else{
                                echo $num;
                            }
                    @endphp个人助力他，点击下方，助力他吧！</p>
                    @if($zhuli)
                        @else
                        <a href="{{$applyShouquanUrl}}"><div class="btn-zhuli">为他助力</div></a>
                    @endif
                    @if($zhuli)
                        <a href="{{$huodongUrl}}"><div class="btn-qiang">已助力，我也要抢红包</div></a>
                    @else
                        <a href="{{$huodongUrl}}"><div class="btn-qiang">我也要抢红包</div></a>
                    @endif
                </div>
            </div>
            @else
            <div class="visitorShow">
                <div class="originatorIcon">
                    <img src="http://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83eoAActpA8Yt8MVEhDy4e5icKxTJqZMg4ybZ8GhrH1BxsEEVIibDeyickYib8ic133h1WYVmFvJqpOibBibiaQ/132" alt="">
                </div>
                <div class="originatorInfo">
                    <p style="color: brown;">成功参与抢红包啦！</p>
                    <p style="margin-top: 1rem;">还需要@php
                            $num = 2-$helperNum;
                            if($num <0){
                                echo "0";
                            }else{
                                echo $num;
                            }
                        @endphp个人助力，分享本页面，让小伙伴们助力吧！</p>
                </div>
                <div class="helperIconListTitle">都有哪些小伙伴为你助力了：</div>
                {{--已经助力的小伙伴/图标方式--}}
                <div style="" class="helperIconList">
                    @if(!$helperNum)
                        <div class="line-height: 5rem;margin-bottom:10px;color:#7a7a7a">赶紧告诉小伙伴们给你助力吧</div>
                    @endif
                    @foreach($helpListArray as $item)
                        <div class="helperIconItem">
                            <img src="{{$item['headimgurl']}}" alt="">
                        </div>
                        @endforeach
                </div>
            </div>
            @endif
    </div>
    <div class="huodongShow">
        <img src="/qianghongbao02.png" />
    </div>
    {{--助力记录--}}
    <style>
        .helperList{}
        .helperListTitle{
            background: #fff;

            line-height: 38px;

            padding: 12px;

            border: 1px solid #e5e5e5;

            color: #9a9a9a;
        }
        .helperListMain{
            background: #fff;

            border: 1px solid #e5e5e5;


            border-top: 0;
        }
        .helperItem{
            padding: 16px 12px;

            border-bottom: 1px dashed #e5e5e5;
        }
        .helperItemIcon{
            display: inline-block;

            width: 55px;

            height: 55px;

            padding: 6px;

            box-sizing: border-box;

            border: 1px dashed #e5e5e5;

            border-radius: 3px;

            vertical-align: top;
        }
        .helperItem:last-of-type{
            border: none;
        }
        .helperItemIcon img{
            max-width: 100%;

            max-height: 100%;

            border-radius: 3px;
        }
        .helperItemMore{
            display: inline-block;

            margin-left: 1rem;
        }
        .helperItemNickname{
            margin-bottom: 0.5rem;

            margin-top: 2px;

            color: brown;
        }
        .helperHelpTime{

        }
        .helperHelpTime .t{

        }
        .helperHelpTime  .v{

        }
    </style>
    <div class="helperList">
        <div class="helperListTitle">好友助力列表，已有{{$helperNum}}个助力</div>
        <div class="helperListMain">
            <div class="helperItem">
                <div class="helperItemIcon">
                    {{--<img src="http://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83eoAActpA8Yt8MVEhDy4e5icKxTJqZMg4ybZ8GhrH1BxsEEVIibDeyickYib8ic133h1WYVmFvJqpOibBibiaQ/132" alt="">--}}
                    <img src="{{$originatorData['headimgurl']}}" alt="">
                </div>
                <div class="helperItemMore">
                    <div class="helperItemNickname">{{$originatorData['nickname']}}(发起人)</div>
                    <div class="helperHelpTime">
                        <span class="t">发起时间：</span>
                        <span class="v">{{$originatorData['created_at']}}</span>
                    </div>
                </div>
            </div>
            {{--一个示例--}}
            @foreach($helpListArray as $item)
            <div class="helperItem">
                <div class="helperItemIcon">
                    {{--<img src="http://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83eoAActpA8Yt8MVEhDy4e5icKxTJqZMg4ybZ8GhrH1BxsEEVIibDeyickYib8ic133h1WYVmFvJqpOibBibiaQ/132" alt="">--}}
                    <img src="{{$item['headimgurl']}}" alt="">
                </div>
                <div class="helperItemMore">
                    <div class="helperItemNickname">{{$item['nickname']}}</div>
                    <div class="helperHelpTime">
                        <span class="t">助力时间：</span>
                        <span class="v">{{$item['created_at']}}</span>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection