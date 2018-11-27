@extends("quan.layout")
@section('body')

@endsection
    <style>
        .contentMain{
            /*background: #fff;*/
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .app_header{
            background: #f8f8f8;
            padding: 32px 36px 0 36px;
            padding-top: 32px;
            border: 1px solid #e5e5e5;
            padding-top: 40px;
            position: relative;
            top: -8px;
        }
        .app_header .logoBox{
            width: 25%;
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }
        .app_header .logoDescribe{
            display: inline-block;
            width: 70%;
            vertical-align: middle;
            color: #7f7f7f;
            font-size: 13px;
            line-height: 22px;
        }
        .logoLiNian{
            line-height: 40px;
            font-size: 14px;
            text-align: center;
            border-top: 1px solid #e5e5e5;
            width: 100%;
            color: #6a6a6a;
            margin: 0 auto;
            padding: 3px 10px;
            box-sizing: border-box;
            margin-top: 20px;
            padding-bottom: 10px;
        }
    </style>
    <div class="contentMain">
        <div class="app_header">
            <div class="logoBox">
                <img class="img" src="http://www.ji2.cn/quan/logo2.png" >
                {{--<img class="img" src="/logo-2.png" >--}}
            </div>
            {{--描述--}}
            <div class="logoDescribe">
                <p>极爱网，爱运动，爱科技，爱生活，更爱极爱网。</p>
                <p>一个以生活为驱动的，电子商务网站。</p>
            </div>
            <div class="logoLiNian">
                <p>我们的理念，以生活为驱动的电子商务网站！</p>
            </div>
            {{--<div>--}}
                {{--<img class="img" src="http://www.ji2.cn/quan/logo.png" alt="">--}}
            {{--</div>--}}
        </div>
    </div>
@section('js')
@endsection