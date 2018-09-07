const acticle = {
    postActicle: {
        getTitle: function () {
            var title = $(".acticleTitle").val();
            if(title === ''){
                $(".titleTip").show();
            }else{
                $(".titleTip").hide();
            }
            return title;
        },
        getValue: function () {
            var html = editor.txt.html();
            console.log(html);
            return html;
        },
        getDescribe: function () {
            var describe = $(".acticleDescribe").val();
            console.log(describe);
            return describe;
        },
        post: function () {
            var title = this.getTitle();
            var content = this.getValue();
            if(title === ''){
                loading.showError('您没有填写文章标题，标题为必填项，请补充填写')
                // $(".postTip").html(' * 您没有填写文章标题，标题为必填项，请补充填写').show();
                return false;
            }else{
                $(".postTip").hide()
            }
            loading.postShow();
            http.post(
                '/admin/cms/acticle/create',
                {
                    title: title,
                    describe: this.getDescribe(),
                    content: content,
                    archive: archiveValue
                }
            ).then(function (res) {
                loading.hide();
                if(res.msg === 'create success'){
                    loading.showSuccess('发布成功');
                    setTimeout(function () {
                        location.href = ''
                    },3000)
                }else if(res.msg === 'create fail'){
                    loading.showError('发布失败，请重试')
                }
            });
        }
    }
};

var editor = undefined;
require(['/module/editor/wangEditor.js'], function (E) {
    editor = new E('#editor');
    editor.create();
});

var archiveValue = 'def';
$('.filter-box').selectFilter({
    callBack : function (val){
        //返回选择的值
        console.log(val+'-是返回的值');
        archiveValue = val;
    }
});

$(".acticleTitle").on('blur',function () {
    acticle.postActicle.getTitle();
});
$(".acticleDescribe").on('blur',function () {
    acticle.postActicle.getDescribe();
});
$(".postActicle").on('click',function () {
    acticle.postActicle.post();
});