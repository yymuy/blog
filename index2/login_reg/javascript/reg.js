/**
 * Created by yym on 2017/4/26.
 */
$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
    $("#regForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 2
            },
            pwd: {
                required: true,
                minlength: 3
            },
            pwd1: {
                required: true,
                minlength: 3,
                equalTo: "#pwd"
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            username: {
                required: "请输入用户名",
                minlength: "用户名至少由两个字符组成"
            },
            pwd: {
                required: "请输入密码",
                minlength: "密码长度不能小于3个字符"
            },
            pwd1: {
                required: "请输入密码",
                minlength: "密码长度不能小于 3 个字符",
                equalTo: "两次密码输入不一致"
            },
            email: "请输入一个正确格式的邮箱",
        }
    });
});
