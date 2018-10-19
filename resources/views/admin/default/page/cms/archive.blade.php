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
                <li class="layui-this">分类管理</li>
                <li>创建分类</li>
            </ul>
            <div class="layui-elem-quote censcms-layout-quote">
                <p>分类管理中，支持点击单元格进行编辑修改</p>
                <p><a style="cursor: pointer; color: #0d6aad" href="/new_article">/new_article</a> 收录您的最新文章</p>
            </div>
            <div class="layui-tab-content censcms-layout-content">
                <div class="layui-tab-item layui-show">
                    <div style="margin-top: 0" class="actionList censng-button-act-box">
                        <div class="layui-btn layui-btn-primary layui-btn-sm archive-toggle-delete">批量删除</div>
                    </div>
                    <div style="display: none;" data-value="hide" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit archive-delete-block" data-anim="layui-anim-upbit">
                        <div class="layui-elem-quote-headtitle">确认要删除分类吗？将同时删除分类内的所有文章。</div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"></label>
                            <div class="layui-input-block">
                                <div class="layui-btn layui-btn-primary layui-btn-sm archive-btn-delete">确认删除</div>
                                <div class="layui-btn layui-btn-primary layui-btn-sm archive-toggle-delete">取消</div>
                            </div>
                        </div>
                    </div>
                    <table class="layui-table" lay-data="{id:'archive_list'}" lay-filter="archive_list">
                        <thead>
                            <tr>
                                <th lay-data="{type:'checkbox'}"></th>
                                <th lay-data="{field:'id',width:100}">ID</th>
                                <th lay-data="{field:'title',width:150,edit:'text'}">分类名称</th>
                                <th lay-data="{field:'alias',width:170,edit:'text'}">别名-推荐英文或拼音</th>
                                <th lay-data="{field:'describe',width:230,edit:'text'}">分类备注</th>
                                <th lay-data="{field:'acticles',width:100}">含文章数目</th>
                                <th lay-data="{field:'running',width:180,edit:'text'}">禁止访问-1允许访问0禁止访问</th>
                                <th lay-data="{field:'src',width:360}">访问地址</th>
                                <th lay-data="{field:'create_at',width:200}">创建时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($archiveArray as $item)
                                <tr>
                                <td></td>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['title']}}</td>
                                <td>{{$item['alias']}}</td>
                                <td>{{$item['describe']}}</td>
                                <td>{{$item['acticles']}}</td>
                                <td>{{$item['running']}}</td>
                                <td title="a">
                                    <span>ID访问：<a style="color: #5FB878" href="/archive/num/{{$item['id']}}">/archive/num/{{$item['id']}}</a></span>
                                    <span>别名访问：<a style="color: #5FB878" href="/archive/{{$item['alias']}}">/archive/{{$item['alias']}}</a></span>
                                </td>
                                <td>{{$item['created_at']}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-tab-item">
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类名称</label>
                        <div class="layui-input-block">
                            <input type="text" placeholder="请输入分类名称" name="archive_title" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类别名</label>
                        <div class="layui-input-block">
                            <input type="text" placeholder="请输入分类别名" name="archive_alias" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类备注</label>
                        <div class="layui-input-block">
                            <input type="text" placeholder="请输入分类描述" name="archive_describe" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类禁止访问</label>
                        <div class="layui-input-block">
                            <select name="archive_running">
                                <option value="1">允许访问</option>
                                <option value="1">禁止访问</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <div class="layui-elem-quote">/archive/{分类ID}是分类的链接地址，但是直接使用ID是不太友好的，所以我们设置了支持/archive/{分类别名}的方式，可让您对分类进行访问</div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <div class="layui-btn archive-btn-create">立即提交</div>
                            <div class="layui-btn layui-btn-primary archive-btn-reset">重置</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    table.init();
    form.render();
    //创建分类
    function createArchive(){
        var title = $("input[name='archive_title']").val();
        var alias = $("input[name='archive_alias']").val();
        var describe = $("input[name='archive_describe']").val();
        var running = $("select[name='archive_running'] option:selected").val();
        //title/alias/describe都是必填项目
        if(title===''||alias===''||describe===''){
            layer.msg('请确认信息是否填写完毕');
            return false;
        }
        http.post('/admin/setting/cms/archive/create',{
            title:title,
            alias:alias,
            describe:describe,
            running: running
        }).then(function (res){
            if(res.msg === 'create success'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('分类创建成功');
                    $("input[name='archive_title']").val('');
                    $("input[name='archive_alias']").val('');
                    $("input[name='archive_describe']").val('');
                    location.reload(true);
                },1000)
            }else if(res.msg === 'create fail'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('分类创建失败');
                },1000)
            }else{
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('分类创建异常');
                },1000)
            }
        });
    }
    //绑定创建分类
    $('.archive-btn-create').bind('click',createArchive);
    //重置创建分类
    function resetCreateArchive(){
        $("input[name='archive_title']").val('');
        $("input[name='archive_alias']").val('');
    }
    $('.archive-btn-reset').bind('click',resetCreateArchive);
    //切换删除分类
    function toggleDelArchive(){
        var dom = $('.archive-delete-block');
        var value = dom.data('value');
        if(value === 'hide'){
            var checkStatus = table.checkStatus('archive_list');
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
    //绑定切换删除
    $('.archive-toggle-delete').bind('click',toggleDelArchive);
    //删除请求
    function delArchive(){
        var checkStatus = table.checkStatus('archive_list');
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
            console.log('您要删除的项是：');
            console.log(temp);
            //通讯进行删除
            http.post('/admin/setting/cms/archive/del',{
                keylist:temp
            }).then(function (res) {
                if(res.msg === 'delete success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('分类删除成功');
                        location.reload(true);
                    },1000)
                }else if(res.msg === 'delete item has fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('分类删除失败');
                    },1000)
                }else if(res.msg === 'delete item not find'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('分类数据未找到');
                    },1000)
                }else
                {
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('分类删除异常，请刷新页面重试');
                    },1000)
                }
            })
        }
    }
    $('.archive-btn-delete').bind('click',delArchive);
    //监听修改
    table.on('edit(archive_list)', function(obj){
        var value = obj.value //得到修改后的值
            ,data = obj.data //得到所在行所有键值
            ,field = obj.field; //得到字段
        http.post('/admin/setting/cms/archive/change',{
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
            }else{
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('数据更新异常，请刷新页面重试');
                },1000)
            }
        })
    });
</script>