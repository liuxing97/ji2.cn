@php
    $photoArchiveObj = new \App\CmsPhotoArchive();
    $photoArchiveObj = $photoArchiveObj -> where('alias','qingbaolehua') -> first();
    $photoItemObj = new \App\CmsPhotoItem();
    //获取最新的50个
    $photoItemObj = $photoItemObj -> where('archive',$photoArchiveObj -> id) -> orderBy('id','desc') -> get() ->take(50);
    $photoItemsArray = $photoItemObj -> toArray();
@endphp



@extends('fanbo/layouts/layout')
@section('web-title')
    {{$siteData['censcms_web_name']}}-{{$articleData['title']}}
@endsection
@section('web-describe')
    {{$siteData['censcms_web_name']}}-{{$articleData['describe']}}
@endsection
@section('menuList')
    <li class="layui-nav-item layui-this"><a href="">资讯正文</a></li>
@endsection

@section('content')
    <style>
        .content{
            margin-top: 20px;
            padding: 20px 20px;
            /*padding: 0 1.5rem;*/
            background: #fff;
        }
        .content .articletitle{
            border-color: #ff7975 !important;
            line-height: 2.5rem;
            font-size: 22px;
            /*padding: 0 20px;*/
        }
        .articletitle_hr{
            background-color: #E1594B;
            height: 3px;
            margin-top: 1rem;
        }
        .content .layui-icon{
            font-size: 32px;
            color: #E1594B;
            margin-right: 1rem;
        }
        .content-words{
            line-height: 2rem;
            color: #626262;
            padding: 20px 0;
        }
        .content-words .describe{
            color: #9a9a9a;
        }
        .content_main{}
        .content_main p{
            text-indent: 1rem;
        }
        .release_time{
            position: relative;
            top: 9px;
            font-size: 14px;
            text-align: right;
            color: #9a9a9a;
        }
        .more_article{
            background: #fff;
            margin-top: 20px;
            padding: 20px 20px;
        }
        .more_article_title{
            font-size: 22px;
            text-align: center;
            /*color: #9a9a9a;*/
        }
        .more_articleList{
            margin-top: 1rem;
        }
        .more_articleList ul{

        }
        .more_articleList ul li{
            font-size: 16px;

            line-height: 2.5rem;
        }
        .more_articleList ul li a{
            color: #9a9a9a;
        }
        .more_articleList ul li a i{
            /*font-size: 14px;*/
            margin-right: 12px;
            color: #E1594B;
        }
        .more_articleList .r-time{
            font-size: 16px;
            line-height: 1rem;
            margin-top: 1rem;
        }
        .content_main_title{
            display: block;
            color: #E1594B;
        }
        .more_article_help{
            text-align: center;
            margin-top: 20px;
            border-top: 1px dashed #e5e5e5;
            line-height: 46px;
            color: #9a9a9a;
            border-bottom: 1px dashed #e5e5e5;
        }
        .more_article_huadong{

        }
        .more_article_huadong_box{
            display: block;
            text-align: center;

            margin: 48px 0px;
        }
        .more_article_huadong_box_main-main{
            display: inline-block;

            margin-right: -180px;

            background: #fff;

            position: relative;

            left: -90px;

            border-radius: 3px;

            overflow: hidden;
        }
        .more_article_huadong_box_main-main:nth-child(1){
            z-index: 9999;

            top: -5px;
            box-shadow: 0 0 10px #373737;
        }
        .more_article_huadong_box_main-main:nth-child(2){
            z-index: 9999;
            top:10px;
            box-shadow: 0 0 10px #666;
        }
        .more_article_huadong_box_main-main:nth-child(3){
            z-index: 9997;

            top: -5px;

            box-shadow: 0 0 10px #373737;
        }

        .more_article_huadong_box_main{
            display: table;

            text-align: center;

            overflow: hidden;
        }
        .more_article_huadong_box_main_img{
            text-align: center;

            display: table-cell;

            vertical-align: middle;

            padding: 15px;
        }
        .more_article_huadong_box_main-main:nth-child(1) .more_article_huadong_box_main_img,
        .more_article_huadong_box_main-main:nth-child(3) .more_article_huadong_box_main_img{
            height: 280px;
            width: 190px;
        }
        .more_article_huadong_box_main-main:nth-child(2) .more_article_huadong_box_main_img{
            height: 312px;
            width: 215px;
        }
        .more_article_huadong_box_main_img img{
            max-width: 100%;
            max-height: 100%;
        }

    </style>
    <div class="content">
        <div class="content-header">
            <h3 class="articletitle"><i class="layui-icon layui-icon-read"></i>{{$articleData['title']}}</h3>
            <div class="release_time">{{$articleData['created_at']}}</div>
            <hr class="articletitle_hr">
        </div>
        <div class="content-words">
            <div class="describe"><span>描述：</span>
                {{$articleData['describe']}}
                <hr>
            </div>
            <div class="content_main">
                <span class="content_main_title">正文：</span>
                {!! $articleData['content'] !!}
            </div>
        </div>
    </div>
    {{--更多资讯-图片--}}
    <div class="more_article">
        <div class="more_article_title">情报乐划</div>
        <div class="more_article_help">长按保存图片，或直接识别，进入详情页哦~</div>
        {{--关于本模块
            本模块随机获取图片，从近期15天发布的图片中进行抽取调用
            使用一次获取还是ajax获取方式？
            使用一次获取的方式，一次获取50条数据/暂时先获取最新的50条数据/
        --}}
        <div class="more_article_huadong">
            <div class="more_article_huadong_data">
                @foreach($photoItemsArray as $item)
                    <p style="display: none">{{$item['path']}}</p>
                    @endforeach
            </div>
            {{--遍历，三个--}}
            <div class="more_article_huadong_box" id="more_article_huadong_box">
                <div onclick="" class="more_article_huadong_box_main-main">
                    <div class="more_article_huadong_box_main">
                        <div class="more_article_huadong_box_main_img">
                            <img src="/pages/img/logo.png"/>
                        </div>
                    </div>
                </div>
                <div onclick="" class="more_article_huadong_box_main-main">
                    <div class="more_article_huadong_box_main">
                        <div class="more_article_huadong_box_main_img">
                            <img src="/pages/img/logo.png"/>
                        </div>
                    </div>
                </div>
                <div onclick="" class="more_article_huadong_box_main-main">
                    <div class="more_article_huadong_box_main">
                        <div class="more_article_huadong_box_main_img">
                            <img src="/pages/img/logo.png"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 16px" class="more_article_help">左右滑动，挑选心仪商品哦~</div>
    </div>
    {{--更多资讯-文章--}}
    <div class="more_article">
        <div class="more_article_title">更多资讯</div>
        <div class="more_articleList">
            <ul>
                @foreach($articleShow as $showItem)
                <li><a href="/article/{{$showItem['id']}}"><i class="layui-icon layui-icon-read"></i>{{$showItem['title']}}&nbsp;&nbsp;&nbsp;<span class="r-time">{{$showItem['created_at']}}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @endsection
@section('js')
    <script>
        function nextOne(){
            //移除中间元素
            var cur_li = $('.more_article_huadong_box_main-main:nth-child(2)');
            var prev_li = cur_li.prev();
            cur_li.animate({
                height:'310px',
                width:'220px',

            });
            // 获取当前节点的上一个节点
            // 把当前节点插入到上一个节点之前，如果不存在上一个节点，说明已经到达顶部
            if(prev_li.length != 0){
                prev_li.before(cur_li);
            }

            //移除中间元素
            var cur_li = $('.more_article_huadong_box_main-main:nth-child(3)');
            cur_li.animate();
            var prev_li = cur_li.prev();
            // 获取当前节点的上一个节点
            // 把当前节点插入到上一个节点之前，如果不存在上一个节点，说明已经到达顶部
            if(prev_li.length != 0){
                prev_li.before(cur_li);
            }
            cur_li.css({
                height:'342px',
                width:'245px'
            });

            var datas = $(".more_article_huadong_data p");
            var lehuaModel = $(".more_article_huadong_box_main_img img");
            var datasLength = datas.length;
            if(datasLength > 3){
                //判断当前是否改变后显示的是倒数第一个，如果是倒数第一个，进行特殊处理，将最后一个位置设置为第一个图片
                if(thisCard === datasLength){
                    //将当前浏览thisCard改为1
                    thisCard = 1;
                    console.log(thisCard);
                    //进行数据偏移处理，
                    //进行数据偏移处理，第一个lehuaModel为最后一个数据(last)，第二个+1(thisCard)，第三个+1(thisCard+1)
//                    lehuaModel.eq(0).attr('src',datas.last().html());
                    lehuaModel.eq(1).attr('src',datas.eq(thisCard-1).html());
//                    lehuaModel.eq(2).attr('src',datas.eq(thisCard).html());
                }else{
                    //先做加一处理
                    console.log("中间卡片更改后要加载的图片地址"+datas.eq(thisCard).html());
                    console.log("中间卡片滑动前的序号"+thisCard);
                    var nextDataEqNum = thisCard;
                    //进行数据偏移处理，第二个变成thisCard
                    //进行数据偏移处理，第一个lehuaModel加1(thisCard-1)，第二个+1(thisCard)，第三个+1(thisCard+1)
//                                lehuaModel.eq(0).attr('src',datas.eq(thisCard-1).html());
//                                lehuaModel.eq(2).attr('src',datas.eq(thisCard+1).html());
                                lehuaModel.eq(1).attr('src',datas.eq(thisCard).html());

                    //卡片加一
                    thisCard = thisCard+1;
                    console.log("中间卡片滑动后的序号"+thisCard);
                }
            }
        }
        function lastOne(){
            //移除中间元素
            var cur_li = $('.more_article_huadong_box_main-main:nth-child(2)');
            var prev_li = cur_li.next();
            cur_li.animate({
                height:'310px',
                width:'220px',
            });
            // 获取当前节点的上一个节点
            // 把当前节点插入到上一个节点之前，如果不存在上一个节点，说明已经到达顶部
            if(prev_li.length != 0){
                prev_li.after(cur_li);
            }

            //移除中间元素
            var cur_li = $('.more_article_huadong_box_main-main:nth-child(1)');
            cur_li.animate();
            var prev_li = cur_li.next();
            // 获取当前节点的上一个节点
            // 把当前节点插入到上一个节点之前，如果不存在上一个节点，说明已经到达顶部
            if(prev_li.length != 0){
                prev_li.after(cur_li);
            }
            cur_li.css({
                height:'342px',
                width:'245px'
            });

            var datas = $(".more_article_huadong_data p");
            var lehuaModel = $(".more_article_huadong_box_main_img img");
            var datasLength = datas.length;
            if(datasLength > 3){
                //判断当前是否改变后显示的是倒数第一个，如果是倒数第一个，进行特殊处理，将最后一个位置设置为第一个图片
                if(thisCard === 1){
                    //将当前浏览thisCard改为最后一个
                    thisCard = datasLength;
                    console.log(thisCard);
                    //进行数据偏移处理，
                    //进行数据偏移处理，第一个lehuaModel为最后一个数据(last)，第二个+1(thisCard)，第三个+1(thisCard+1)
//                    lehuaModel.eq(0).attr('src',datas.eq(thisCard-1).html());
                    lehuaModel.eq(1).attr('src',datas.eq(thisCard).html());
//                    lehuaModel.eq(2).attr('src',datas.eq(thisCard+1).html());
                }else{
                    //先做加一处理
                    console.log("中间卡片更改后要加载的图片地址"+datas.eq(thisCard).html());
                    console.log("中间卡片滑动前的序号"+thisCard);
                    var nextDataEqNum = thisCard;
                    //进行数据偏移处理，第二个变成thisCard
                    //进行数据偏移处理，第一个lehuaModel加1(thisCard-1)，第二个+1(thisCard)，第三个+1(thisCard+1)
//                    lehuaModel.eq(0).attr('src',datas.eq(thisCard-2).html());
//                    lehuaModel.eq(2).attr('src',datas.eq(thisCard).html());
                    lehuaModel.eq(1).attr('src',datas.eq(thisCard-2).html());

                    //卡片加一
                    thisCard = thisCard-1;
                    console.log("中间卡片滑动后的序号"+thisCard);
                }
            }
        }

        //监听乐划板块的滑动
        //设置当前显示的卡片编号
        thisCard = 1;
        $(function() {
            function judge() {
                var startx;//让startx在touch事件函数里是全局性变量。
                var endx;
                var el = document.getElementById('more_article_huadong_box');//触摸区域。
                function cons() {   //独立封装这个事件可以保证执行顺序，从而能够访问得到应该访问的数据。
                    if (startx > endx) {  //判断左右移动程序
                        //这是左滑，下一个，如果数据量大于三个，进行数据向下偏移，考虑循环显示
                        nextOne();

                    } else {
                        //这是右滑，上一个，如果数据量大于三个，进行数据向上偏移
                        lastOne();
                    }
                }

                el.addEventListener('touchstart', function (e) {
                    var touch = e.changedTouches;
                    startx = touch[0].clientX;
                    starty = touch[0].clientY;
                });
                el.addEventListener('touchend', function (e) {
                    var touch = e.changedTouches;
                    endx = touch[0].clientX;
                    endy = touch[0].clientY;
                    cons();  //startx endx 的数据收集应该放在touchend事件后执行，而不是放在touchstart事件里执行，这样才能访问到touchstart和touchend这2个事件产生的startx和endx数据。另外startx和endx在_touch事件函数里是全局性的，所以在此函数中都可以访问得到，所以只需要注意事件执行的先后顺序即可。
                });
            }
            judge();
        });

        //初始化情报乐划
        function initLehua(){
            console.log("执行初始化乐划模块");
            //取前三
            var datas = $(".more_article_huadong_data p");
            console.log(datas.length);
            var lehuaModel = $(".more_article_huadong_box_main_img img");
            for(var t=0; t<3; t++){
                if(datas.length === 0){
                }
                //如果数据只有一个
                if(datas.length === 1){
                    //alert('only one');
                    lehuaModel.eq(1).attr('src',datas.eq(0).html());
                    break;
                }
                else if(datas.length === 2){
                    lehuaModel.eq(1).attr('src',datas.eq(0).html());
                    lehuaModel.eq(2).attr('src',datas.eq(1).html());
                }
                else if(datas.length >= 3){
                    //第一个，选择最后一个
                    if(t === 0){
                        lehuaModel.eq(t).attr('src',datas.last().html());
                    }
                    //如果不是第一个
                    else{
                        //判断是否存在数据
                        if(datas.eq(t-1).html()){
                            //写入乐划模块
                            lehuaModel.eq(t).attr('src',datas.eq(t-1).html());
                        }else{
                            //-----------/pages/img/logo.png
                            lehuaModel.eq(t).attr('src','/pages/img/logo.png');
                        }
                    }
                }
            }
        }
        $(document).ready(function (){
            initLehua();
        });
    </script>
    @endsection