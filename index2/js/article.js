/**
 * Created by yym on 2017/4/26.
 */
/**
 * Created by yym on 2017/4/26.
 */
$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
    $("#articleForm").validate({
        rules: {
            txt_title: {
                required: true,
                minlength: 1,
                maxlength:10
            },
            file: {
                required: true,
                minlength: 10
            },
        },
        messages: {
            txt_title: {
                required: "请输入文章主题",
                minlength: "至少由两个字符组成",
                maxlength:"文章主题不得超过10个字符"
            },
            file: {
                required: "请输入博客文章内容",
                minlength: "内容至少10个字符"
            },
        }
    });
});