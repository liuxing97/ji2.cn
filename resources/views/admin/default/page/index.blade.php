@php
    $visitNumberObj = new \App\VisitNumber();
    //查询今日统计数据
    $dayTime = mktime(0,0,0,date('m'),date('d'),date('Y'));
    $dayObj = $visitNumberObj -> where('time',$dayTime) -> first();
    if(!$dayObj){
        $dayPv = 0;
        $dayUv = 0;
    }else{
        $dayPv = $dayObj-> pv;
        $dayUv = $dayObj -> uv;
    }
    //查询这周的统计数据
    $weekTime = mktime(0,0,0,date('m'),date('d')-date('w')+1,date('Y'))-1;
    $weekArray = $visitNumberObj -> where('time','>',$weekTime) -> get() -> toArray();
    if($weekArray){
        $weekPv = 0;
        $weekUv = 0;
        //遍历累加
        foreach ($weekArray as $item){
            $weekPv = $weekPv + $item['pv'];
            $weekUv = $weekUv + $item['uv'];
        }
    }else{
        $weekUv = $dayUv;
        $weekPv = $dayPv;
    }
    //查询本月的统计数据
    $mouthTime = strtotime(date('Y-m-d 0:0:0', mktime(0,0,0,date('n'),1,date('Y'))))-1;
    $mouthArray = $visitNumberObj -> where('time','>',$mouthTime) -> get() -> toArray();
    if($mouthArray){
        $mouthUv = 0;
        $mouthPv = 0;
        //遍历累加
        foreach ($mouthArray as $item){
            $mouthPv = $mouthPv + $item['pv'];
            $mouthUv = $mouthUv + $item['uv'];
        }
    }else{
        $mouthUv = $dayUv;
        $mouthPv = $dayPv;
    }
@endphp
<div class="layui-anim layui-anim-upbit">
    <div class="censcms-main-body layui-col-md8">
        {{--<div class="layui-card censcms-note-box">--}}
            {{--<div class="layui-card-header">便签</div>--}}
            {{--<div class="censcms-note-box-list">--}}

            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-card censcms-main-card">
            <div class="layui-card-header">实时访客</div>
            <div class="layui-card-body">
                <table class="layui-table" lay-data="{id:'visit_numbers'}" lay-filter="visit_numbers">
                    <thead>
                    <tr>
                        <th lay-data="{field:'id', width:120}">今日访客(UV)</th>
                        <th lay-data="{field:'username',width:160}">今日页面浏览量(PV)</th>
                        <th lay-data="{field:'sex', width:100}">本周UV</th>
                        <th lay-data="{field:'city',width:100}">本周PV</th>
                        <th lay-data="{field:'sign',width:100}">本月UV</th>
                        <th lay-data="{field:'experience'}">本月PV</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$dayUv}}</td>
                            <td>{{$dayPv}}</td>
                            <td>{{$weekUv}}</td>
                            <td>{{$weekPv}}</td>
                            <td>{{$mouthUv}}</td>
                            <td>{{$mouthPv}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--侧边栏--}}
    <div class="censcms-side-body layui-col-md4 layui-col-sm12">
        <div class="layui-card censcms-main-card">
            <style>
                .censcms-index-shortcutList{

                }
                .censcms-index-shortcutList a{
                    display: inline-block;

                    margin-right: 10px;

                    color: #5582BD;
                }
                .censcms-index-shortcutList .item{

                }
            </style>
            <div class="layui-card-header">快捷入口</div>
            <div class="layui-card-body">
                <div class="censcms-index-shortcutList">
                    <a href="#/cms/archive"><div class="item">分类管理</div></a>
                    <a href="#/cms/article"><div class="item">文章管理</div></a>
                </div>
            </div>
        </div>
        <div class="layui-card censcms-main-card">
            <div class="layui-card-header">官方公告</div>
            <div style="color:#935656" class="layui-card-body">
                本系统未经授权，禁止传播，法律必究！
            </div>
        </div>
        <div class="layui-card censcms-main-card">
            <div class="layui-card-header">系统情况</div>
            <div style="color:#9a9a9a" class="layui-card-body">
                <p>当前时间：{{date('Y-m-d H:i:s')}}</p>
                <p>系统版本：alpha 1.0</p>
                <p>开发语言：PHP、HTML等……</p>
                <p>开发单位：西安辰象的象网络科技有限公司</p>
            </div>
        </div>
    </div>
</div>{{--主面板--}}
<script>
    table.init();
</script>
