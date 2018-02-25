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

    <!--本页样式-->
    <style type="text/css">
        body{background-image:none;}
    </style>

    <!--本页脚本-->
    <script type="text/javascript" src="../js/case-detail.js"></script>

</head>

<body>

<!--用户登录之后显示用户名-->
<div style="margin-top:20px;">
    <font color="red">用户:<?php echo $_SESSION[username]; ?></font>&nbsp;&nbsp;&nbsp;
    欢迎您的光临！！！当前时间：
    <font color="red"><?php echo date("Y-m-d H:i:s"); ?></font>
</div>

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
            <a href="../article/articleList.php" class="nav_txt">文章管理</a>
            <div class="choose"></div>
        </li>
        <li class="navItem_2">
            <span class="gaoguang"></span>
            <a href="messageList.php" class="icon_nav icon_nav_2">
                <img src="../images/icon_2.png" width="70" height="126" />
            </a>
            <a href="messageList.php" class="nav_txt">在线留言</a>
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

<!--在线留言标题-->
<div class="container container_full title_coloumn">
    <span>留言</span>
    <div class="title_coloumn_line"><img src="../images/title_tip.gif" width="20" height="31" class="title_img" /></div>
</div>

<!--在线留言内容-->
<div class="container container_1000 m_center cf b_70 cf">
    <!--文章-->
    <?php
    $rs=mysql_query("select * from tb_message where id='$_GET[id]'");
    $result = mysql_fetch_array($rs);
        ?>
        <div class="container_team cf">
            <div class="cell_wrap cell_team">
                <div class="cell_wrap_b">
                    <div class="cf team_txt">
                        <p class="team_title"><?php echo $result[title]; ?></p>
                        <p class="team_intro">作者:<?php echo $result[username]; ?>&nbsp;&nbsp;&nbsp;发表时间:<?php echo $result[now]; ?></p>
                        <p class="team_intro" style="width: 800px;text-indent: 2em;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><b><?php echo $result[content]; ?></p>
                        <?php
                        $sql1="select * from tb_huifup where messageid=".$result['id'];
                        $num=mysql_num_rows(mysql_query($sql1));
                        ?>
                        <br>
                        <p class="team_intro"><b><a href="#">回复(<?php echo $num; ?>)</a>&nbsp;
                                <?php
                                if($_SESSION[username] == $result[username]){
                                    ?>
                                    <a href="messageList_edit.php?id=<?php echo $result['id'];?>">编辑</a>
                                    <a href="del_message.php?id=<?php echo $result['id'];?>">删除</a>
                                    <?php
                                }
                                ?>

                        </p>
                        <p class="team_intro">
                            <a href="messageList_de.php?id=<?php echo $result['id'];?>" style="float: right">
                                <button class="btn_submit">阅读全文</button>
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
</div>

<!--对留言的回复-->
<div class="container container_full title_coloumn">
    <span>对留言的回复</span>
    <div class="title_coloumn_line"><img src="../images/title_tip.gif" width="20" height="31" class="title_img" /></div>
</div>

<div class="container container_1000 m_center cf b_70 cf">
    <?php
    $rs=mysql_query("select * from tb_huifu where messageid='$_GET[id]'");
    while($result = mysql_fetch_array($rs)){
    ?>
    <div class="container_team cf">
        <div class="cell_wrap cell_team">
            <div class="cell_wrap_b">
                <div class="cf team_txt">
                    <p class="team_title"><?php echo $result[title]; ?></p>
                    <p class="team_intro">作者:<?php echo $result[username]; ?>&nbsp;&nbsp;&nbsp;发表时间:<?php echo $result[now]; ?></p>
                    <p class="team_intro" style="width: 800px;text-indent: 2em;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><b><?php echo $result[content]; ?></p>
                    <?php
                    $sql1="select * from tb_huifup where messageid=".$result['id'];
                    $num=mysql_num_rows(mysql_query($sql1));
                    ?>
                    <br>
                    <p class="team_intro"><b><a href="#">回复(<?php echo $num; ?>)</a>&nbsp;
                            <?php
                            if($_SESSION[username] == $result[username]){
                                ?>
                                <a href="messageList_edit.php?id=<?php echo $result['id'];?>">编辑</a>
                                <a href="del_message.php?id=<?php echo $result['id'];?>">删除</a>
                                <?php
                            }
                            ?>

                    </p>
                    <p class="team_intro">
                        <a href="messageList_de.php?id=<?php echo $result['id'];?>" style="float: right">
                            <button class="btn_submit">阅读全文</button>
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>


<!--我要回复-->
<div class="container container_1000 m_center cf b_70 cf">
    <p class="title_applay b_30">留下您的宝贵意见！</p>
    <form id="js_demoform" method="post" action="huifuP.php?messageid=<?php echo $_GET[''];?>" class="cell_wrap_b">
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
                        <textarea  class="input_applay input_applay_area js_input_applay" placeholder="简单描述您的需求..." name="content"></textarea>
                    </label>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td>
                    <p id="js_tip" class="form_tip"></p>
                    <input type="submit" value="提交" class="btn_submit" name="huifu_btn" />
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>

<div class="footer">
    yym  Copyright © 2017
</div>

</body>
</html>

