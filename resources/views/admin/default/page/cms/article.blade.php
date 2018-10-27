<div class="layui-anim layui-anim-upbit">
    <div class="layui-card layui-form">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">文章列表</li>
                <li>创建文章</li>
            </ul>
            <div class="layui-tab-content censcms-layout-content">
                <div class="layui-tab-item layui-show">
                    {{--文章所属的分类--}}
                    <div class="layui-form-item censcms-layui-select">
                        <select name="archive_page_select" lay-filter="archive_page_select">
                            {{--判断是否存在任何分类--}}
                            @if($archiveListArray)
                                {{--输出当前访问的分类--}}
                                <option value="{{$thisArchiveArray['id']}}">{{$thisArchiveArray['title']}}(ID:{{$thisArchiveArray['id']}})</option>

                                @foreach($archiveListArray as $item)
                                    @if($thisArchiveArray['id'] != $item['id'])
                                        <option value="{{$item['id']}}">{{$item['title']}}(ID:{{$item['id']}})</option>
                                        @endif
                                @endforeach
                            @else
                                <option value="none">未找到分类，请先创建</option>
                            @endif
                        </select>
                    </div>
                    {{--操作--}}
                    <div style="margin-top: 0" class="actionList censng-button-act-box">
                        <div class="layui-btn layui-btn-primary layui-btn-sm article-toggle-delete">批量删除</div>
                    </div>
                    <div style="display: none;" data-value="hide" class="layui-elem-quote layui-elem-quote-block layui-anim layui-anim-upbit article-delete-block" data-anim="layui-anim-upbit">
                        <div class="layui-elem-quote-headtitle">确认要删除文章吗？</div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"></label>
                            <div class="layui-input-block">
                                <div class="layui-btn layui-btn-primary layui-btn-sm article-btn-delete">确认删除</div>
                                <div class="layui-btn layui-btn-primary layui-btn-sm article-toggle-delete">取消</div>
                            </div>
                        </div>
                    </div>
                    {{--文章列表,layui中的table 必须有lay-data的id配置才可以对于复选框生效--}}
                    <table class="layui-table censcms-article-list" lay-data="{id:'article_list',page:true,limit:10}" lay-filter="article_list">
                        <thead>
                            <tr>
                                <th lay-data="{type:'checkbox'}"></th>
                                <th lay-data="{field:'id',width:100}">ID</th>
                                <th lay-data="{field:'title',width:260,edit:'text'}">文章标题</th>
                                <th lay-data="{field:'archive',width:130,edit:'text'}">所属分类（ID）</th>
                                <th lay-data="{field:'describe',width:360,edit:'text'}">文章描述(最长60位)</th>
                                <th lay-data="{field:'read',width:80}">阅读</th>
                                <th lay-data="{field:'edit',width:80}">编辑文章</th>
                                <th lay-data="{field:'state',width:170,edit:'text'}">状态-1公开-0隐藏</th>
                                <th lay-data="{field:'created_at',width:200}">创建时间</th>
                                <th lay-data="{field:'updated_at',width:200}">修改时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articlesArray as $article)
                            <tr>
                                <td></td>
                                <td>{{$article['id']}}</td>
                                <td>{{$article['title']}}</td>
                                <td>{{$article['archive']}}</td>
                                <td>{{$article['describe']}}</td>
                                <td><a title="点击阅读" style="color: #5FB878" target="_blank" href="/article/{{$article['id']}}">点击阅读</a></td>
                                {{--当点击编辑时，弹出浮动框，--}}
                                <td><a onclick="articleEdit({{$article['id']}})" title="点击编辑" style="color: #cc1212; cursor: pointer">点击编辑</a></td>
                                <td>{{$article['state']}}</td>
                                <td>{{$article['created_at']}}</td>
                                <td>{{$article['updated_at']}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="layui-tab-item">
                    <ul class="layui-timeline">
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-form-item" style="margin-top: 3rem">
                                    <h3 class="layui-timeline-title" style="margin-bottom: 2rem">创建文章，为哪个分类创建文章(必选*)</h3>
                                    <div class="layui-form-label">选择分类</div>
                                    <div class="layui-input-block">
                                        <select name="article-create-select-archive" lay-verify="">
                                            @if($archiveListArray)
                                                <option value="none">请选择分类</option>
                                                @foreach($archiveListArray as $item)
                                                    @if($item['id'] != 'all')
                                                        <option value="{{$item['id']}}">{{$item['title']}}</option>
                                                        @endif
                                                @endforeach
                                                @else
                                                <option value="none">未找到分类，请先创建</option>
                                                @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-form-item">
                                    <div class="layui-timeline-title" style="margin-bottom: 2rem">禁止公开访问这个文章吗？（*）</div>
                                    <div class="layui-form-label">禁止访问</div>
                                    <div class="layui-input-block">
                                        <select name="article-create-select-state" lay-verify="">
                                            <option value="1">公开访问</option>
                                            <option value="0">禁止访问</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-form-item">
                                    <div class="layui-timeline-title" style="margin-bottom: 2rem">请输入文章标题（*）</div>
                                    <div class="layui-form-label">文章标题</div>
                                    <div class="layui-input-block">
                                        <input name="article-create-title" class="layui-input" type="text">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-form-item">
                                    <div class="layui-timeline-title" style="margin-bottom: 2rem">请输入文章描述，如不设置，默认对文章进行60位字符截取，作为描述文字</div>
                                    <div class="layui-form-label">文章描述</div>
                                    <div class="layui-input-block">
                                        <input name="article-create-describe" class="layui-input" type="text">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-timeline-title">开始填写正文</div>
                            </div>
                        </li>
                    </ul>
                    <div class="layui-form-item" style="">
                        <div class="layui-elem-quote">请在这里输入内容，可以插入网络图片等，为文章加入各种效果……</div>
                        <div id="editor">
                        </div>
                    </div>
                    <div class="">
                        <div class="layui-btn article-btn-create">立即提交</div>
                        <div class="layui-btn layui-btn-disabled">预览</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .censcms-header,.censcms-sidebar{
        z-index: 1!important;
    }
    #articleEditBox{
        background: #fff;
        width: 100%;
        height: 100%;
        display: none;
        z-index: 999;
        position: fixed;
        top:0;
        left: 0;
        background: rgba(0,0,0,0.86);
    }
    #articleEdit{
        position: fixed;
        left: 0;
        right: 0;
        margin-top: 80px;
        width: 888px;
        height: 500px;
        margin-right: auto;
        margin-left: auto;
        background: #fff;
        padding: 50px 20px 30px 20px;
        box-sizing: border-box;
        border-radius: 16px;
    }
    #articleEdit .layui-form-label{
        font-weight: bold;
        color: #6a6a6a;
    }
    .articleEditMain{
        width: 100%;
        height: 100%;
        overflow: auto;
        box-sizing: border-box;
        padding-right: 50px;
    }
    .articleEditTitle{
        position: absolute;
        top: 0;
        left: 0;
        line-height: 50px;
        font-size: 14px;
        font-weight: bold;
        color: #6a6a6a;
        height: 50px;
        padding: 0 20px;
    }
    .layui-form-select dl{
        z-index: 10002;
    }
    .edit_article_icon{
        display: table
    }
    .edit_article_icon_main{
        width: 200px;
        height: 200px;
        display: table-cell;
        border: 1px solid #e5e5e5;
        vertical-align: middle;
        text-align: center;
        background: rgba(206, 206, 206, 0.2);
        padding: 20px;
        box-sizing: border-box;
    }
    .edit_article_icon_main img{
        max-width: 100%;
        max-height: 100%;
    }
</style>
<div id="articleEditBox">
    <div id="articleEdit" class="layui-form" lay-filter="layui-form-edit">
        <div class="articleEditTitle"><i style="margin-right: 8px" class="layui-icon layui-icon-face-smile"></i>编辑文章，正在编辑：<span class="edit-article-this-title"></span></div>
        <div class="articleEditMain">
            <div style="margin-top: 30px" class="layui-form-item">
                <label class="layui-form-label">文章封面</label>
                <div class="layui-input-block">
                    <div class="edit_article_icon">
                        <div class="edit_article_icon_main">

                        </div>
                    </div>
                </div>
            </div>
            <div style="" class="layui-form-item">
                <label class="layui-form-label">文章名称</label>
                <div class="layui-input-block">
                    <input name="edit-article-title" placeholder="请输入文章名称" autocomplete="off" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章分类</label>
                <div class="layui-input-block">
                    <div class="censcms-layui-select">
                        <select class="edit-article-archive" name="edit-article-archive" lay-filter="edit-article-archive">
                            {{--判断是否存在任何分类--}}
                            @if($archiveListArray)
                                {{--输出当前访问的分类--}}
                                <option value="{{$thisArchiveArray['id']}}">{{$thisArchiveArray['title']}}(ID:{{$thisArchiveArray['id']}})</option>

                                @foreach($archiveListArray as $item)
                                    @if($thisArchiveArray['id'] != $item['id'])
                                        <option value="{{$item['id']}}">{{$item['title']}}(ID:{{$item['id']}})</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="none">未找到分类，请先创建</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div style="" class="layui-form-item">
                <label class="layui-form-label">文章图标</label>
                <div class="layui-input-block">
                    <input class="layui-input" name="edit-article-icon" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" type="text">
                </div>
            </div>
            <div style="" class="layui-form-item">
                <label class="layui-form-label">文章描述</label>
                <div class="layui-input-block">
                    <input class="layui-input" name="edit-article-describe" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" type="text">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章内容</label>
                <div class="layui-input-block">
                    <div class="layui-elem-quote">编辑框内修改内容，可插入图片等，具体请查看工具框内提供的工具……</div>
                    <div id="editEditor">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">确认修改</label>
                <div class="layui-input-block">
                    <div style="margin-bottom: 80px" class="">
                        <div onclick="articleEditPost()" class="layui-btn article-btn-edit-post">确认</div>
                        <div onclick="$('#articleEditBox').hide();" class="layui-btn layui-btn-edit-primary">取消</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var editor = undefined;
    var editEditor = undefined;
$(document).ready(function (){
    form.render();
    table.init();
    //获取方法editor.txt.html()
    require(['/module/editor/wangEditor.js'], function (E) {
        editor = new E('#editor');
        editor.create();
        editEditor = new E('#editEditor');
        editEditor.create();
        //绑定点击插入链接
        $(editor.$toolbarElem[0].children[9]).on('click',listenLink);
    });
    //新建文章
    function createArticle(){
        var archive = $("select[name='article-create-select-archive'] option:selected").val();
        var title = $("input[name='article-create-title']").val();
        var describe = $("input[name='article-create-describe']").val();
        var content = editor.txt.html();
        if(describe === ''){
            describe = editor.txt.text();
            //如果内容也为空
            if(describe === ''){
                describe = "作者很懒，没有留下任何描述哦~"
            }
            else{
                //截取前60位
                describe = describe.substr(0,60);
            }
        }
        var state = $("select[name='article-create-select-state'] option:selected").val();
        if(archive === 'none'){
            layer.msg('请选择文章所属分类');
            return false;
        }
        if(title === ''){
            layer.msg('请填写文章标题');
            return false;
        }
        http.post('/admin/setting/cms/article/create',{
            archive:archive,
            title:title,
            describe:describe,
            content: content,
            state: state
        }).then(function (res){
            if(res.msg === 'create success'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('文章创建成功');
                    $("input[name='article-create-title']").val('');
                    $("input[name='article-create-describe']").val('');
                    location.reload(true);
                },1000);
            }else if(res.msg === 'create fail'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('文章创建失败');
                },1000);
            }else{
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('文章创建异常');
                },1000);
            }
        });
    }
    //绑定提交新建文章
    $('.article-btn-create').bind('click',createArticle);
    //监听下拉-选择分类
    form.on('select(archive_page_select)',function (data) {
        console.log(data);
        var archiveId = data.value;
        var url = '/admin/default/route'+'/cms/article';
        console.log("要开始请求了");
        //开始请求
        http.getPage(url,{
            archiveId: archiveId
        }).then(function (res) {
            //处理结果
            $('#page-main').html(res);
            setTimeout(function () {
                layer.close(layer.index);
                layer.msg('切换分类成功');
            },1000);
        }).catch(function (res) {
            setTimeout(function () {
                layer.close(layer.index);
                layer.msg('切换分类失败');
            },1000);
        });
    });
    //切换批量删除
    function toggleDeleteArticle(){
        var dom = $('.article-delete-block');
        var value = dom.data('value');
        if(value === 'hide'){
            var checkStatus = table.checkStatus('article_list');
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
    $('.article-toggle-delete').bind('click',toggleDeleteArticle);
    //批量删除文章
    function delArticle(){
        var checkStatus = table.checkStatus('article_list');
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
            http.post('/admin/setting/cms/article/del',{
                keylist:temp
            }).then(function (res) {
                if(res.msg === 'delete success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('文章删除成功');
                        location.reload(true);
                    },1000)
                }else if(res.msg === 'delete item has fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('文章删除失败');
                    },1000)
                }else if(res.msg === 'delete item not find'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('要删除的文章未找到');
                    },1000)
                }else
                {
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('文章删除异常，请刷新页面重试');
                    },1000)
                }
            })
        }
    }
    //绑定删除
    $('.article-btn-delete').bind('click',delArticle);
    //绑定修改
    table.on('edit(article_list)', function(obj){
        var value = obj.value //得到修改后的值
            ,data = obj.data //得到所在行所有键值
            ,field = obj.field; //得到字段
        http.post('/admin/setting/cms/article/change',{
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
    //检测插入链接的标题是否是链接，如果是，直接在链接表单中进行同步。
    function listenLink(){
        //给编辑器的插入链接功能绑定更改
        $('.w-e-panel-tab-content div input').eq(0).on('change',function (){
            var value = $('.w-e-panel-tab-content div input').eq(0).val();
            //如果是一个链接
            if(value.substr(0,7) === 'http://' || value.substr(0,8) === 'https://'){
                var value = $('.w-e-panel-tab-content div input').eq(1).val(value);
            }else{
            }
        });
    }


})
//编辑文章
    var editId = undefined;
function articleEdit(articleId) {
    //请求后台，获取要更改的内容的数据
    http.post('/admin/default/route/cms/article/edit/getdata', {
        article_id: articleId
    }).then(function (res){
        layer.close(layer.index);
        if(res.msg === 'get success'){
            editId = res.data.id;
            //得到标题
            var title = res.data.title;
//            alert(title)
            var content = res.data.content;
//            alert(content)
            var icon = res.data.icon;
            var archive = res.data.archive;
            var describe = res.data.describe;
            form.val("layui-form-edit", {
                "edit-article-archive": archive
            });
//            console.log(title);
            //调用编辑器
            $("#articleEditBox").show();
            //icon调用
            if(icon !== '' && icon !== null){
                var str = "<img src='"+icon+"' />"
                $('.edit_article_icon_main').html(str);
            }else{
                $('.edit_article_icon_main').html('');
            }
            //其他参数
            $('.edit-article-this-title').html(title);
            $("input[name='edit-article-title']").val(title);
            $("input[name='edit-article-icon']").val(icon);
            $("input[name='edit-article-describe']").val(describe);
            editEditor.txt.html(content);
//            $('.edit-article-archive').select(archive);
        }
    });
}
    function articleEditPost(){
        var title = $("input[name='edit-article-title']").val();
        var archive = $("select[name='edit-article-archive'] option:selected").val();
        console.log(archive);
        var icon = $("input[name='edit-article-icon']").val();
        var describe = $("input[name='edit-article-describe']").val();
        var content = editEditor.txt.html();
        //验证
        if(describe === ''){
            describe = editor.txt.text();
            //如果内容也为空
            if(describe === ''){
                describe = "作者很懒，没有留下任何描述哦~"
            }
            else{
                //截取前60位
                describe = describe.substr(0,60);
            }
        }
        if(archive === 'none'){
            layer.msg('请选择文章所属分类');
            return false;
        }
        if(title === ''){
            layer.msg('请填写文章标题');
            return false;
        }
        //更改
        http.post('/admin/setting/cms/article/edit',{
            article: editId,
            title: title,
            archive: archive,
            icon:icon,
            describe: describe,
            content: content
        }).then(function (res){
            if(res.msg === 'edit success'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('文章更新成功');
                    location.reload(true);
                },1000)
            }else if(res.msg === 'edit fail'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('文章更新失败');
                },1000)
            }else{
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('文章更新异常，请刷新页面重试');
                },1000)
            }
        });
    }
</script>