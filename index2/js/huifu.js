/**
 * Created by yym on 2017/4/26.
 */
/**
 * Created by yym on 2017/4/26.
 */
$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
    $("#huifuForm").validate({
        rules: {
            huifu_text: {
                required: true,
                minlength: 1
            },
        },
        messages: {
            huifu_text: {
                required: "请输入回复内容",
                minlength: "至少由1个字符组成",
            },
        }
    });
});