@php
    //得到所有的分类
    $obj = new \App\CmsPhotoArchive();
    $objData = $obj -> get();
    if($objData){
        $photo_archiveArray = $objData -> toArray();
    }else{
        $photo_archiveArray = null;
    }
@endphp
<style>

</style>
<div class="layui-anim layui-anim-upbit ">
    <div class="layui-card layui-form">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">图片分类管理</li>
                <li>创建图片分类</li>
            </ul>
            <div class="layui-elem-quote censcms-layout-quote">
                <p>图片分类管理中，支持点击单元格进行编辑修改</p>
            </div>
            <div class="layui-tab-content censcms-layout-content">
                <div class="layui-tab-item layui-show">
                    <div style="margin-top: 0" class="actionList censng-button-act-box">
                        <div class="layui-btn layui-btn-primary layui-btn-sm photo-archive-toggle-delete">批量删除</div>
                    </div>
                    <div style="display: none;" data-value="hide" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit photo_archive-delete-block" data-anim="layui-anim-upbit">
                        <div class="layui-elem-quote-headtitle">确认要删除该图片分类吗？将同时删除分类内的所有图片。</div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"></label>
                            <div class="layui-input-block">
                                <div class="layui-btn layui-btn-primary layui-btn-sm photo-archive-btn-delete">确认删除</div>
                                <div class="layui-btn layui-btn-primary layui-btn-sm photo-archive-toggle-delete">取消</div>
                            </div>
                        </div>
                    </div>
                    <table class="layui-table" lay-data="{id:'photo_archive_list','page':'true'}" lay-filter="photo_archive_list">
                        <thead>
                        <tr>
                            <th lay-data="{type:'checkbox'}"></th>
                            <th lay-data="{field:'id',width:100}">ID</th>
                            <th lay-data="{field:'title',width:150,edit:'text'}">分类名称</th>
                            <th lay-data="{field:'alias',width:170,edit:'text'}">别名-推荐英文或拼音</th>
                            <th lay-data="{field:'describe',width:230,edit:'text'}">分类备注</th>
                            <th lay-data="{field:'photos',width:100}">含图片数目</th>
                            <th lay-data="{field:'running',width:180,edit:'text'}">禁止访问-1允许访问0禁止访问</th>
                            <th lay-data="{field:'create_at',width:200}">创建时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($photo_archiveArray as $item)
                            <tr>
                                <td></td>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['title']}}</td>
                                <td>{{$item['alias']}}</td>
                                <td>{{$item['describe']}}</td>
                                <td>{{$item['photos']}}</td>
                                <td>{{$item['running']}}</td>
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
                            <input type="text" placeholder="请输入图片分类名称" name="photo_archive_title" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类别名</label>
                        <div class="layui-input-block">
                            <input type="text" placeholder="请输入图片分类别名" name="photo_archive_alias" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类备注</label>
                        <div class="layui-input-block">
                            <input type="text" placeholder="请输入图片分类描述" name="photo_archive_describe" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    {{--采用算法，可使异常的图片禁止输出--}}
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否禁止访问</label>
                        <div class="layui-input-block">
                            <select name="photo_archive_running">
                                <option value="1">允许访问</option>
                                <option value="1">禁止访问</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <div class="layui-elem-quote">在此处进行本地的图片管理操作</div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <div class="layui-btn photo-archive-btn-create">立即提交</div>
                            <div class="layui-btn layui-btn-primary photo-archive-btn-reset">重置</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        table.init();
        form.render();
        //创建分类
        function createPhotoArchive(){
            var title = $("input[name='photo_archive_title']").val();
            var alias = $("input[name='photo_archive_alias']").val();
            var describe = $("input[name='photo_archive_describe']").val();
            var running = $("select[name='photo_archive_running'] option:selected").val();
            //title/alias/describe都是必填项目
            if(title===''||alias===''||describe===''){
                layer.msg('请确认信息是否填写完毕');
                return false;
            }
            http.post('/admin/setting/cms/photo/archive/create',{
                title:title,
                alias:alias,
                describe:describe,
                running: running
            }).then(function (res){
                if(res.msg === 'create success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('图片分类创建成功');
                        $("input[name='photo_archive_title']").val('');
                        $("input[name='photo_archive_alias']").val('');
                        $("input[name='photo_archive_describe']").val('');
                        location.reload(true);
                    },1000)
                }else if(res.msg === 'create fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('图片分类创建失败');
                    },1000)
                }else{
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('图片分类创建异常');
                    },1000)
                }
            });
        }
        //绑定创建分类
        $('.photo-archive-btn-create').bind('click',createPhotoArchive);
        //重置创建分类
        function resetCreatePhotoArchive(){
            $("input[name='photo_archive_title']").val('');
            $("input[name='photo_archive_alias']").val('');
        }
        $('.photo-archive-btn-reset').bind('click',resetCreatePhotoArchive);
        //切换删除分类
        function toggleDelPhotoArchive(){
            var dom = $('.photo_archive-delete-block');
            var value = dom.data('value');
            if(value === 'hide'){
                var checkStatus = table.checkStatus('photo_archive_list');
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
        $('.photo-archive-toggle-delete').bind('click',toggleDelPhotoArchive);
        //删除请求
        function delPhotoArchive(){
            var checkStatus = table.checkStatus('photo_archive_list');
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
                http.post('/admin/setting/cms/photo/archive/del',{
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
        $('.photo-archive-btn-delete').bind('click',delPhotoArchive);
        //监听修改
        table.on('edit(photo_archive_list)', function(obj){
            var value = obj.value //得到修改后的值
                ,data = obj.data //得到所在行所有键值
                ,field = obj.field; //得到字段
            http.post('/admin/setting/cms/photo/archive/change',{
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
    })
</script>