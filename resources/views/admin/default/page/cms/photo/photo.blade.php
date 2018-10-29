@php
    //得到所有的分类
    $obj = new \App\CmsPhotoArchive();
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
        <div class="layui-tab layui-tab-brief">
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
                    {{--文章所属的分类--}}
                    <div class="layui-form-item censcms-layui-select" style="margin-top: 0">
                        <select name="photo_archive_page_select" lay-filter="photo_archive_page_select">
                            {{--判断是否存在任何分类--}}
                            @if($photoArchiveListArray)
                                {{--输出当前访问的分类--}}
                                <option value="{{$thisPhotoArchiveArray['id']}}">{{$thisPhotoArchiveArray['title']}}(ID:{{$thisPhotoArchiveArray['id']}})</option>

                                @foreach($photoArchiveListArray as $item)
                                    @if($thisPhotoArchiveArray['id'] != $item['id'])
                                        <option value="{{$item['id']}}">{{$item['title']}}(ID:{{$item['id']}})</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="none">未找到分类，请先创建</option>
                            @endif
                        </select>
                    </div>



                    <style>
                        .photo-list{

                        }
                        .photo-list-itembox{
                            display: inline-block;
                            margin-right: 36px;
                            margin-top: 50px;
                            position: relative;
                            cursor: pointer;
                        }
                        .photo-list-itembox-main{
                            display: table;
                        }
                        .photo-list-itembox-main-img{
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
                        .photo-list-itembox-main-img img{
                            max-height: 100%;
                            max-width: 100%;
                        }
                        .photo-list-itembox-id{
                            margin-top: 20px;
                            text-align: center;
                        }
                        .photo-list-itembox-del{
                            position: absolute;
                            right: 0;
                            top: 0;
                            line-height: 30px;
                            background: rgba(0,0,0,0.36);
                            padding: 0 16px;
                            color: #fff;
                            border-radius: 3px;
                            display: none;
                            cursor: pointer;
                        }
                        .photo-list-itembox:hover .photo-list-itembox-del{
                            display: block;
                        }
                        .photo-list-itembox:hover .photo-list-itembox-describe-change{
                            top:6px;
                        }
                        .photo-list-itembox-describe-change{
                            position: relative;
                            top:-2000px;
                        }
                        .photo-list-itembox-describe{
                            text-align: center;
                            margin-top: 12px;
                            color: #9a9a9a;
                        }
                    </style>
                    {{--图片列表--}}
                    <div class="photo-list">
                        @if(!$photosArray)
                            <div style="line-height: 26px;padding: 55px;text-align: center;color: #999;">无内容，请上传图片</div>
                            @endif
                        @foreach($photosArray as $item)
                            <div class="photo-list-itembox">
                                <div class="photo-list-itembox-main">
                                    <div class="photo-list-itembox-main-img">
                                        <img src="{{$item['path']}}" />
                                    </div>
                                </div>
                                <div class="photo-list-itembox-id">
                                    <span>图片ID：{{$item['id']}}</span>
                                    <div onclick="changePhotoDescribe({{$item['id']}})" class="photo-list-itembox-describe-change" style="color: #5FB878">修改描述</div>
                                </div>
                                <div class="photo-list-itembox-del" onclick="
                                        actionPhotoId={{$item['id']}};confirmPanel()
                                        ">删除图片</div>
                                <div class="photo-list-itembox-describe photo-list-itembox-describe-{{$item['id']}}">@if($item['describe']){{$item['describe']}}@else该图片还没有描述@endif</div>
                            </div>
                        @endforeach
                    </div>






















                </div>
                <div class="layui-tab-item">
                    <div class="layui-form-item">
                        <label class="layui-form-label">图片预览</label>
                        <div class="layui-input-block">
                            <style>
                                .photoPre{
                                    display: inline-block;
                                    margin: 0 0 20px 0;
                                    border: 2px dashed #e5e5e5;
                                    /*width: 200px;*/
                                    /*height: 200px;*/
                                    text-align: center;
                                }
                                .photoPreShow{
                                    display: table-cell;
                                    vertical-align: middle;
                                    width: 200px;
                                    height: 200px;
                                    background: rgba(236, 236, 236, 0.2);
                                }
                                .photoPreShow img{
                                    max-width: 100%;
                                    max-height: 100%;
                                }
                            </style>
                            {{--图片预览--}}
                            <div class="photoPre">
                                <div class="photoPreShow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item" style="margin-top: 3rem">
                        <h3 class="layui-timeline-title" style="margin-bottom: 2rem">创建文章，为哪个分类上传图片(必选*)</h3>
                        <div class="layui-form-label">选择分类</div>
                        <div class="layui-input-block">
                            <select name="article-create-select-archive" lay-filter="photo_archive_select">
                                @if($archiveArray)
                                    <option value="none">请选择分类</option>
                                    @foreach($archiveArray as $item)
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
                    <div class="layui-form-item">
                        <label class="layui-form-label">选择图片</label>
                        <div class="layui-input-block">
                            <button type="button" class="layui-btn" id="test1">
                                <i class="layui-icon">&#xe67c;</i>选择图片
                            </button>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">提交上传</label>
                        <div class="layui-input-block">
                            <button type="button" class="layui-btn" id="uploadPhoto">
                                提交上传
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var actionPhotoId = undefined;
    var photoArchiveValue = 'none';
    $(document).ready(function () {
        table.init();
        form.render();
        form.on('select(photo_archive_select)',function (data) {
            photoArchiveValue = data.value;
            console.log('值变了');
            console.log(photoArchiveValue);
        });
        form.on('select(photo_archive_page_select)',function (data) {
            console.log(data);
            var archiveId = data.value;
            var url = '/admin/default/route'+'/cms/photo/list';
            console.log("要开始请求了");
            //开始请求
            http.getPage(url,{
                photoArchiveId: archiveId
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
        var uploadInst = upload.render({
            elem: '#test1', //绑定元素
            url: '/admin/setting/cms/photo/upload', //上传接口
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                photoArchiveValue: function () {
                    return photoArchiveValue;
                }
            },
            acceptMime: 'image/jpg, image/png',
            multiple:'false',
            size:'2048',
            auto:false,
            bindAction: '#uploadPhoto',
            before: function () {
                layer.open({
                    skin:'httpLoading-class',
                    type:1,
                    area:['300px','200px'],
                    closeBtn:0,
                    shade: 0.86,
                    title:false,
                    content:$('#httpLoading')
                })
            },
            choose: function (obj){
                //将每次选择的文件追加到文件队列
                //var files = obj.pushFile();
                //预读本地文件，如果是多文件，则会遍历。(不支持ie8/9)
                obj.preview(function(index, file, result){
                    //console.log(index); //得到文件索引
                    //console.log(file); //得到文件对象
                    //console.log(result); //得到文件base64编码，比如图片
                    $('.photoPreShow').html(
                        "<img src='"+result+"' />"
                    )

                    //obj.resetFile(index, file, '123.jpg'); //重命名文件名，layui 2.3.0 开始新增

                    //这里还可以做一些 append 文件列表 DOM 的操作

                    //obj.upload(index, file); //对上传失败的单个文件重新上传，一般在某个事件中使用
                    //delete files[index]; //删除列表中对应的文件，一般在某个事件中使用
                });
            },
            done: function(res){
                console.log(res);
                //上传完毕回调
                if(res.msg === 'please select photo archive'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('请选择要上传图片的分类');
                    },1000)
                }else if(res.msg === 'create success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('上传成功');
                        location.reload(true);
                    },1000)
                }else if(res.msg === 'create fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('上传失败,'+res.error)
                    },1000)
                }else if(res.msg === 'create already exists'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('异常的重复上传')
                    },1000)
                }else{
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('上传异常')
                    },1000)
                }
            }
            ,error: function(){
                //请求异常回调
                layer.msg('上传方法失败');
            }
        });
    })
    //删除图片
    function deletePhoto(id) {
        http.post('/admin/setting/cms/photo/del',{
            id:id
        }).then(function (res){
            if(res.msg === 'photo not find'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('删除失败，图片没有找到');
                },1000)
            }else if(res.msg === 'photo delete success'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('删除成功');
                    location.reload(true);
                },1000)
            }else if(res.msg === 'photo delete fail'){
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('删除失败，图片实体没有找到');
                },1000)
            }else{
                setTimeout(function () {
                    layer.close(layer.index);
                    layer.msg('删除失败，异常！');
                },1000)
            }
        })
    }
    //确认删除
    function confirmPanel(){
        layer.confirm('确认删除这个图片吗?', {icon: 3, title:'确认删除'}, function(index){
            //do something
            if(deletePhoto){
                deletePhoto(actionPhotoId);
            }
            layer.close(index);
        });
    }
    var photoId = undefined;
    //更改图片描述操作
    function changePhotoDescribe(id){
        var describe = $('.photo-list-itembox-describe-'+id).html();
        if(describe === '该图片还没有描述'){
            describe = ''
        }
        //得到描述的值
        layer.prompt({
            title: '修改描述 图片ID:'+id,
            formType: 0, //输入框类型，支持0（文本）默认1（密码）2（多行文本）
            value: describe, //初始时的值，默认空字符
            maxlength: 140 //可输入文本的最大长度，默认500
        },function (value){
            //请求修改
            http.post('/admin/setting/cms/photo/describe/change',{
                photoId:id,
                describe:value
            }).then(function (res){
                console.log(res);
                if(res.msg === 'change success'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('更改成功');
                        location.reload(true);
                    },1000)
                }else if(res.msg === 'change fail'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('上传失败,'+res.error)
                    },1000)
                }else if(res.msg === 'create already exists'){
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('异常的重复上传')
                    },1000)
                }else{
                    setTimeout(function () {
                        layer.close(layer.index);
                        layer.msg('上传异常')
                    },1000)
                }
            });
        });
    }
    //确认更改
    function changePhotoDescribeAction(){

    }
</script>






