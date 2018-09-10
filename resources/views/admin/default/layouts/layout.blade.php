<!DOCTYPE html>
<html lang="en">

<head>
    <title>辰象CMS</title>
    <link rel="stylesheet" href="/layui/css/layui.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
</head>


<body class="censcms-layout-admin">
<style>

    .censcms-layout-admin .censcms-header{
        z-index: 9999;
        height: 50px;
        box-sizing: border-box;
        background-color: #2c3e50;
        border-bottom: 1px solid #2c3e50;
        position: fixed;
        width: 100%;
    }
    .censcms-layout-admin .censcms-header .censcms-logo{
        line-height: 50px;
        text-align: center;
        position: relative;
        width: 220px;
        color: #fff;
        font-size: 16px;
    }
    .censcms-layout-admin .censcms-header .censcms-logo .censcms-logo-brand{

    }

    .censcms-layout-admin .censcms-header .censcms-logo .censcms-logo-brand a{
        display: block;
        padding-left: 23px;
        color: #fff;
    }
    .censcms-layout-admin .censcms-header .censcms-logo .censcms-logo-toggle{
        position: absolute;
        left: 0;
        top: 0;
        display: block;
        width: 50px;
        height: 50px;
        text-align: center;
        line-height: 50px;
        color: #fff;
        cursor: pointer;
    }
    .censcms-layout-admin .censcms-header .censcms-logo .censcms-logo-toggle:hover{
        background-color: rgba(0,0,0,.09);
        color: #fff;
        transition: all .2s;
        -webtplay-transition: all .2s;
    }
    .censcms-layout-admin .censcms-sidebar{
        position: fixed;
        bottom: 0;
        z-index: 9998;
        left: 0;
        width: 220px;
        top: 50px;
        overflow-x: hidden;
        box-shadow: 1px 1px 10px rgba(0,0,0,.1);
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll{
        width: 220px;
        background-color: #fff;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu{

    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item{

    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item a{
        display: block;
        color: #333;
        padding: 10px 25px 10px 15px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        position: relative;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item a:hover{
        background-color: #f0f0f0 !important;
        transition: all .2s;
        -webtplay-transition: all .2s;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-this a{
        background: #f0f0f0;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item a.chird:after{
        font-family: layui-icon !important;
        content: '\e61a';
        position: absolute;
        right: 15px;
        font-size: 12px;
        top: 14px;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-show > a.chird:after{
        content: '\e619';
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item .censcms-menu-child{
        display: none;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-show .censcms-menu-child{
        display: block;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item .censcms-menu-child .censcms-menu-item a{
        padding-left: 30px;
    }
    .censcms-layout-admin .censcms-body{
        left: 220px;
        top: 50px;
        right: 0;
        bottom: 0;
        background-color: #f2f2f2;
        position: absolute;
        z-index: 9997;
        width: auto;
        overflow: hidden;
        overflow-y: auto;
        box-sizing: border-box;
    }
    .censcms-layout-admin .censcms-body .censcms-body-body{
        margin: 15px;
        /*background-color: #fff;*/
        position: relative;
        box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
    }
    .censcms-layout-admin .censcms-body .censcms-body-body .censcms-main-body{

    }
    .censcms-layout-admin .censcms-body .censcms-body-body .censcms-side-body{

    }
    .censcms-layout-admin .censcms-body .censcms-body-body .layui-col-md4{
        padding-left: 15px;
        padding-top: 0;
    }
    .censcms-main-card{
        margin-bottom: 15px;
    }
    .censcms-layout-admin .censcms-body .censcms-body-body .censcms-main-body .layui-tab-title .layui-this::after{
        border:none;
        border-bottom: 2px solid #2ab27b;
    }
    .censcms-layout-admin .censcms-body .censcms-body-body .censcms-note-box{
        margin-bottom: 15px;
    }
    .censcms-layout-admin .censcms-body .censcms-body-body .censcms-note-box .censcms-note-box-list{

    }
    @media screen and (max-width: 992px) {
        .censcms-layout-admin .censcms-body .censcms-body-body .layui-col-sm12{
            margin-top: 15px!important;
            padding-left: 0!important;
        }
    }
</style>

<div class="censcms-header">
    <div class="censcms-logo">
        <div class="censcms-logo-brand">
            <a href="/">Censcms Pro</a>
        </div>
        <div class="censcms-logo-toggle" data-toggle="on"><i class="layui-icon layui-icon-left"></i></div>
    </div>
</div>
<div class="censcms-sidebar">
    {{--如何判断是否已被选中，全部携带id，当点击后，亮起，进入后，判断哪个id与之相对应--}}
    <div class="censcms-sidebar-scroll">
        <div>
            <ul class="censcms-menu">
                {{--一级菜单--}}
                <li class="censcms-menu-item censcms-this">
                    <a href="">
                        <i class="layui-icon layui-icon-chart-screen"></i>
                        <span>首页</span>
                    </a>
                </li>
                {{--三级菜单--}}
                <li class="censcms-menu-item censcms-show">
                    <a class="chird">
                        <i class="layui-icon layui-icon-set"></i>
                        <span>设置</span>
                    </a>
                    <ul class="censcms-menu-child">
                        <li class="censcms-menu-item">
                            <a href="">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>个人</span>
                            </a>
                        </li>
                        <li class="censcms-menu-item">
                            <a href="">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>系统</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--二级菜单--}}
                <li class="censcms-menu-item censcms-show">
                    <a class="chird">
                        <i class="layui-icon layui-icon-user"></i>
                        <span>用户</span>
                    </a>
                    <ul class="censcms-menu-child">
                        <li class="censcms-menu-item">
                            <a href="">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>管理组</span>
                            </a>
                        </li>
                        <li class="censcms-menu-item">
                            <a href="">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>用户组</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="censcms-menu-item">
                    <a href="">
                        <i class="layui-icon layui-icon-read"></i>
                        <span>文章</span>
                    </a>
                </li>
                <li class="censcms-menu-item">
                    <a href="">
                        <i class="layui-icon layui-icon-about"></i>
                        <span>我们</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{--内容区总容器-无15px外间距--}}
<div class="censcms-body">
    {{--内容区-已15px外间距--}}
    <div class="censcms-body-body">
        <div class="layui-card censcms-note-box">
            <div class="layui-card-header">便签</div>
            <div class="censcms-note-box-list">
                我的便签
            </div>
        </div>
        {{--主面板--}}
        <div class="censcms-main-body layui-col-md8">
            <div class="layui-card censcms-main-card">
                <div class="layui-card-header">实时访客</div>
            </div>
            <div class="censcms-card layui-card layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">登录记录</li>
                    <li>用户管理</li>
                    <li>权限分配</li>
                    <li>商品管理</li>
                    <li>订单管理</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">内容1</div>
                    <div class="layui-tab-item">内容2</div>
                    <div class="layui-tab-item">内容3</div>
                    <div class="layui-tab-item">内容4</div>
                    <div class="layui-tab-item">内容5</div>
                </div>
            </div>
        </div>
        {{--侧边栏--}}
        <div class="censcms-side-body layui-col-md4 layui-col-sm12">
            <div class="layui-card censcms-main-card">
                <div class="layui-card-header">快捷入口</div>
                <div></div>
            </div>
            <div class="layui-card censcms-main-card">
                <div class="layui-card-header">官方公告</div>
                <div></div>
            </div>
            <div class="layui-card censcms-main-card">
                <div class="layui-card-header">系统情况</div>
                <div></div>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<script>
    //切换边栏
    var toggleCenscmsSidebar = function () {
        var toggle = $(".censcms-logo-toggle").data('toggle');
//        alert(toggle);
        if(toggle === 'on'){
            $('.censcms-logo-toggle').data('toggle','off');
            $('.censcms-logo-toggle i').removeClass('layui-icon-left');
            $('.censcms-logo-toggle i').addClass('layui-icon-right');
            $('.censcms-body').animate({'left':'0'});
            $('.censcms-sidebar').animate({'left':'-220px'});
        }else{
            $('.censcms-logo-toggle').data('toggle','on');
            $('.censcms-logo-toggle i').removeClass('layui-icon-right');
            $('.censcms-logo-toggle i').addClass('layui-icon-left');
            $('.censcms-body').animate({'left':'220px'});
            $('.censcms-sidebar').animate({'left':'0'});
        }
    }
    $('.censcms-logo-toggle').on('click',function(){toggleCenscmsSidebar()})

    //切换二级菜单
</script>
<script>
    layui.use('element', function(){
        var element = layui.element;
        //一些事件监听
        element.on('demo', function (elem) {
            console.log(elem);
//            element.tabChange('demo', layid);
        })
    });
</script>
</html>