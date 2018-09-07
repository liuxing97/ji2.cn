const menu = {
    createMenuPage: {
        menuList: [
        ],
        appendMenu:function () {
            //得到菜单名称
            var title = $(".menuItemTitleValue").val();
            //得到菜单链接
            var href = $(".menuItemHrefValue").val();
            //得到菜单类型
            var type = $("input[name='linkType']:checked").val();
            var data = {
                title: title,
                href: href,
                type: type
            };
            //追加
            this.menuList.push(data);
            console.log(this.menuList);
            //插入界面
            var html = "<a target='"+
                type
                +"' href='" +
                href +
                "'><div class='menuItem'>" +
                title +
                "</div></a>";
            $(".proMenuDom").append(html);
            //清空输入
            $(".menuItemTitleValue").val('');
            $(".menuItemHrefValue").val('');
        },
        menuPost: function () {
            loading.postShow();
            var data = this.menuList;
            if(data.length === 0){
                loading.showError('请设置菜单项');
                return false;
            }
            data = JSON.stringify(data);
            http.post(
                '/admin/cms/menu/create',
                {
                    list:data
                }
            ).then(function (res) {
                console.log(res);
                if(res.msg === 'create success'){
                    loading.showSuccess('创建成功，3秒后刷新界面');
                    location.href = '';
                }else{
                    loading.showError('创建失败，请检查');
                }
            })
        }
    }
};

$(".menuItemAppendBtn").on('click',function () {
    menu.createMenuPage.appendMenu();
});
$(".menuDataPost").on('click',function () {
    menu.createMenuPage.menuPost();
});