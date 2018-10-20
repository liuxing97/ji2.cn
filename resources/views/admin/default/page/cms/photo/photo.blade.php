@php
    //得到所有的分类
    $obj = new \App\CmsArchive();
    $objData = $obj -> get();
    if($objData){
        $archiveArray = $objData -> toArray();
    }else{
        $archiveArray = null;
    }
@endphp
<style>

</style>
<div class="layui-anim layui-anim-upbit ">
    <div class="layui-card layui-form">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">所有图片</li>
                <li>创建图片</li>
            </ul>
            <div class="layui-elem-quote censcms-layout-quote">
                <p>在此管理您的图片</p>
            </div>
            <div class="layui-tab-content censcms-layout-content">
                <div class="layui-tab-item layui-show">
                    {{--所有图片--}}
                    {{--选择分类，在此进行显示当前分类下的图片--}}
                </div>
                <div class="layui-tab-item">
                    {{--新建图片--}}
                    {{--如何新建？--}}
                    {{--使用layUI进行异步上传图片，--}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        table.init();
        form.render();
    })
</script>