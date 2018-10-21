<!DOCTYPE html>
<html lang="en">

<head>
    <title>@section('web-title')
            {{$siteData['censcms_web_name']}}
        @show</title>
    <meta name="keywords" content="@section('web-tag')
    {{$siteData['censcms_web_tag']}}
    @show">
    <meta name="description" content="@section('web-tag')
    {{$siteData['censcms_web_describe']}}
    @show">
    <link rel="stylesheet" href="/layui/css/layui.css" />
    <link rel="shortcut icon" href="/ji2_favicon.ico" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta property="og:image" content="/share.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?419761b43e978e290f3d106b4207209b";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<style>
    body{
        margin: 0 auto;
        font-size: 14px!important;
        max-width: 400px;
        background: #f0f0f0;
    }
    .header{
        padding: 20px;
        height: 50px;
        text-align: center;
        box-shadow: 0 0 10px #ccc;
        background: #fff;
    }
    .header img{
        max-height: 100%;
    }
    .menuList .layui-nav{
        background-color: #b43727;
    }
    .archiveTitle{
        text-align: center;
        margin-top: 2rem;
        font-size: 22px;
        background: #fff;
        line-height: 4rem;
        /*border-left: 5px solid #5FB878;*/
        /*text-indent: -2.5px;*/
    }
    .footer{
        margin-top: 20px;
        padding: 20px;
        background: #302e3c;
        color: #fff;
        line-height: 2.5rem;
    }
</style>

<body>

    {{--头部--}}
    <div class="header">
        <a href="/"><img class="logo" src="/pages/img/logo.png" /></a>
    </div>
    {{--菜单--}}
    @if($menuArray != 'null')
        <div class="menuList">
            <ul class="layui-nav" lay-filter="menu_list">
            @foreach($menuArray as $menuItem)
                @if($menuItem['isThis'])
                        <li class="layui-nav-item layui-this"><a href="{{$menuItem['href']}}" target="{{$menuItem['target']}}">{{$menuItem['title']}}</a></li>
                    @else
                        <li class="layui-nav-item"><a href="{{$menuItem['href']}}" target="{{$menuItem['target']}}">{{$menuItem['title']}}</a></li>
                    @endif
            @endforeach
                @section('menuList')
                @show
            </ul>
        </div>
    @endif

    @section('content')
        @show

    {{--尾部--}}
    <div class="footer">
        <p>极爱网，给您最新购物资讯</p>
        <p>Copyright ©2018-2019 极爱网 陕ICP备18006045号-2</p>
    </div>
</body>
</html>

<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<script src="/js/http.js"></script>
{{--<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>--}}

<script>
    layui.use('element', function(){
        var element = layui.element;
        //一些事件监听
        element.on('nav(menu_list)', function(elem){
            console.log(elem); //得到当前点击的DOM对象
        });
    });
    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=")
            if (c_start!=-1)
            {
                c_start=c_start + c_name.length+1
                c_end=document.cookie.indexOf(";",c_start)
                if (c_end==-1) c_end=document.cookie.length
                return unescape(document.cookie.substring(c_start,c_end))
            }
        }
        return ""
    }
    function setCookie(c_name,value,expiredays)
    {
        var exdate=new Date()
        exdate.setDate(exdate.getDate()+expiredays)
        document.cookie=c_name+ "=" +escape(value)+
            ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
    }
    //请求统计
    function fangwenTongji(){
        //得到是否是本日第一次访问站点
        var isFirst = getCookie('dayVisit');
        console.log('dayVisit值是'+isFirst);
        if(isFirst === ''){
            console.log('是空');
            isFirst = 'fasle';
        }
        //cookie过期时间设置为本日最后一秒
        var x = new Date(new Date(new Date().toLocaleDateString()).getTime()+24*60*60*1000-1);
        //设置为已第一次访问
        setCookie('dayVisit','true',x);
        //请求统计
        http.hidePost('/tool/tongji',{'isFirst':isFirst});
    }
    fangwenTongji();
</script>


{{--<script>--}}
    {{--wx.config({--}}
        {{--debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。--}}
        {{--appId: 'wxe62be1f1e4f7f615', // 必填，公众号的唯一标识--}}
        {{--timestamp: '', // 必填，生成签名的时间戳--}}
        {{--nonceStr: '', // 必填，生成签名的随机串--}}
        {{--signature: '',// 必填，签名--}}
        {{--jsApiList: [] // 必填，需要使用的JS接口列表--}}
    {{--});--}}
    {{--wx.ready(function () {--}}
        {{--var shareData = {--}}
            {{--title: '标题',    //  标题--}}
            {{--desc: '描述', //  描述--}}
            {{--link: '链接', //  分享的URL，必须和当前打开的网页的URL是一样的--}}
            {{--imgUrl: '缩略图完整路径'   //  缩略图地址--}}
        {{--};--}}
        {{--wx.onMenuShareAppMessage(shareData);--}}
        {{--wx.onMenuShareTimeline(shareData);--}}
    {{--});--}}
    {{--wx.error(function (res) {--}}
        {{--//alert(res.errMsg);//错误提示--}}
    {{--});--}}
{{--</script>--}}