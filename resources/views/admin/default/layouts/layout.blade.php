<!DOCTYPE html>
<html lang="en">

<head>
    <title>辰象CMS</title>
    <link rel="stylesheet" href="/layui/css/layui.css" />
    <link rel="stylesheet" href="/adminRes/default/css/layout.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>


{{--<body async="true" class="censcms-layout-admin">--}}
<body class="censcms-layout-admin">
<input id="csrf" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<style>
    /**
    新定义特性
     */
    /*在layui-elem-quote上的新特性*/
    .layui-elem-quote-headtitle{
        margin-bottom: 20px;
    }
    .layui-elem-quote-block{
        padding-top: 20px;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }
    .layui-elem-quote-block .layui-form-item:last-child{
        margin-bottom: 0;
    }
    .censng-button-act-box{
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    /**
    完
     */
    .censcms-layout-admin .censcms-header{
        z-index: 9999;
        height: 50px;
        box-sizing: border-box;
        background-color: #2c3e50;
        border-bottom: 1px solid #2c3e50;
        position: fixed;
        /*position: absolute;*/
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
        padding-left: 60px;
        color: #fff;
    }
    .censcms-layout-admin .censcms-header .censcms-logo .censcms-logo-toggle{
        position: absolute;
        left: 0;
        top: 0;
        display: block;
        width: 80px;
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
    .censcms-layout-admin .censcms-header .censcms-layout-right{
        position: absolute !important;
        right: 20px;
        top: 0;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav{
        line-height: 50px;

    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav > .item{
        vertical-align: top;
        display: inline-block;
        /*width: 50px;*/
        text-align: center;
        padding: 0 15px;
        position: relative;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav .hasChildItem{

    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav .censcms-show .childList{
        display: inline-block!important;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav .hasChildItem .childList{
        display: none;
        position: absolute;
        top: 49px;
        right: 0;
        background: #2c3e50;
        color: #fff;
        border-top: 1px solid rgba(0,0,0,0.09);
        text-align: left;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav .hasChildItem .childList li{
        padding: 0 20px;
        line-height: 40px;
        width: 136px;
        box-sizing: border-box;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav .hasChildItem .childList li:hover{
        background-color: rgba(0,0,0,0.09);
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav > .item:hover{
        background-color: rgba(0,0,0,.09);
        cursor: pointer;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav > .item a{
        color: #fff;
        outline: none;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav > .item > .hasChild{
        padding-right: 16px;
    }
    .censcms-layout-admin .censcms-header .censcms-layout-right .censcms-nav > .item > .hasChild:after{
        top: 0;
        right: 13px;
        font-family: layui-icon !important;
        content: '\e61a';
        position: absolute;
        font-size: 12px;
    }
    .censcms-layout-admin .censcms-sidebar{
        position: fixed;
        /*position: absolute;*/
        bottom: 0;
        z-index: 9998;
        left: 0;
        width: 220px;
        top: 50px;
        overflow-x: hidden;
        box-shadow: 1px 1px 10px rgba(0,0,0,.1);
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll{
        width: 100%;
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
        outline:none;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item a:hover{
        background-color: #f0f0f0 !important;
        transition: all .2s;
        -webtplay-transition: all .2s;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-this a{
        background: #f0f0f0;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item a.child:after{
        font-family: layui-icon !important;
        content: '\e61a';
        position: absolute;
        right: 15px;
        font-size: 12px;
        top: 14px;
    }

    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-show > a.child:after{
        content: '\e619';
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item .censcms-menu-child{
        display: none;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-show > .censcms-menu-child{
        display: block;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item > .censcms-menu-child > .censcms-menu-item a{
        padding-left: 30px;
    }
    .censcms-layout-admin .censcms-sidebar .censcms-sidebar-scroll .censcms-menu .censcms-menu-item > .censcms-menu-child > .censcms-menu-item > .censcms-menu-child > .censcms-menu-item a{
        padding-left: 45px;
    }
    body{
        min-width: 980px;
    }
    .censcms-layout-admin .censcms-body{
        /*min-width: 768px;*/
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
    .censcms-layout-quote{
        margin-top: 1.2rem;
    }
    .censcms-layout-content{
        padding: 20px 20px 30px 20px;
    }
    .censcms-layui-select{
        width: 200px;
        margin-top: 1rem;
    }
</style>

<div class="censcms-header">
    <div class="censcms-logo">
        <div class="censcms-logo-brand">
            <a>辰象CMS Pro</a>
        </div>
        <div class="censcms-logo-toggle" data-toggle="on"><i class="layui-icon layui-icon-left"></i><span>菜单</span></div>
    </div>
    <div class="censcms-layout-right">
        <ul class="censcms-nav">
            <li class="item">
                <a target="_blank" href="/">
                    <i class="layui-icon layui-icon-website"><span style="font-size: 14px;position: relative;top: -1px;margin-left: 4px;">我的站点</span></i>
                </a>
            </li>
            <li style="display: none;" class="item">
                <a href="/">
                    <i class="layui-icon layui-icon-edit"></i>
                </a>
            </li>
            <li class="item hasChildItem">
                <a onclick="toggleNavListPanel(this)" data-toggle="off" class="hasChild censcms-nav-hasChildItem">
                    管理
                </a>
                {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
                <button type="submit">Logout</button>
                {!! Form::close() !!}
                <ul class="childList">
                    <li>
                        <i class="layui-icon layui-icon-set"></i>
                        <a href="#/system/dataset">站点配置</a>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-edit"></i>
                        <a href="#/me/safety/password">更改密码</a>
                    </li>
                    <li>
                        <i class="layui-icon layui-icon-return"></i>
                        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:inline-block;background:none', 'id' => 'logout']) !!}
                        <button style="background: none;outline: none;border: none;color: #fff;" type="submit">登出</button>
                        {!! Form::close() !!}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="censcms-sidebar">
    {{--如何判断是否已被选中，全部携带id，当点击后，亮起，进入后，判断哪个id与之相对应--}}
    <div class="censcms-sidebar-scroll">
        <div>
            {{--以下为案例，不可删除，其包含逻辑方法--}}
            <ul class="censcms-menu">
                <p class="censcms-sidebar-menu-help">使用移动端操作时，推荐将屏幕旋转，更便于操作</p>

                {{--一级菜单--}}
                <li data-id="" class="censcms-menu-item censcms-menu-item-a censcms-this">
                    <a class="" href="/admin/default/home/#/">
                        <i class="layui-icon layui-icon-chart-screen"></i>
                        <span>首页</span>
                    </a>
                </li>
                {{--三级菜单--}}
                <li data-toggle="off" class="censcms-menu-item censcms-menu-item-hasChird">
                    <a class="child">
                        <i class="layui-icon layui-icon-set"></i>
                        <span>设置</span>
                    </a>
                    <ul class="censcms-menu-child layui-anim">
                        <li data-toggle="off" class="censcms-menu-item censcms-menu-item-hasChird">
                            <a class="child">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>个人</span>
                            </a>
                            <ul class="censcms-menu-child layui-anim">
                                <li data-id="sanji" id="sanji"  class="censcms-menu-item censcms-menu-item-a">
                                    <a class="" href="#/me/safety/password">
                                        <i class="layui-icon layui-icon-chart-screen"></i>
                                        <span>更改密码</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li data-toggle="off" class="censcms-menu-item censcms-menu-item-hasChird">
                            <a class="child">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>系统</span>
                            </a>
                            <ul class="censcms-menu-child layui-anim">
                                <li data-id="sanji" id="sanji"  class="censcms-menu-item censcms-menu-item-a">
                                    <a class="" href="#/system/dataset">
                                        <i class="layui-icon layui-icon-chart-screen"></i>
                                        <span>站点信息</span>
                                    </a>
                                </li>
                                <li style="display: none" data-id="sanji" id="sanji"  class="censcms-menu-item censcms-menu-item-a">
                                    <a class="" href="#/system/power">
                                        <i class="layui-icon layui-icon-chart-screen"></i>
                                        <span>权限节点</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{--二级菜单--}}
                <li style="display: none" data-toggle="off" class="censcms-menu-item-hasChird censcms-menu-item">
                    <a class="child">
                        <i class="layui-icon layui-icon-user"></i>
                        <span>用户</span>
                    </a>
                    <ul class="censcms-menu-child layui-anim">
                        <li class="censcms-menu-item censcms-menu-item-a">
                            <a class="" href="#/user/userpower">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>权限管理</span>
                            </a>
                        </li>
                        <li class="censcms-menu-item censcms-menu-item-a">
                            <a class="" href="#/user/usergroup">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>用户组管理</span>
                            </a>
                        </li>
                        <li class="censcms-menu-item censcms-menu-item-a">
                            <a class="" href="#/user/users">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>用户管理</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="censcms-menu-item censcms-menu-item-a">
                    <a href="#/menu">
                        <i class="layui-icon layui-icon-template"></i>
                        <span>菜单</span>
                    </a>
                </li>
                <li data-toggle="off" class="censcms-menu-item censcms-menu-item-hasChird">
                    <a class="child">
                        <i class="layui-icon layui-icon-read"></i>
                        <span>文章</span>
                    </a>
                    <ul class="censcms-menu-child layui-anim">
                        <li data-id="fenleiguanli" id="fenleiguanli" class="censcms-menu-item censcms-menu-item-a">
                            <a class="" href="#/cms/archive">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>分类管理</span>
                            </a>
                        </li>
                        <li class="censcms-menu-item censcms-menu-item-a">
                            <a class="" href="#/cms/article">
                                <i class="layui-icon layui-icon-chart-screen"></i>
                                <span>文章管理</span>
                            </a>
                        </li>
                        <li data-toggle="off" class="censcms-menu-item censcms-menu-item-hasChird">
                            <a class="child">
                                <i class="layui-icon layui-icon-read"></i>
                                <span>图片管理</span>
                            </a>
                            <ul class="censcms-menu-child layui-anim">
                                <li data-id="fenleiguanli" id="fenleiguanli" class="censcms-menu-item censcms-menu-item-a">
                                    <a class="" href="#/cms/photo/archive">
                                        <i class="layui-icon layui-icon-chart-screen"></i>
                                        <span>图片分类</span>
                                    </a>
                                </li>
                                <li class="censcms-menu-item censcms-menu-item-a">
                                    <a class="" href="#/cms/photo/list">
                                        <i class="layui-icon layui-icon-chart-screen"></i>
                                        <span>所有图片</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="censcms-menu-item censcms-menu-item-a">
                    <a href="#/aboutus">
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
    <div class="censcms-body-body" id="page-main">
    </div>
</div>

</body>

<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="/js/md5.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript"  src="http://www.ijquery.cn/js/html5shiv.js"></script>
<![endif]-->
<link rel="stylesheet" href="/module/loading/jquery.mloading.css">
<script src="/module/loading/jquery.mloading.js"></script>
<script src="/module/loading/use.js"></script>


<link href="/module/notice/toastr.css" rel="stylesheet"/>
<script src="/module/notice/toastr.js"></script>
<script src="/js/http.js"></script>
<script src="/module/select/js/selectFilter.js"></script>

<script type="text/javascript" src="/js/require.js"></script>
<link href="/module/editor/wangEditor.css" rel="stylesheet" />
{{--前端路由--}}
<style>
    body .httpLoading-class{
        background: none;
        box-shadow: none;
        border: none;
        overflow: visible;
    }
    body .httpLoading-class .layui-layer-title{background:none; color:#fff; border: none;}
    body .httpLoading-class .layui-layer-btn{border-top:none}
    body .httpLoading-class .layui-layer-btn a{background:none;}
    body .httpLoading-class .layui-layer-btn .layui-layer-btn1{background:none;}
    .httpLoading{
        color: #fff;
        display: none;
        z-index: 99999;
        font-size: 22px;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 46%;
        text-align: center;
    }
    .httpLoading div{
        position: relative;
    }
    .httpLoading .layui-icon{
        font-size: 36px;
        margin-bottom: 2rem;
    }
    .httpLoading .tips{
        letter-spacing: 3px;
        text-indent: 3px;
    }
    </style>
<div id="httpLoading" class="httpLoading">
    <div class="layui-icon layui-icon-loading layui-anim layui-anim-rotate layui-anim-loop"></div>
    <div class="tips">数据处理中</div>
</div>
<div id="httpPageLoading" class="httpLoading">
    <div class="layui-icon layui-icon-loading layui-anim layui-anim-rotate layui-anim-loop"></div>
    <div class="tips">页面加载中，请稍后</div>
</div>
<script>
    {{--前端路由,配置路由对象 执行顺序为12534--}}
    function Router(){
        this.currentUrl='';
        this.routes = {
        };
    }
    //绑定路由及对应的方法
    Router.prototype.route = function(path,callback){
        console.log(5);
        this.routes[path] = callback || function(){}
    };
    //多绑定
    Router.prototype.routegroup = function (group) {
        for(i=0; i<group.length; i++){
            this.route(group[i][0],group[i][1]);
        }
    };
    //得到路由，启用路由方法
    Router.prototype.refresh = function(){
        console.log(this);
        console.log(3);
        this.currentUrl = location.hash.slice(1) || '/';
        console.log(4);
        var type = typeof(this.routes[this.currentUrl]);
        console.log(type);
        if(type === 'function'){
            console.log('running route');
            this.routes[this.currentUrl]();
        }else {

        }
        console.log(this.routes)
    };
    //路由初始化
    Router.prototype.init = function() {
        console.log(1);
        console.log('判断addeventListener是在加载完后执行，即route was settled');
        //绑定load事件，如发生，执行-得到路由，启用路由方法-该方法，使用this方法。
        window.addEventListener('load', this.refresh.bind(this), false);
        console.log(2);
        //绑定hashchange事件，如发生，执行-得到路由，启用路由方法-该方法
        window.addEventListener('hashchange', this.refresh.bind(this), false);
        console.log(location.hash);
    };
    //运行
    var route = new Router();
    route.init();
    //加载路由页面-已经加载的，会被缓存，不存在多次加载情况
    function loadingRoutePage (route){
        $(document).ready(function (){
            //渲染菜单-没有必要-tplay中也没有进行对于刷新后，菜单状态丢失的渲染
            // 引入加载中
            // loading.loadingShow("加载中");
            //特殊对待路由
            if(route==='/'){
                route = '/index'
            }
            //根据路由，请求后台
            var url = '/admin/default/route'+route;
            //得到侧边栏宽度
            var width = $('.censcms-sidebar').css('width');
            console.log(width);
            //开始请求
            http.getPage(url).then(function (res) {
                if(width !== '220px'){
                    //关闭侧边栏
                    var toggle = $(".censcms-logo-toggle").data('toggle');
                    if(toggle === 'on'){
                        toggleCenscmsSidebar();
                    }
                }
                //处理结果
                console.log(res);
                $('#page-main').html(res);
                layer.close(layer.index);
            }).catch(function (res) {
                if(width !== '220px'){
                    //关闭侧边栏
                    toggleCenscmsSidebar();
                }
                $('#page-main').html('页面加载异常');
                layer.close(layer.index);
            });
        })
    }
    //根路由
    route.route('/',loadingRoutePage.bind(null,'/'));
    //设置路由组-个人
    route.routegroup([
        //密码管理
        ['/me/safety/password',loadingRoutePage.bind(null,'/me/safety/password')]
    ]);
    //设置路由组-系统
    route.routegroup([
        //站点信息配置
        ['/system/dataset',loadingRoutePage.bind(null,'/system/dataset')],
        //权限节点
        ['/system/power',loadingRoutePage.bind(null,'/system/power')]
    ]);
    //用户路由组
    route.routegroup([
        //权限管理
        ['/user/userpower',loadingRoutePage.bind(null,'/user/userpower')],
        //用户组管理
        ['/user/usergroup',loadingRoutePage.bind(null,'/user/usergroup')],
        //用户管理
        ['/user/users',loadingRoutePage.bind(null,'/user/users')]
    ]);
    //菜单路由
    route.route('/menu',loadingRoutePage.bind(null,'/menu'));
    //文章路由组
    route.routegroup([
        //分类管理
        ['/cms/archive',loadingRoutePage.bind(null,'/cms/archive')],
        //文章管理
        ['/cms/article',loadingRoutePage.bind(null,'/cms/article')],
        //图片分类
        ['/cms/photo/archive',loadingRoutePage.bind(null,'/cms/photo/archive')],
        //所有图片
        ['/cms/photo/list',loadingRoutePage.bind(null,'/cms/photo/list')]
    ]);
    route.route('/aboutus',loadingRoutePage.bind(null,'/aboutus'));
    //加载layui相关
    var table = undefined;
    var layer = undefined;
    var form = undefined;
    var upload = undefined;
    layui.use(['table','layer','form','element','upload'], function(){
        table = layui.table;
        layer = layui.layer;
        form = layui.form;
        element = layui.element;
        upload = layui.upload;
    });
    //切换边栏
    var toggleCenscmsSidebar = function () {
        var toggle = $(".censcms-logo-toggle").data('toggle');
        //得到侧边栏宽度
        var width = $('.censcms-sidebar').css('width');
        console.log(width);
//        alert(toggle);
        if(toggle === 'on'){
            $('.censcms-logo-toggle').data('toggle','off');
            $('.censcms-logo-toggle i').removeClass('layui-icon-left');
            $('.censcms-logo-toggle i').addClass('layui-icon-right');
            $('.censcms-body').animate({'left':'0'});
            //如果菜单的宽度属性是100%，则左移整个窗口
            if(width !== '220px'){
                $('.censcms-sidebar').animate({'left':'-'+width});
            }else{
                $('.censcms-sidebar').animate({'left':'-220px'});
            }
        }else{
            $('.censcms-logo-toggle').data('toggle','on');
            $('.censcms-logo-toggle i').removeClass('layui-icon-right');
            $('.censcms-logo-toggle i').addClass('layui-icon-left');
            $('.censcms-body').animate({'left':width});
            $('.censcms-sidebar').animate({'left':'0'});
        }
    }
    $('.censcms-logo-toggle').on('click',function(){toggleCenscmsSidebar()});

    $(document).ready(function (){
        //切换二级菜单
        var toggleCenscmsSidebarChirdMenu = function (event,ele) {
            //得到toggle值
            var toggle = $(ele).data('toggle');
            if(toggle === 'off'){
                $(ele).data('toggle', 'on');
                $(ele).addClass('censcms-show');
                $(ele).children(".censcms-menu-child").addClass('layui-anim-upbit')
            }else{
                $(ele).data('toggle', 'off');
                $(ele).removeClass('censcms-show');
                $(ele).children(".censcms-menu-child").removeClass('layui-anim-upbit')
            }
            event.stopPropagation();
            return false;
        };
        $('.censcms-menu-item-hasChird').on('click',function(event){toggleCenscmsSidebarChirdMenu(event,this)});

        //点击菜单，使用本地存储id，进行匹配，并添加样式
        //新方案，使用前端路由，路由后，ajax获取html内容，向主体中进行刷新
        var clickCenscmsSidebarMenuItem = function (event,ele){
            $('.censcms-this').removeClass('censcms-this');
            $(ele).addClass("censcms-this");
            event.stopPropagation();
            return false;
        };
        $('.censcms-menu-item-a').on('click',function(event,ele){clickCenscmsSidebarMenuItem(event,this)});

        //切换导航面板
        function toggleNavListPanel(ele){
            var toggle = $(ele).data('toggle');
            console.log(toggle);
            if(toggle === 'off'){
                $(ele).data('toggle', 'on');
                console.log($(ele).parent());
                $(ele).parent().addClass('censcms-show');
            }else{
                $(ele).data('toggle', 'off');
                $(ele).parent().removeClass('censcms-show');
            }
            return false;
        }
    })
</script>
</html>

{{--2018年09月11日14:37-前端样式预览版已架设完毕-后续任务-与登录登出功能进行对接--}}