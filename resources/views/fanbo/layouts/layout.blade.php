<!DOCTYPE html>
<html lang="en">

<head>
    <title>极爱网-极爱撸羊毛</title>
    <meta name="keywords" content="优惠 低价 购物 商城">
    <meta name="description" content="极爱网，极爱撸羊毛。本站收集各站点优惠商品信息，用最低家，购买最实惠优质的商品。记住本网站吧——ji2.cn">
    <link rel="stylesheet" href="/layui/css/layui.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
    <!-- [if lt IE 9]>
    <![endif] -->
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

<script>
    layui.use('element', function(){
        var element = layui.element;
        //一些事件监听
        element.on('nav(menu_list)', function(elem){
            console.log(elem); //得到当前点击的DOM对象
        });
    });
</script>