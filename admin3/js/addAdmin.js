/**
 * Created by yym on 2017/5/8.
 */
$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
    $("#addForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            username: {
                required: "请输入用户名",
                minlength: "用户名必需由两个字母组成"
            },
            password: {
                required: "请输入密码",
                minlength: "密码长度不能小于 3 个字母"
            },
            email: "请输入一个正确格式的邮箱",
        }
    });
});