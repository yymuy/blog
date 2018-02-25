/**
 * Created by yym on 2017/4/26.
 */
/**
 * Created by yym on 2017/4/26.
 */
$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
    $("#editForm").validate({
        rules: {
            old_pwd: {
                required: true,
            },
            new_pwd: {
                required: true,
                minlength: 3
            },
            new_pwd1: {
                required: true,
                minlength: 3,
                equalTo:"#new_pwd",
            },
        },
        messages: {
            old_pwd: {
                required: "请输入原密码",
                minlength: "至少由1个字符组成",
            },
            new_pwd: {
                required: "请输入新密码",
                minlength: "新密码至少由3个字符组成",
            },
            new_pwd1: {
                required: "请再次输入密码",
                minlength: "新密码至少由3个字符组成",
                equalTo:"两次输入的密码不一致"
            },
        }
    });
});