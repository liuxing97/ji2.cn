const archive = {
    create: function (){
        var archiveName = $(".archiveNameValue").val();
        var archiveDescribe = $(".archiveDescribe").val();
        console.log(archiveName+archiveDescribe);
        loading.postShow();
        var res = http.post('/admin/cms/archive/create',{
            archiveName: archiveName,
            archiveDescribe: archiveDescribe
        }).then(function (res) {
            // console.log(res);
            if(res.msg === 'create success'){
                loading.showSuccess('创建成功');
                $(".archiveNameValue").val('');
                $(".archiveDescribe").val('');
            }else if (res.msg === 'created'){
                loading.showError('创建失败,重复的分类');
            }else {
                loading.showError('创建失败,请检查输入或网络环境');
            }
        });
        console.log(res);
    },
    deletePanel : function (dom) {
        var deleteId = dom.dataset.archive_id;
        console.log(deleteId);
        // loading.showBg();
        // 向页面追加删除确认
        var str =
            "<div class='actPanel'>"+
                "<div class='actBg'></div>"+
                "<div class='actTitle'>" +
                    "确认删除"+
                "</div>"+
                "<div class='actDescribe'>" +
                    "确认删除该分类吗？"+
                "</div>"+
                "<div class='actAction'>" +
                    "<div onclick='archive.deleteArchive("+
                        deleteId+
                        ")' class='a-btn'>确认</div>"+
                    "<div onclick='archive.hidePanel()' class='a-btn'>取消</div>"+
                "</div>"+
            "</div>";
        $("body").append(str)
    },
    deleteArchive: function (deleteId) {
        //隐藏面板
        this.hidePanel();
        //请求
        http.post(
            '/admin/cms/archive/delete',
            {archiveId: deleteId}
        ).then(function (res) {
            if(res.msg === 'delete success'){
                loading.showSuccess('删除成功');
                //刷新页面
            }else if (res.msg === 'havnt log'){
                loading.showError('无法删除不存在的分类');
            }else {
                loading.showError('删除失败,请检查网络环境或重试');
            }
            setTimeout(function () {
                location.href = '';
            },3000)
        })
    },
    changeArchive: function (dom) {
        var archiveId = dom.dataset.archive_id;
        //得到输入的分类名称
        var archive = $(".archiveNameValue").val();
        //得到输入的分类描述
        var describe = $(".archiveDescribe").val();
        console.log(archive+describe);
        http.post('/admin/cms/archive/change/'+archiveId,{
            archive : archive,
            describe: describe,
        }).then(function (res) {
            if(res.msg === 'change success'){
                loading.showSuccess('更新成功');
            }else if(res.msg === 'change fail'){
                loading.showError('更新失败，请刷新重试');
            }else if(res.msg === 'log havnt'){
                loading.showError('要更新的数据不存在');
            }else if(res.msg ==='havnt change'){
                loading.showError('未改变任何数据');
            } else{
                loading.showError('异常，或网络环境异常');
            }
            setTimeout(function () {
                location.href = '';
            },3000)
        })
    },
    hidePanel: function () {
        $('.actPanel').remove();
    }
};

$("#createArchive").on('click',function () {
    archive.create()
});
$(".deleteArchive").on('click',function () {
    archive.deletePanel(this)
});
$(".changeArchive").on('click',function () {
    archive.changeArchive(this)
});