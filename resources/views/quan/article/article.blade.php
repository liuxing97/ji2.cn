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
    .article_header{
        position: fixed;
        text-align: center;
        line-height: 46px;
        background: #fff;
        border-bottom: 1px solid #e5e5e5;
        font-size: 14px;
        top: 0;
        z-index: 9999;
        width: 100%;
        max-width: 400px;
    }
    .article_header .layui-icon-left{
        position: absolute;
        left: 10px;
    }
    .article_header .article_header_menu{

    }
    .article_header .article_header_menu li{
        display: inline-block;
        margin-right: 12px;
        right: 56px;
        position: relative;
    }
    .article_header .article_header_menu .i:nth-of-type(2){
        /*border-left: 1px dashed #d0d0d0;*/
    }
    .article_header .article_header_menu .i:nth-of-type(1){
        background: #ed424b;
        color: #fff;
    }
    .article_header .article_header_menu .i{
        display: inline-block;
        text-align: center;
        width: 50px;
        line-height: 24px;
    }
    .article_header .layui-icon-more{
        position: absolute;
        right: 10px;
        top: 0;
        font-size: 25px;
        color: #878787;
    }
    .article_show{
        background: #fff;
        padding-bottom: 18px;
        box-shadow: 0 0 10px #ccc;
        margin-top: 47px;
    }
    .article_show .article_title{
        font-size: 15px;
        line-height: 1.8rem;
        font-weight: bold;
        padding: 0 10px;
        margin-top: 10px;
    }
    .article_show .article_title .self{
        background: #ed424b;
        color: #fff;
        margin-right: 5px;
        padding: 0 3px;
        border-radius: 2px;
    }
    .article_show .article_source_price{
        text-align: right;
        text-decoration: line-through;
        color: #7a7a7a;
        padding: 0 10px;
        /*margin-top: 16px;*/
    }
    .article_show .article_price{
        text-align: right;
        font-size: 22px;
        color: #ed424b;
        padding: 0 10px;
        margin-top: 8px;
    }
    .stateItem{
        line-height: 48px;

        background: #fff;

        margin-top: 20px;

        padding: 0 10px;
    }
    .stateItem .t{
        color: #767676;
        font-size: 12px;
        margin-right: 10px;
    }
    .stateItem .v{

    }
</style>
<div class="contentMain">
    {{--商品头部--}}
    <div class="article_header">
        <div class="layui-icon layui-icon-left"></div>
        <div class="article_header_menu">
            <li>科技圈</li>
            <li style="position: absolute;right: 36px">
                <span class="i">资讯</span>
                <span class="i">团购</span>
            </li>
        </div>
        <div class="layui-icon layui-icon-more"></div>
    </div>
    {{--文章主体--}}
    <div class="article_main">
        <style>
            .article_main{
                background: #fff;

                margin-top: 47px;

                padding: 10px 20px;
            }
            .article_title{
                margin-bottom: 26px;

                font-size: 22px;

                line-height: 2.3rem;

                margin-top: 12px;
            }
            .article_content{}
            .article_content p{
                margin-bottom: 18px;

                line-height: 1.8rem;

                text-indent: 1.5em;
            }
            .article_content a{}
            .article_content span{}
            .article_content img{max-width: 100%}
            .article_content div{}
        </style>
        <div class="article_title">
            小米与美图合作背后：美图的解脱，小米的多元化
        </div>
        <div class="article_content">

            <p class="f_center"><img alt="将手机业务授权给小米，对美图意味着什么？" src="http://cms-bucket.nosdn.127.net/2018/11/20/1cfb48701cf649eead0d23c63abd3385.jpeg?imageView&amp;thumbnail=550x0" style="margin: 0px auto; display: block;"><br></p><p>静静/文</p><p>“美图要卖给小米了，你知道吗？”早在一个星期前产业链人士提到。但此时还有个消息：“小米与美图谈崩了。”一个星期后（11月19日），小米2018年Q3财报公布的同时还宣布了与美图的战略合作：小米将获得美图手机品牌和相关影像技术，以及大部分智能硬件的30年全球独家授权。</p><p>其中曲折可见一斑。小米称与美图手机的合作有助于提升拍照体验，赢得更多女性用户。一直以来被贴着“屌丝”、“发烧友”、“极客”等男性标签的小米一直希望能够在女性市场有所突破。因此，邀请了吴亦凡做代言人，推出女神版手机、尝试淡紫色颜色、增加AI美颜功能等等，虽有收获，但难以改变“为发烧友而生”的烙印。</p><p>美图手机则定位高端女性，小米的这一举动不仅可以将女性最关注的“自拍技术”纳入体系，而且将美图手机流量带入进来，还增加了女性用户市场。但是否能如愿达到效果，还有待市场检验。</p><p><b>小米品牌多元化</b></p><p>小米2018年Q3财报交出了不错的成绩：当季小米集团营收508亿元人民币，同比上涨49.1%。经调整利润29亿元，同比增长17.3%。与此同时，小米还宣布了一项重要合作：与美图公司签订战略合作协议。小米将获得美图手机品牌和相关影像技术，以及大部分智能硬件的30年全球独家授权。</p><p>具体来说，美图授权小米使用美图品牌生产他除皮肤相关的多种智能硬件。美图享有就合作智能硬件销售带来的授权分成。</p><p>小米CFO周受资表示此次合作，有三大意义：第一，美图在女性用户群众有一定的品牌优势，小米可以利用好，提高用户的多样性；第二，美图的相机算法有优势；第三，此次合作也让小米在细分品牌上又多了一张牌。</p><p>从诞生之日起，小米就被贴上了“屌丝”、“发烧友”、“极客”等男性标签。小米一直希望能够在女性市场有所突破。因此，邀请了吴亦凡做代言人，推出女神版手机、尝试淡紫色颜色、增加AI美颜功能等等。</p><p>雷军也曾在MIX2S发布会上表示，将继续请吴亦凡代言，因为吴亦凡让小米的女性用户变多了。</p><p>小米在吸引女性用户已经进行了多次尝试，虽有收获，但难以改变“为发烧友而生”的烙印。而美图手机以“自拍”见长，吸引了大量女性用户，站稳了女性这个细分市场。小米的这一举动，这一举动不仅可以将女性最关注的“自拍技术”纳入体系，而且将美图手机流量带入进来，还增加了女性用户这个细分市场。</p><p>其实，除了小米这个品牌之外，今年上半年小米还参股投资了专注游戏体验的黑鲨品牌手机；第三季度，小米又推出了专注性能和速度的子品牌POCO，主要在国际市场。</p><p>对小米来说，美图手机的加入让品牌更加多元化。</p><p><b>美图自产手机的绝唱</b></p><p>其实，关于小米与美图手机的接触，坊间早有耳闻。不过，传闻两者一度谈崩。但最后仍是达成了合作，可见谈判过程的艰辛。</p><p>据美图公司人士透露，美图是由公司CFO颜劲良负责与小米的谈判。颜劲良在2015年加入美图，负责美图整体财务战略以及投资者关系。</p><p>在小米宣布合作事宜的同时，还有一则消息可能会被忽略，就是美图公司的一个预警：2018年将净亏损约9.5亿元至12亿元。</p><p>其实，在传出小米与美图手机接触的同时，美图美妆的电商部门已经全部解散了。“美图手机将是下一次被解散和裁员的部门。”美图相关人士表示。</p><p>根据美图在港交所发出的预警，今年净亏损的主要因素为：智能硬件部分收入的减少。</p><p>美图表示，与2017年相比，今年推出的手机型号较少，2017年推出了5款，而2018年仅推出1款手机，加之2018年手机竞争激烈，大环境处于下降之势，美图手机销量与出货量减少。单价降低的同时，更是导致了利润的减少。因此，美图认为2018年下半年集团大部分的净亏损将来自智能手机业务。</p><p>此次，小米获得美图手机品牌和相关影像技术，以及大部分智能硬件的30年全球独家授权。美图手机将由小米负责生产、销售和推广，美图持续提供影像技术与美颜算法的共同支持。也就是说美图不再做手机了。</p><p>而关于美图的受益：合作期间，美图享有的就合作手机和合作智能硬件的授权收益分成将分为两个阶段：在双方合作第一阶段，自合作手机正式上市起的5年内，美图将获得每台合作手机销售毛利润的10%，直至累计分成金额到达约定的金额，小米公司亦有权选择一次性支付分成费用来补足约定金额。</p><p></p><div class="gg200x300">
                <div class="at_item right_ad_item" adtype="rightAd" requesturl="https://nex.163.com/q?app=7BE0FC82&amp;c=tech&amp;l=133&amp;site=netease&amp;affiliate=tech&amp;cat=article&amp;type=logo300x250&amp;location=12"></div>
                <a href="javascript:;" target="_self" class="ad_hover_href"></a>
            </div><p>一旦达到约定金额后，小米公司若决定继续合作，则双方合作进入第二阶段。第二阶段最长可持续30年，在此期间，美图将继续获得手机销售的分成，并享有每年1000万美元的保底分成收入。</p><p>此外，在合作智能硬件正式销售起的30年内，美图均可获得每台智能硬件销售毛利润的15%。</p><p>美图与小米的合作让业界愈来愈意识到，头部品牌越来越集中，手机行业已经呈现倒金字塔状，中小手机厂商生存唯艰。</p><p>魅族李楠认为：“未来的手机行业会是大集团+副牌的战争，细分市场独立品牌也的确机会不大了。”</p>

        </div>
    </div>
    <div class="article_footer">
        <span class="article_footer_item" style="
border: none;
background: #888;
color: #fff;
">踩</span>
        <span class="article_footer_item" style="
background: #ce3939;
border: none;
color: #fff;
">赞</span>
    </div>
    <style>
        .article_footer{
            position: fixed;
            bottom: 0;
            max-width: 400px;
            width: 100%;
            height: 50px;
            background: #fff;
            border-top: 1px solid #ddd;
            box-sizing: border-box;
            text-align: center;
        }
        .article_footer_item{
            display: inline-block;
            height: 30px;
            line-height: 30px;
            width: 90px;
            text-align: center;
            box-sizing: border-box;
            font-size: 14px;
            border: 1px solid #969696;
            top: 10px;
            position: relative;
            border-radius: 38px;
            margin: 0 8px;
        }
    </style>
    <style>
        .footer{
            background: #2eaf2e;
            line-height: 1.5rem;
            color: #fff;
            padding: 36px 16px;
            margin-top: 20px;
        }
        .footer p{
            margin-bottom: 12px;
        }
    </style>
    <div class="footer">
        <p>极爱网，爱运动，爱科技，爱生活，更爱极爱网。<br>一个以生活为驱动的，电子商务网站。</p>
        <p>Copyright ©2018-2019 极爱网 陕ICP备18006045号-2</p>
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