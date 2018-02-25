<?php
/**
 * Created by PhpStorm.
 * User: yym
 * Date: 2017/4/17
 * Time: 10:34
 */
error_reporting(0);
session_start();
include "../../Conn/conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>文章管理</title>

    <!--公共脚本-->
    <!--jquery-->
    <script type="text/javascript" src="../js/plugin/jquery/jquery-1.7.2.js"></script>
    <script type="text/javascript" src="../js/plugin/jquery/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/plugin/prefixfree.js"></script>

    <!--尚软前端脚本-->
    <script type="text/javascript" src="../js/common.js"></script>

    <!--公共样式-->
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>

    <!--本页脚本-->
    <script type="text/javascript" src="../js/sevice.js"></script>

    <style>
        .error{color: red}
    </style>
</head>

<body>
<!--用户登录之后显示用户名-->
<?php
if($_SESSION[username] != ""){
    ?>
    <div style="margin-top:20px;">
        <font color="red">用户:<?php echo $_SESSION[username]; ?></font>&nbsp;&nbsp;&nbsp;
        欢迎您的光临！！！当前时间：
        <font color="red"><?php echo date("Y-m-d"); ?></font>
    </div>
    <?php
}
?>

<div class="container container_nav cf">
    <a href="../index.php" class="logo focus">
        <img src="../images/logo/logo.png" width="258" height="91" />
        <div class="choose"></div>
    </a>
    <ul class="nav">
        <li class="navItem_1">
            <a href="articleList.php" class="icon_nav icon_nav_1">
                <span class="gaoguang"></span>
                <img src="../images/icon_1.png" width="95" height="145" />
            </a>
            <a href="articleList.php" class="nav_txt">文章管理</a>
            <div class="choose"></div>
        </li>
        <li class="navItem_2">
            <span class="gaoguang"></span>
            <a href="../message/messageList.php" class="icon_nav icon_nav_2">
                <img src="../images/icon_2.png" width="70" height="126" />
            </a>
            <a href="../message/messageList.php" class="nav_txt">在线留言</a>
            <div class="choose"></div>
        </li>
        <li class="navItem_3">
            <span class="gaoguang"></span>
            <a href="../userInfo/userInfoList.php" class="icon_nav icon_nav_3">
                <img src="../images/icon_3.png" width="81" height="100" />
            </a>
            <a href="../userInfo/userInfoList.php" class="nav_txt">个人信息</a>
            <div class="choose"></div>
        </li>
        <?php
        if($_SESSION['username'] == ""){
            ?>
            <li class="navItem_4">
                <span class="gaoguang"></span>
                <a href="../login_reg/login_reg.php" class="icon_nav icon_nav_4">
                    <img src="../images/icon_4.png" width="89" height="89" />
                </a>
                <a href="../login_reg/login_reg.php" class="nav_txt">注册/登录</a>
                <div class="choose"></div>
            </li>
            <?php
        }else{
            ?>
            <li class="navItem_4">
                <span class="gaoguang"></span>
                <a href="../safe.php" class="icon_nav icon_nav_4">
                    <img src="../images/icon_4.png" width="89" height="89" />
                </a>
                <a href="../safe.php" class="nav_txt">退出登录</a>
                <div class="choose"></div>
            </li>
            <?php
        }
        ?>
    </ul>
</div>

<!--我要编辑-->
<div class="container container_1000 m_center cf b_70 container_applay">
    <!--我要编辑-->
    <div class="cf f_left applay_left">
        <form id="editForm" action="check_pwd.php?id=<?php echo $_GET[id]?>" method="post">
            <?php
            $sql="select * from tb_users where id='$_GET[id]'";
            $rs=mysql_query($sql);
            $result=mysql_fetch_array($rs);
            ?>
            <table class="table_applay" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td>
                        <label class="js_label">
                            <div class="icon_applay">
                                <span class="icon_xuqiu"></span>
                                <span class="bg"></span>
                                <span class="bg bg2"></span>
                            </div>
                            <input type="text" name="old_pwd" class="input_applay js_input_applay" placeholder="输入原密码"/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="js_label">
                            <div class="icon_applay">
                                <span class="icon_xuqiu"></span>
                                <span class="bg"></span>
                                <span class="bg bg2"></span>
                            </div>
                            <input type="text" id="new_pwd" name="new_pwd" class="input_applay js_input_applay" placeholder="输入新密码"/>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="js_label">
                            <div class="icon_applay">
                                <span class="icon_xuqiu"></span>
                                <span class="bg"></span>
                                <span class="bg bg2"></span>
                            </div>
                            <input type="text" name="new_pwd1" class="input_applay js_input_applay" placeholder="确认新密码"/>
                        </label>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <p id="js_tip" class="form_tip"></p>
                        <input type="submit" value="提交" class="btn_submit" name="edit_btn"/>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>

    </div>

</div>

<div class="footer">
    yym  Copyright © 2017
</div>


<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
<script src="../js/edit_pwd.js"></script>
</body>
</html>

