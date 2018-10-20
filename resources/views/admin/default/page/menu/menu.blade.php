@php
    $menuGroupObj = new \App\Menu();
    $menuGroupObj = $menuGroupObj -> orderBy('main','desc') -> get();
    if($menuGroupObj){
        $menuGroups = $menuGroupObj -> toArray();
    }else{
        $menuGroups = [];
    }

    //dump($menuArray);
    //加载要加载的菜单内容
@endphp
<style>
    .menuDataSet .layui-elem-quote-tips{
        margin-top: 1.2rem;
    }
</style>
<div class="menuDataSet layui-anim layui-anim-upbit">
    <div class="layui-card layui-form">
        <div class="">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                <ul class="layui-tab-title">
                    <li class="layui-this">菜单列表</li>
                    <li>菜单分组</li>
                </ul>
                <div class="layui-elem-quote layui-elem-quote-tips">支持点击单元格进行编辑修改，注意：多级菜单中'none'代表其是一级菜单</div>
                <div class="layui-tab-content censcms-layout-content">
                    <div class="layui-tab-item layui-show">
                        <div style="margin-top: 0" class="actionList censng-button-act-box">
                            <div class="layui-btn layui-btn-primary layui-btn-sm menu-item-toggle-create">新增</div>
                            <div class="layui-btn layui-btn-primary layui-btn-sm menu-item-toggle-delete">批量删除</div>
                        </div>
                        <div data-value="hide" style="display: none;margin-top: 1rem" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit menu-item-create-block" data-anim="layui-anim-upbit">
                            <div class="layui-elem-quote-headtitle">要为这组菜单新建项吗？</div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">菜单名称</label>
                                <div class="layui-input-block">
                                    <input name="create_menu_item_title" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" type="text">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">菜单链接</label>
                                <div class="layui-input-block">
                                    <input name="create_menu_item_href" placeholder="请输入菜单链接" autocomplete="off" class="layui-input" type="text">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">所属菜单</label>
                                <div class="layui-input-block">
                                    <select name="create_menu_item_parent" lay-filter="create_menu_item_parent">
                                        {{--遍历所有的菜单,默认为空--}}
                                        <option value="none">一级菜单</option>
                                        @foreach($menuItemsArray as $item)
                                            <option value="{{$item['id']}}">{{$item['title']}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">是否可用</label>
                                <div class="layui-input-block">
                                    <select name="create_menu_item_running" lay-filter="create_menu_item_parent">
                                        <option value="1">可用</option>
                                        <option value="0">禁用</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">新窗口打开</label>
                                <div class="layui-input-block">
                                    <select name="create_menu_item_target" lay-filter="create_menu_item_target">
                                        <option value="0">否</option>
                                        <option value="1">是</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-item-btn-create">提交</div>
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-item-toggle-create">取消</div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;" data-value="hide" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit menu-item-delete-block" data-anim="layui-anim-upbit">
                            <div class="layui-elem-quote-headtitle">确认要删除菜单项吗？可能会导致系统异常！（请确认您要删除的菜单项没有被使用）</div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-item-btn-delete">确认删除</div>
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-item-toggle-delete">取消</div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item censcms-layui-select">
                            <select name="menu_group_select" lay-filter="menu_group_select">
                                {{--默认选择的为头一个主菜单--}}
                                {{--如果选择了主菜单--}}
                                @if($menuArray)
                                    <option value="{{$menuArray['id']}}">{{$menuArray['title']}}</option>
                                    @else
                                    @endif
                                @if($menuGroups)
                                    @foreach($menuGroups as $groupItem)
                                        {{--需要剔除掉已选择的菜单--}}
                                        @if($groupItem['id'] == $menuArray['id'])
                                            @else
                                            <option value="{{$groupItem['id']}}">{{$groupItem['title']}}</option>
                                            @endif
                                        @endforeach
                                    @else
                                    <option value="none">请选择菜单组</option>
                                    @endif

                            </select>
                        </div>
                        <table class="layui-table" lay-data="{id:'menu_group_item','page':'true'}" lay-filter="menu_group_item">
                            <colgroup>
                                <col>
                                <col>
                                <col>
                                <col>
                                <col>
                                <col>
                                <col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th lay-data="{type:'checkbox'}"></th>
                                <th lay-data="{field:'id',width:100}">ID</th>
                                <th lay-data="{field:'title', width:130, edit: 'text'}">名称</th>
                                <th lay-data="{field:'href', edit: 'text'}">链接</th>
                                <th lay-data="{field:'parent', edit: 'text', width: 100}">父级ID</th>
                                <th lay-data="{field:'running',edit:'text', width:150}">状态(1可用,0禁用)</th>
                                <th lay-data="{field:'target',edit:'text', width:180}">新窗口打开（1是，0否）</th>
                                <th lay-data="{field:'create_at', width:180}">创建时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menuItemsArray as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['title']}}</td>
                                    <td>{{$item['href']}}</td>
                                    <td>{{$item['parent']}}</td>
                                    <td>{{$item['running']}}</td>
                                    <td>{{$item['target']}}</td>
                                    <td>{{$item['created_at']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="layui-tab-item">
                        <div style="margin-top: 0" class="actionList censng-button-act-box">
                            <div class="layui-btn layui-btn-primary layui-btn-sm menu-group-toggle-create">新增</div>
                            <div class="layui-btn layui-btn-primary layui-btn-sm menu-group-toggle-delete">批量删除</div>
                        </div>
                        <div data-value="hide" style="display: none;margin-top: 1rem" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit menu-group-create-block" data-anim="layui-anim-upbit">
                            <div class="layui-elem-quote-headtitle">是要新建菜单组吗？</div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">名称值</label>
                                <div class="layui-input-block">
                                    <input name="new_group_title" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" type="text">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">标识值</label>
                                <div class="layui-input-block">
                                    <input name="new_group_key" placeholder="请输入标识值" autocomplete="off" class="layui-input" type="text">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">是否主菜单</label>
                                <div class="layui-input-block">
                                    <input name="new_group_main" placeholder="默认为0（否）,1代表是主菜单" autocomplete="off" class="layui-input" type="text">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-group-btn-create">提交</div>
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-group-toggle-create">取消</div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;" data-value="hide" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit menu-group-delete-block" data-anim="layui-anim-upbit">
                            <div class="layui-elem-quote-headtitle">确认要删除菜单吗？可能会导致系统异常！（请确认您要删除的菜单没有被使用）</div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-group-btn-delete">确认删除</div>
                                    <div class="layui-btn layui-btn-primary layui-btn-sm menu-group-toggle-delete">取消</div>
                                </div>
                            </div>
                        </div>
                        <table class="layui-table" lay-data="{id:'menu_group','page':'true'}" lay-filter="menu_group">
                            <colgroup>
                                <col>
                                <col>
                                <col>
                                <col>
                                <col>
                                <col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th lay-data="{type:'checkbox'}"></th>
                                <th lay-data="{field:'id',width:200}">ID</th>
                                <th lay-data="{field:'title', width:200, edit: 'text'}">名称</th>
                                <th lay-data="{field:'key', edit: 'text'}">标识</th>
                                <th lay-data="{field:'main', edit: 'text', width: 200}">是否是主菜单(1是0否)</th>
                                <th lay-data="{field:'time', width:200}">创建时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menuGroups as $menuGroup)
                                <tr>
                                    <td></td>
                                    <td>{{$menuGroup['id']}}</td>
                                    <td>{{$menuGroup['title']}}</td>
                                    <td>{{$menuGroup['key']}}</td>
                                    <td>{{$menuGroup['main']}}</td>
                                    <td>{{$menuGroup['created_at']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function (){
        table.init();
        form.render('select')
        //切换新建菜单
        function toggleCreateGroup() {
            var dom = $('.menu-group-create-block');
            var value = dom.data('value');
            if(value === 'hide'){
                dom.data('value','show');
                dom.show();
            }else{
                dom.data('value','hide');
                dom.hide();
            }
        }
        //绑定切换
        $('.menu-group-toggle-create').bind('click',toggleCreateGroup);
        //新建菜单操作
        function createGroup() {
            var title = $("input[name='new_group_title']").val();
            var key = $("input[name='new_group_key']").val();
            var main = $("input[name='new_group_main']").val();
            if(title === '' || key === '' || main ===''){
                layer.msg('请将表单填写完整');
                return false;
            }
            if(main !== '1' && main !== '0'){
                layer.msg('请检查您输入的内容');
                return false;
            }
            http.post('/admin/setting/menu/group/create',{
                title:title,
                key:key,
                main:main
            }).then(function (res) {
                if(res.msg === 'create success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('创建菜单组成功');
                        $("input[name='new_group_title']").val('');
                        $("input[name='new_group_key']").val('');
                        $("input[name='new_group_main']").val('');
                        location.reload(true);
                    },1000)
                }else if(res.msg === 'create fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('创建菜单组失败');
                    },1000)
                }else if(res.msg === 'key is used'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('创建菜单组失败，标识已被使用');
                    },1000)
                }else{
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('创建菜单组出现异常');
                    },1000)
                }
            })
        }
        //绑定提交
        $('.menu-group-btn-create').bind('click',createGroup);
        //批量删除内容界面
        function toggleDeleteGroup() {
            var dom = $('.menu-group-delete-block');
            var value = dom.data('value');
            if(value === 'hide'){
                var checkStatus = table.checkStatus('menu_group');
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
        //绑定批量删除内容界面
        $('.menu-group-toggle-delete').bind('click',toggleDeleteGroup);
        //批量删除内容
        function delMenuGroup(){
            var checkStatus = table.checkStatus('menu_group');
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
                http.post('/admin/setting/menu/group/del',{
                    keylist:temp
                }).then(function (res) {
                    if(res.msg === 'delete success'){
                        setTimeout(function () {
                            layer.close(layer.index);
                            layer.msg('菜单删除成功');
                            location.reload(true);
                        },1000)
                    }else if(res.msg === 'delete item has fail'){
                        setTimeout(function () {
                            layer.close(layer.index);
                            layer.msg('菜单删除失败');
                        },1000)
                    }else if(res.msg === 'delete item not find'){
                        setTimeout(function () {
                            layer.close(layer.index);
                            layer.msg('菜单数据未找到');
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
        }
        //绑定删除
        $('.menu-group-btn-delete').bind('click',delMenuGroup);
        //绑定修改
        table.on('edit(menu_group)', function(obj){
            var value = obj.value //得到修改后的值
                ,data = obj.data //得到所在行所有键值
                ,field = obj.field; //得到字段
            http.post('/admin/setting/menu/group/change',{
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
        //监听下拉
        form.on('select(menu_group_select)',function (data) {
            console.log(data);
            var menuId = data.value;
            var url = '/admin/default/route'+'/menu';
            console.log("要开始请求了")
            //开始请求
            http.getPage(url,{
                menuId: menuId
            }).then(function (res) {
                //处理结果
                console.log(res);
                $('#page-main').html(res);
            }).catch(function (res) {
                $('#page-main').html('找不到页面');
            });
        });
        //切换新建菜单项
        function toggleCreateItem(){
            var dom = $('.menu-item-create-block');
            var value = dom.data('value');
            if(value === 'hide'){
                dom.data('value','show');
                dom.show();
            }else{
                dom.data('value','hide');
                dom.hide();
            }
        }
        //绑定切换新建菜单项
        $('.menu-item-toggle-create').bind('click',toggleCreateItem);
        //新建菜单
        function createItem(){
            var title = $("input[name='create_menu_item_title']").val();
            var href = $("input[name='create_menu_item_href']").val();
            var parent = $("select[name='create_menu_item_parent'] option:selected").val();
            var running = $("select[name='create_menu_item_running'] option:selected").val();
            var group = $("select[name='menu_group_select'] option:selected").val();
            var target = $("select[name='create_menu_item_target'] option:selected").val();
            http.post('/admin/setting/menu/item/create',{
                'title':title,
                'href':href,
                'parent':parent,
                'group':group,
                'running':running,
                'target': target
            }).then(function (res) {
                if(res.msg === 'create success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('数据更新成功');
                        $("input[name='create_menu_item_title']").val('');
                        $("input[name='create_menu_item_href']").val('');
                        location.reload(true);
                    },1000)
                }else if(res.msg === 'create fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('数据更新失败');
                    },1000)
                }else{
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('数据更新异常');
                    },1000)
                }
            });
        }
        //绑定新建菜单项提交
        $('.menu-item-btn-create').bind('click',createItem);
        //监听菜单项更改
        table.on('edit(menu_group_item)', function(obj){
            var value = obj.value //得到修改后的值
                ,data = obj.data //得到所在行所有键值
                ,field = obj.field; //得到字段
            http.post('/admin/setting/menu/item/change',{
                'id':data.id,
                'key':field,
                'value':value
            }).then(function (res) {
                if(res.msg === 'change success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('菜单项更新成功');
                    },1000)
                }else if(res.msg === 'change fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('菜单项更新失败');
                    },1000)
                }else{
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('菜单项更新异常，请刷新页面重试');
                    },1000)
                }
            })
        });
        //切换批量删除菜单项
        function toggleDeleteGroupItem(){
            var dom = $('.menu-item-delete-block');
            var value = dom.data('value');
            if(value === 'hide'){
                var checkStatus = table.checkStatus('menu_group_item');
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
        //绑定切换批量删除
        $('.menu-item-toggle-delete').bind('click',toggleDeleteGroupItem);
        //批量删除菜单组
        function delGroupItem(){
            var checkStatus = table.checkStatus('menu_group_item');
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
                http.post('/admin/setting/menu/item/del',{
                    keylist:temp
                }).then(function (res) {
                    if(res.msg === 'delete success'){
                        setTimeout(function () {
                            layer.close(layer.index);
                            layer.msg('菜单删除成功');
                            location.reload(true);
                        },1000)
                    }else if(res.msg === 'delete item has fail'){
                        setTimeout(function () {
                            layer.close(layer.index);
                            layer.msg('菜单删除失败');
                        },1000)
                    }else if(res.msg === 'delete item not find'){
                        setTimeout(function () {
                            layer.close(layer.index);
                            layer.msg('菜单数据未找到');
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
        }
        //绑定删除
        $('.menu-item-btn-delete').bind('click',delGroupItem);
    })
</script>