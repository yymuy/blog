<?php
/**
 * Created by PhpStorm.
 * User: yym
 * Date: 2017/4/17
 * Time: 10:26
 */
error_reporting(0);
session_start();
include "../Conn/conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人博客首页</title>

    <!--公共脚本-->
    <!--jquery-->
    <script type="text/javascript" src="js/plugin/jquery/jquery-1.7.2.js"></script>
    <script type="text/javascript" src="js/plugin/jquery/jquery.easing.1.3.js"></script>

    <!--前端脚本-->
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            //首页轮播
            xlc.tabList ("#js_diannao" , "mouseover" , "focus" , true , 3000);
        });
    </script>

    <!--公共样式-->
    <link rel="stylesheet" type="text/css" href="css/common.css"/>

    <link rel="stylesheet" href="alert/showBo.css">
    <script type="text/javascript" src="alert/showBo.js"></script>
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

<!--导航条-->
<div class="container container_nav cf">
    <a href="index.php" class="logo focus">
        <img src="images/logo/logo.png" width="258" height="91" />
        <div class="choose"></div>
    </a>
    <ul class="nav">
        <li class="navItem_1">
            <a href="article/articleList.php" class="icon_nav icon_nav_1">
                <span class="gaoguang"></span>
                <img src="images/icon_1.png" width="95" height="145" />
            </a>
            <a href="article/articleList.php" class="nav_txt">博客文章
            </a>
            <div class="choose"></div>
        </li>
        <li class="navItem_2">
            <span class="gaoguang"></span>
            <a href="message/messageList.php" class="icon_nav icon_nav_2">
                <img src="images/icon_2.png" width="70" height="126" />
            </a>
            <a href="message/messageList.php" class="nav_txt">在线留言</a>
            <div class="choose"></div>
        </li>
        <li class="navItem_3">
            <span class="gaoguang"></span>
            <a href="userInfo/userInfoList.php" class="icon_nav icon_nav_3">
                <img src="images/icon_3.png" width="81" height="100" />
            </a>
            <a href="userInfo/userInfoList.php" class="nav_txt">个人信息</a>
            <div class="choose"></div>
        </li>

        <?php
        if($_SESSION['username'] == ""){
            ?>
            <li class="navItem_4">
                <span class="gaoguang"></span>
                <a href="login_reg/login_reg.php" class="icon_nav icon_nav_4">
                    <img src="images/icon_4.png" width="89" height="89" />
                </a>
                <a href="login_reg/login_reg.php" class="nav_txt">注册/登录</a>
                <div class="choose"></div>
            </li>
        <?php
        }else{
            ?>
            <li class="navItem_4">
                <span class="gaoguang"></span>
                <a href="safe.php" class="icon_nav icon_nav_4">
                    <img src="images/icon_4.png" width="89" height="89" />
                </a>
                <a href="safe.php" id="tuichu" class="nav_txt" >退出登录</a>
                <div class="choose"></div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>

<!--蔓藤-->
<div class="container m_center container_manteng">
    <img class="ye ye1" src="images/yezi/ye_1.png" width="24" height="22" />
    <img class="ye ye2" src="images/yezi/ye_2.png" width="34" height="24" />
    <img class="ye ye3" src="images/yezi/ye_3.png" width="24" height="22" />
    <img class="ye ye4" src="images/yezi/ye_4.png" width="19" height="28" />
    <img class="ye ye5" src="images/yezi/ye_5.png" width="12" height="20" />
    <img class="ye ye6" src="images/yezi/ye_6.png" width="18" height="30" />
    <img class="ye ye7" src="images/yezi/chong.png" width="21" height="25" />
    <img src="images/manteng.png" width="410" height="92" />
</div>


<div class="container container_geban">
    <div class="container container_indexmain">
        <div class="diannao" id="js_diannao">
            <ul class="lunbo js_slideWrap">
                <?php
                $sql="select * from tb_public ORDER BY id DESC LIMIT 0,1";
                $rs=mysql_query($sql);
                $result=mysql_fetch_array($rs);
                ?>
                <li style="background-image:url(images/index/l_1.png)">
                    <?php
                    if($result){
                        ?>
                        <p class="p1" style="padding: 5px;">
                            <span style="color: white">最新公告</span>
                            <marquee  scrollamount=1 direction="up" behaviour="Scroll">
                                <font color=white><?php echo $result['content'];?></font>
                            </marquee>
                        </p>
                    <?php
                    }else{
                        ?>
                        <div class="p2" style="margin-top: 70px;">
<!--                            <marquee  scrollamount=2 direction="left" behaviour="Scroll">-->
                               暂无公告
<!--                            </marquee>-->
                        </div>
                    <?php
                    }
                    ?>

                </li>
                <li style="background-image:url(images/index/l_2.png)">
                    <?php
                    if($result){
                        ?>
                        <p class="p1" style="padding: 5px">
                            <span style="color: white">最新公告</span>
                            <marquee  scrollamount=1 direction="up" behaviour="Scroll">
                                <font color=yellow><?php echo $result['content'];?></font>
                            </marquee>
                        </p>
                        <?php
                    }else{
                        ?>
                        <div class="p1" style="margin-top: 70px;">
<!--                            <marquee  scrollamount=2 direction="left" behaviour="Scroll">-->
                                暂无公告
<!--                            </marquee>-->
                        </div>
                        <?php
                    }
                    ?>


                    <!--                    <p class="p2">2</p>-->
                </li>
                <li style="background-image:url(images/index/l_3.png)">
                    <?php
                    if($result){
                        ?>
                        <p class="p1" style="padding: 5px">
                            <span style="color: white">最新公告</span>
                            <marquee  scrollamount=1 direction="up" behaviour="Scroll">
                                <font color=red><?php echo $result['content'];?></font>
                            </marquee>
                        </p>
                        <?php
                    }else{
                        ?>
                        <div class="p1" style="margin-top: 70px;">
<!--                            <marquee  scrollamount=2 direction="left" behaviour="Scroll">-->
                                暂无公告
<!--                            </marquee>-->
                        </div>
                        <?php
                    }
                    ?>


                    <!--                    <p class="p2">2</p>-->
                </li>
            </ul>
            <ul class="lunbo_tip js_slideTip">
                <li class="focus"></li>
                <li></li>
                <li></li>
            </ul>
            <img src="images/index/gaoguang.png" width="379" height="225" class="gaoguang_diannao" />
            <img src="images/index/diannao.png" width="417" height="305" />
        </div>
        <div class="ps">
            <img src="images/index/ps.png" width="124" height="197" />
        </div>
    </div>
</div>


<div class="footer">
    yym  Copyright © 2017
</div>

</body>
</html>

