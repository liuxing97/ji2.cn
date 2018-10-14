@php
$sitedataObj = new \App\Sitedata();
$sitedataObj = $sitedataObj -> all();
if($sitedataObj){
$sitedata = $sitedataObj -> toArray();
}else{
$sitedata = null;
}
@endphp
<style>
    .layui-form-checkbox[lay-skin="primary"]{
        padding: 0;
    }

</style>
<div class="layui-anim layui-anim-upbit ">
        <div class="layui-card layui-form">
            <div class="layui-card-body censcms-layout-content">
                <div class="layui-elem-quote">支持点击单元格进行编辑修改</div>
                {{--数据操作按钮--}}
                <div class="censng-button-act-box">
                    <div class="layui-btn layui-btn-sm layui-btn-primary dataset-toggle-create">新增</div>
                    <div class="layui-btn layui-btn-sm layui-btn-primary dataset-toggle-delete">批量删除</div>
                </div>
                {{--新建操作区域--}}
                <div style="display: none;" data-value="hide" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit dataset-create-block" data-anim="layui-anim-upbit">
                    <div class="layui-elem-quote-headtitle">是要新建记录吗？</div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">KEY值</label>
                        <div class="layui-input-block">
                            <input name="new_key" placeholder="请输入KEY值" autocomplete="off" class="layui-input" type="text">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">描述</label>
                        <div class="layui-input-block">
                            <input name="new_describe" placeholder="请输入描述" autocomplete="off" class="layui-input" type="text">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">值</label>
                        <div class="layui-input-block">
                            <input name="new_value" placeholder="请输入值" autocomplete="off" class="layui-input" type="text">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <div class="layui-btn layui-btn-primary layui-btn-sm dataset-btn-create">提交</div>
                            <div class="layui-btn layui-btn-primary layui-btn-sm dataset-toggle-create">取消</div>
                        </div>
                    </div>
                </div>
                <div style="display: none;" data-value="hide" class="layui-elem-quote layui-elem-quote-block dataset-delete-block layui-anim layui-anim-upbit" data-anim="layui-anim-upbit">
                    <div class="layui-elem-quote-headtitle">确认要删除记录吗？可能会导致系统异常！（ID号1至500的记录受系统保护，禁止删除）</div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <div class="layui-btn layui-btn-primary layui-btn-sm dataset-btn-delete">确认删除</div>
                            <div class="layui-btn layui-btn-primary layui-btn-sm dataset-toggle-delete">取消</div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <table class="layui-table" lay-data="{id:'sitedata'}" lay-filter="sitedata">
                        <colgroup>
                            <col>
                            <col>
                            <col width="150">
                            <col width="200">
                            <col>
                            <col width="170">
                        </colgroup>
                        <thead>
                        <tr>
                            <th lay-data="{type:'checkbox'}"></th>
                            <th lay-data="{field:'id',width:60}">ID</th>
                            <th lay-data="{field:'key', width:200, edit: 'text'}">KEY</th>
                            <th lay-data="{field:'describe', width:180, edit: 'text'}">描述</th>
                            <th lay-data="{field:'value', edit: 'text', minWidth: 400}">值</th>
                            <th lay-data="{field:'time', width:180}">时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$sitedata)
                            @else
                            @foreach($sitedata as $item)
                                <tr>
                                    <td class="layui-input-block">
                                        <input name="" lay-skin="primary" type="checkbox">
                                    </td>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['key']}}</td>
                                    <td>{{$item['describe']}}</td>
                                    <td>{{$item['value']}}</td>
                                    <td>{{$item['created_at']}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<script>
    layui.use('table', function(){
        var table = layui.table;
        table.init();
        table.on('edit(sitedata)', function(obj){
            var value = obj.value //得到修改后的值
                ,data = obj.data //得到所在行所有键值
                ,field = obj.field; //得到字段
            http.post('/admin/setting/sitedata/change',{
                'id':data.id,
                'key':field,
                'value':value
            }).then(function (res) {
                if(res.msg === 'change success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('数据更新成功');
                    },1000)
                }else if(res.msg === 'change fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('数据更新失败');
                    },1000)
                }else if(res.msg === 'protected item'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('ID自1-500为受保护的字段，不允许更改KEY名称与描述');
                        location.reload(true);
                    },1000)
                }else{
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('数据更新异常，请刷新页面重试');
                    },1000)
                }
            })
        });
    });
    //绑定新建
    function createToggle() {
        var dom = $('.dataset-create-block');
        var value = dom.data('value');
        if(value === 'hide'){
            dom.data('value','show');
            dom.show();
        }else{
            dom.data('value','hide');
            dom.hide();
        }
    }
    function handleCreate(){
        //得到值
        var key = $("input[name='new_key']").val();
        var describe = $("input[name='new_describe']").val();
        var value = $("input[name='new_value']").val();
        if(key === '' || describe ==='' || value === ''){
            layer.msg('请检查填写，值不允许为空字符串');
            return false;
        }
        http.post('/admin/setting/sitedata/create',{
            key:key,
            describe:describe,
            value:value
        }).then(function (res) {
            if(res.msg === 'create success'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据创建成功');
                    $("input[name='new_key']").val('');
                    $("input[name='new_describe']").val('');
                    $("input[name='new_value']").val('');
                    location.reload(true);
                },1000)
            }else if(res.msg === 'create fail'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据创建失败');
                },1000)
            }else if(res.msg === 'key has created'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据关键字已存在');
                },1000)
            }else{
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据创建异常，请刷新页面重试');
                },1000)
            }
        })
    }
    //绑定面板切换按钮按钮
    $('.dataset-toggle-create').bind('click',createToggle);
    //绑定新建记录按钮
    $('.dataset-btn-create').bind('click',handleCreate);

    //批量删除
    function delData(){
        var checkStatus = table.checkStatus('sitedata'); //test即为基础参数id对应的值
        var data = checkStatus.data; //获取选中行的数据
        console.log(checkStatus);
        var temp = [];
        for(var t = 0; t < data.length; t++){
            var id = data[t].id;
            temp.push(id);
        }
        if(temp.length == 0){
            layer.msg('请选择删除项');
            return false;
        }
        http.post('/admin/setting/sitedata/del',{
            keylist:temp
        }).then(function (res) {
            if(res.msg === 'delete success'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据删除成功');
                    location.reload(true);
                },1000)
            }else if(res.msg === 'delete item has fail'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据删除失败');
                },1000)
            }else if(res.msg === 'delete item not find'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('其中有数据未找到');
                },1000)
            }else if(res.msg === 'protected item') {
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('ID自1-500为受保护的字段，禁止删除');
                },1000)
            }else
            {
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据删除异常，请刷新页面重试');
                },1000)
            }
        })
    }
    //批量删除切换
    function delToggle() {
        var dom = $('.dataset-delete-block');
        var value = dom.data('value');
        if(value === 'hide'){
            var checkStatus = table.checkStatus('sitedata');
            var data = checkStatus.data; //获取选中行的数据
            console.log(checkStatus);
            var temp = [];
            for(var t = 0; t < data.length; t++){
                var id = data[t].id;
                temp.push(id);
            }
            if(temp.length === 0){
                layer.msg('请选择删除项');
                return false;
            }else{
                dom.data('value','show');
                dom.show();
            }
        }else{
            dom.data('value','hide');
            dom.hide();
        }
    }
    //绑定批量删除
    $('.dataset-btn-delete').bind('click',delData);
    //删除切换
    $('.dataset-toggle-delete').bind('click',delToggle);

</script>