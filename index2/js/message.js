/**
 * Created by yym on 2017/4/26.
 */
/**
 * Created by yym on 2017/4/26.
 */
$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
    $("#messageForm").validate({
        rules: {
            title: {
                required: true,
                minlength: 1
            },
            content: {
                required: true,
                minlength: 10
            },
        },
        messages: {
            title: {
                required: "请输入留言主题",
                minlength: "至少由两个字符组成"
            },
            content: {
                required: "请输入留言内容",
                minlength: "内容至少10个字符"
            },
        }
    });
});