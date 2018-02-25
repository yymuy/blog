<?php
/**
 * Created by PhpStorm.
 * User: yym
 * Date: 2017/4/19
 * Time: 13:38
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <script type="text/javascript" src="yzm.js"></script>
</head>

<body>

<!--<img id="captcha_img" onclick="changing();" src='code.php' />-->

<form method="post" action="form.php">
    <p>验证码: <img id="captcha_img" border='1' src="../code.php?r='+rand()+'" style="width:100px; height:30px" onclick="changing();"/>
    </p>
    <P>请输入验证码:<input type="text" name='authcode' value=''/></p>
    <p><input type='submit' name="ok" value='提交' style='padding:6px 5px;'/></p>
</form>



</body>
</html>


