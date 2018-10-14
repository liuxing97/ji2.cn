<div class="layui-anim layui-anim-upbit">
    <div class="layui-card">
        <div class="layui-card-header">更改密码</div>
        <div class="layui-card-body layui-form censcms-layout-content">
            <div class="layui-form-item">
                <label class="layui-form-label">旧密码</label>
                <div class="layui-input-block">
                    <input type="password" value="123" style="display: none">
                    <input name="old_pwd" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">新密码</label>
                <div class="layui-input-block">
                    <input name="new_pwd" placeholder="请输入新密码" autocomplete="off" class="layui-input" type="password">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认新密码</label>
                <div class="layui-input-block">
                    <input name="pwd_confirm" placeholder="请再次输入新密码" autocomplete="off" class="layui-input" type="password">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <div class="layui-btn password-change-submit-btn">立即提交</div>
                <div class="layui-btn password-change-reset-btn layui-btn-primary">重置</div>
            </div>
        </div>
    </div>
</div>
<script>
    function changePw(){
        var oldPw = $("input[name='old_pwd']").val();
        var newPw = $("input[name='new_pwd']").val();
        var pwConfirm = $("input[name='pwd_confirm']").val();
        if(oldPw === ''){
            layer.msg('请输入旧密码');
        }else{
            if(newPw === ''){
                layer.msg('新密码不能为空');
            }else{
                if(newPw === ''){
                    layer.msg('请确认新密码');
                }else{
                    if(newPw === pwConfirm){
                        http.post('/admin/setting/safaty/password/change',{
                            oldPwd: oldPw,
                            newPwd: newPw
                        }).then(function (res) {
                            if(res.msg === 'password change success'){
                                setTimeout(function () {
                                    layer.close(layer.index);
                                    layer.msg('更改成功，3秒后请重新登录');
                                    setTimeout(function () {
                                        $('#logout').submit()
                                    },3000);
                                },1000);
                            }
                        });
                    }else{
                        layer.msg('新密码不一致');
                    }
                }
            }
        }
    }

    function resetChangePw(){
        $("input[name='old_pwd']").val('');
        $("input[name='new_pwd']").val('');
        $("input[name='pwd_confirm']").val('');
    }

    $('.password-change-submit-btn').on('click',changePw);
    $('.password-change-reset-btn').on('click',resetChangePw);
</script>