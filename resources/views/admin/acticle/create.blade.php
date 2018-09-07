@extends('layouts.app')
@section('content')
    <style>
        .inputTips{
            margin-bottom: 3rem;
            font-size: 1.3rem;
            line-height: 2rem;
            border-left: 2px solid crimson;
            padding-left: 1rem;
            letter-spacing: 2px;
            color: crimson;
            margin-top: 1rem;
            display: none;
        }
        h4{
            margin-bottom: 3rem;
            font-weight: bold;
        }
        .pageContent{
            padding-top: 9rem;
        }
        .selectArchive{
            min-height: 6rem;
            background: rgba(255,255,255,0.86);
            position: relative;
            /*top: -3rem;*/
            border-radius: 3px;
            text-align: center;
            line-height: 6rem;
            width: 20%;
            display: inline-block;
            vertical-align: top;
            margin-bottom: 3rem;
        }
        .selectTitle{
            line-height: 4rem;
            box-sizing: border-box;
            border: 1px solid #e5e5e5;
            border-bottom: none;
        }
        .selectTitle,.setTitle{
            font-size: 1.3rem;
            color: #626262;
        }
        .filter-box{
            line-height: 4rem;
        }
        .setTitleBox{
            display: inline-block;
            vertical-align: top;
            line-height: 4rem;
            position: relative;
            /*top: -3rem;*/
            /*margin-left: 3%;*/
            width: 78%;
            float: right;
        }
        .setTitle{
            line-height: 4rem;
            box-sizing: border-box;
            border: 1px solid #e5e5e5;
            text-align: center;
            background: rgba(255,255,255,0.86);
        }
        .titleInput{
            border: 1px solid #e5e5e5;
            border-top: none;
            width: 100%;
            padding-left: 8px;
            background: #fff;
        }
        .btn-post{
            margin-left: 0!important;
            margin-bottom: 6rem;
            display: inline-block;
            width: 129px !important;
        }
        .btn-pro{
            width: 99px !important;
            margin-left: 3rem !important;
            background: darkseagreen !important;
        }
        .setDescribeBox{
            margin-bottom: 4rem;
        }
        .setDescribeTitle{
            line-height: 3.6rem;
            border: 1px solid #e5e5e5;
            border-bottom: none;
            background: rgba(255,255,255,0.66);
            padding-left: 8px;
            color: #626262;
        }
        .describeInput{
            width: 100%;

            line-height: 3.6rem;

            border: 1px solid #e5e5e5;

            padding-left: 8px;
        }
    </style>
    <div class="pageHeader">
        <h3 class="page-title">@lang('global.menu.article.create.t')</h3>
        <div class="tips">* 在这里您可以进行创建文章。</div>
    </div>
    <div class="pageContent">
        <h4>填写所属分类及标题</h4>
        {{--选择所属档案--}}
        <div class="selectArchive">
            <div class="selectTitle">文章所属分类</div>
            <div class="filter-box">
                <div class="filter-text">
                    <input class="filter-title" type="text" readonly />
                    <i class="icon icon-filter-arrow"></i>
                </div>
                <select name="filter">
                    <option disabled>请选择文章分类</option>
                    <option selected="true" value="def">默认的分类</option>
                    @foreach($archiveList as $item)
                        <option value="{{$item['id']}}">{{$item['archive']}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        {{--设置标题--}}
        <div class="setTitleBox">
            <div class="setTitle">设置文章标题</div>
            <input class="titleInput acticleTitle" type="text">
            <div class="inputTips titleTip"> * 文章标题不能为空</div>
        </div>
        <div style="clear: both"></div>
        <div class="setDescribeBox">
            <div class="setDescribeTitle">设置文章描述(可选)</div>
            <input class="describeInput acticleDescribe" placeholder="默认为文章前30个字符" type="text">
        </div>
        <h4>然后填写内容</h4>
        <div id="editor">
        </div>

        <div class="inputTips postTip"> * 文章标题不能为空</div>
        <div class="btn-post postActicle">提交内容</div>
        <div class="btn-post btn-pro">预览-暂不可用</div>
    </div>
@stop
@section('js')
    <link href="/module/editor/wangEditor.css" rel="stylesheet" />
    <script data-main="./main.js" src="http://cdn.bootcss.com/require.js/2.3.3/require.js"></script>
    <script src="/adminlte/js/pages/acticle.js"></script>
    <script type="text/javascript">
    </script>
@stop