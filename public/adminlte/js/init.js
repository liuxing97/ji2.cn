var init = {
    //头部背景高度自适应
    headBgAutoHeight: function () {
        $(document).ready(function () {
            var height = $(".pageHeader").outerHeight(true);
            // alert()
            $('.headerBg').css({'height':height+180});

        })
    }
};
init.headBgAutoHeight();