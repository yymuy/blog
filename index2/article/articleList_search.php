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
//include_once "../../check_login.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>博客文章</title>

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

    <!--搜索框-->
    <script type="text/javascript" src="../js/search.js"></script>

    <script type="text/javascript" src="../js/UBBCode.JS"></script>

    <!--  验证码-->
    <script >
        function changing(){
            document.getElementById('captcha_img').src="../code.php?"+Math.random();
        }
    </script>

    <style>
        .error{
            color:red;
        }
    </style>


    <link href="../../index3/css/base.css" rel="stylesheet">
    <link href="../../index3/css/index.css" rel="stylesheet">
    <link href="../../index3/css/media.css" rel="stylesheet">
    <script src="../../index3/js/silder.js"></script>
    <!--[if lt IE 9]>
    <script src="js/modernizr.js"></script>
    <![endif]-->
</head>

<body>

<!--用户登录之后显示用户名-->
<?php
if($_SESSION[username] != ""){
    ?>
    <div style="margin-top:20px;">
        <font color="red">用户:<?php echo $_SESSION[username]; ?></font>&nbsp;&nbsp;&nbsp;
        欢迎您的光临！！！当前时间：
        <font color="red"><?php echo date("Y-m-d H:i:s"); ?></font>
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
            <a href="articleList.php" class="nav_txt">博客文章</a>
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

<!--搜索-->
<div class="container container_1000 m_center cf b_70 ">
    <form action="" method="get" class="cell_wrap_b">
        <div class="wrapper">
            <input type="text" class="input_applay js_input_applay" name="search_text" placeholder="Search for Article" />
            <input type="submit" class="btn_submit" name="search_btn"><img src="../images/search_icon.png" title="Search" height="18"/></input>
        </div>
    </form>

</div>



<div class="ibody">

    <!-- ==============================  左边  ===================================-->
    <article  class="bloglist">
        <h2>
            <p><span>全部</span>博客文章</p>
        </h2>
        <?php
        if(isset($_GET['search_btn'])) {
            $title=$_GET['search_text'];
            $perNumber = 3; //每页显示的记录数
            $page = $_GET['page']; //获得当前的页面值
            $count = mysql_query("select count(*) from tb_article where title like '%$title%'"); //获得记录总数
            $result = mysql_fetch_array($count);
            $totalNumber = $result[0];
            $totalPage = ceil($totalNumber / $perNumber); //计算出总页数

            $totalcount = mysql_num_rows(mysql_query("select * from tb_article where title like '%$title%'"));
            if($totalcount < 1){
                echo "无相关的博客文章";
            }

            if (!isset($page)) {
                $page = 1;
            } //如果没有值,则赋值1
            $startCount = ($page - 1) * $perNumber; //分页开始,根据此方法计算出开始的记录
            $rs = mysql_query("select * from tb_article where title like '%$title%' limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数
            while ($result = mysql_fetch_array($rs)) {
                ?>
                <div class="bloglist">
                    <div class="blogs">
                        <h3><a href="/"><?php echo $result[title]; ?></a></h3>
                        <ul>
                            <p><?php echo $result[content]; ?></p>
                            <a href="articleList_de.php?id=<?php echo $result['id']; ?>" style="float: right">
                                <button class="btn_submit">阅读全文>></button>
                            </a>
                            <!--                                    <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>-->
                        </ul>
                        <p class="autor">
                            <span>作者：<?php echo $result[author]; ?></span>
                            <?php
                            $sql1 = "select * from tb_filecomment where fileid=" . $result['id'];
                            $num = mysql_num_rows(mysql_query($sql1));
                            ?>
                            <span>评论(<a href="/"><?php echo $num; ?></a>)</span>
                                    <span>
                                        <?php
                                        if ($_SESSION[username] == $result[author]) {
                                            ?>
                                            <a href="articleList_edit.php?id=<?php echo $result['id']; ?>">编辑</a>
                                            <a href="del_article.php?id=<?php echo $result['id']; ?>">删除</a>
                                            <?php
                                        }
                                        ?>
                                    </span>
                        </p>

                        <div class="dateview"><?php echo $result[now]; ?></div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </article>

    <!-- ==============================  右边  ===================================-->
    <aside>
        <div class="about_c">
            <p>既然选择了风雨,便只顾风雨兼程</p>
        </div>
        <div class="tj_news">
            <h2>
                <p class="tj_t1">最新文章</p>
            </h2>
            <ul>
                <?php
                $sql="select * from tb_article order by id desc limit 3";
                $rs = mysql_query($sql);
                $num=mysql_num_rows($rs);
                if($num < 1){
                    echo "<span style='color: red'>暂无文章</span>";
                }
                while ($result = mysql_fetch_array($rs)) {
                    ?>
                    <li><a href="/"><?php echo $result["title"]; ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="links">
            <h2>
                <p>友情链接</p>
            </h2>
            <ul>
                <li><a href="http://yangyuemei.coding.me/blog/">基于hexo搭建的个人博客</a></li>
                <li><a href="https://coding.net/u/yangyuemei/">个人coding主页</a></li>
            </ul>
        </div>
        <div class="copyright">
            <ul>
                <p> Design by <a href="/">yym</a></p>
                <p>2017</p>
                </p>
            </ul>
        </div>
    </aside>

    <!-- ==============================  清除浮动  ===================================-->
    <div class="clear"></div>
</div>

<!--  分页条-->
<?php
if($totalcount > 0){
    ?>
    <div class="pagey" >
        当前页:<?php echo $page;?>&nbsp;&nbsp;总页数:<?php echo $totalPage;?>页&nbsp;&nbsp;
        总记录数:<?php echo $totalcount;?> 条&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        $title='&search_text='.$title.'&search_btn='.$_GET['search_btn'];
        if ($page != 1) { //页数不等于1
            ?>
            <a href="articleList_search.php?page=<?php echo ($page - 1).$title;?>">上一页</a><!--显示上一页-->
            <?php
        }
        for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
            ?>
            <a href="articleList_search.php?page=<?php echo $i.$title;?>"><?php echo $i;?></a>
            <?php
        }
        if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
            ?>
            <a href="articleList_search.php?page=<?php echo ($page + 1).$title;?>">下一页</a><!--显示下一页-->
            <?php
        }
        ?>

    </div>
    <?php
}
?>

<!--发表博客文章-->
<div class="container container_1000 m_center cf b_70 container_applay">
    <div class="cf f_left applay_left">

        <form id="articleForm" method="post" action="check_file.php" class="cell_wrap_b">
            <p class="title_applay b_30">发表文章</p>
            <table class="table_applay" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td>
                        <label>
                            <input type="text" id="txt_title" name="txt_title" class="input_applay js_input_applay" placeholder="博客主题" required>
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
                            <textarea name="file" id="file" cols="75" rows="5" class="input_applay input_applay_area js_input_applay" placeholder="博客内容" required></textarea>

                        </label>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <p id="js_tip" class="form_tip"></p>
                        <input type="submit" value="提交" class="btn_submit" id="btn_tj" name="btn_tj" />
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
<script type="text/javascript" src="../js/article.js"></script>
</body>
</html>

