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
    <link rel="shortcut icon" href="/ji2_favicon.ico" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta property="og:image" content="/share.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0;"/>
    <link rel="stylesheet" href="/layui/css/layui.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/module/ft-carousel/css/ft-carousel.css" />
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
<body>
<style>
    html,body{
        /*max-width: 400px;*/
        min-height: 100%;
        position: relative;
        margin: 0 auto;
        background: #f0f0f0;
        font-family: "微软雅黑";
        /*padding-bottom: 20px;*/
    }
    .table{
        display: table;
        margin: 0 auto;
    }
    .table-cell{
        display: table-cell;
        vertical-align: middle;
    }
    p{
        margin: 0;
    }
    .clear{
        clear: both;
    }
    .img{
        max-width: 100%;
        max-height: 100%;
    }
</style>
@section('body')
    @show
</body>

<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/module/ft-carousel/js/ft-carousel.min.js"></script>
@section('js')
    @show
</html>