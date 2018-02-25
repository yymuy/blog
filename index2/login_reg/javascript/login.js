/**
 * Created by yym on 2017/4/26.
 */
/**
 * Created by yym on 2017/4/26.
 */
$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
    $("#loginForm").validate({
        rules: {
            txt_user: {
                required: true,
            },
            txt_pwd: {
                required: true,
            },
            txt_yan: {
                required: true,
            }
        },
        messages: {
            txt_user: {
                required: "请输入用户名",
            },
            txt_pwd: {
                required: "请输入密码",
            },
            txt_yan: {
                required: "请输入验证码",
            },
        }
    });
});
