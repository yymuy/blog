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
    <title>个人信息</title>

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

    <!--  验证码-->
    <script >
        function changing(){
            document.getElementById('captcha_img').src="../code.php?"+Math.random();
        }
    </script>
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
            <a href="../article/articleList.php" class="icon_nav icon_nav_1">
                <span class="gaoguang"></span>
                <img src="../images/icon_1.png" width="95" height="145" />
            </a>
            <a href="../article/articleList.php" class="nav_txt">博客文章</a>
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
            <a href="userInfoList.php" class="icon_nav icon_nav_3">
                <img src="../images/icon_3.png" width="81" height="100" />
            </a>
            <a href="userInfoList.php" class="nav_txt">个人信息</a>
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

<?php
if($_SESSION[username] == ""){
    echo "<script>
//     Showbo.Msg.alert('您好，请先注册或登录!');
      alert('对不起，本博客网站只有登录的用户才有权查看个人信息');
      window.location.href='../index.php';</script>";

}else{
    ?>
    <!--个人信息标题-->
    <div class="container  container_full title_coloumn">
        <span>个人信息</span>
        <div class="title_coloumn_line"><img src="../images/title_tip.gif" width="20" height="31" class="title_img" /></div>
    </div>

    <!--个人信息内容-->
    <div class="container container_1000 m_center cf b_70">

        <table class="table_applay" style="">
            <thead>
            <tr bgcolor="#ffdead">
                <th>昵称</th>
                <th>密码</th>
                <th>邮箱</th>
                <th>操作</th>
            </tr>
            </thead>
            <?php
            $sql="select * from tb_users WHERE regname='$_SESSION[username]'";
            $rs=mysql_query($sql);
            $result=mysql_fetch_array($rs);
            ?>
            <tr class="info" align="center">
                <td><?php echo $result['regname'];?></td>
                <td><?php echo $result['regpwd'];?></td>
                <td><?php echo $result['email'];?></td>
                <td><a href="edit_pwd.php?id=<?php echo $result['id'];?>" class="btn_submit1">修改密码</a></td>
            </tr>
        </table>

    </div>

    <?php
}

?>

<div class="footer">
    yym  Copyright © 2017
</div>

</body>
</html>

