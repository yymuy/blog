<?php
/**
 * Created by PhpStorm.
 * User: yym
 * Date: 2017/4/10
 * Time: 12:15
 */
error_reporting(0);
session_start();
include_once "../../Conn/conn.php";
include_once "../check_login.php"
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="../js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script >
        function changing(){
            document.getElementById('captcha_img').src="../code.php?"+Math.random();
        }
    </script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix" style="color: red">
        <!--登录-->
        <form action="../checkuser.php" class="form-inline" method="post">
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 5px;margin-left: 5px;color: #fff;">
                <?php if (!isset($_SESSION[username])) { ?>
                    <input type="text" name="txt_user" class="form-control" placeholder="管理员名" />
                    <input name="txt_pwd" type="password" class="form-control" placeholder="管理员密码" />
                    <input type="text" name="txt_yan" class="form-control" placeholder="验证码"/>
                    <img id="captcha_img" src="../code.php?r='+rand()+'" style="width:100px; height:24px" onclick="changing()"/>
                    <input type="submit" class="btn btn-primary" value="登录" name="login_btn" />
                    <input type="reset" class="btn btn4" value="重置" name="reset" />
                    <?php
                } else {
                    ?>
                    <font color="red">管理员:<?php echo $_SESSION[username]; ?></font>&nbsp;&nbsp;&nbsp;

                    <font color="red"> 欢迎您的光临&nbsp;&nbsp;&nbsp;当前时间：<?php echo date("Y-m-d"); ?></font>&nbsp;&nbsp;&nbsp;
                    <a href="../safe.php" style="color: red">退出登录</a>
                    <?php
                }
                ?>
                &nbsp;<a href="safe.php">退出登录</a>
            </div>
        </form>
    </div>
</div>
<div class="container clearfix">

    <!--左边菜单===================================================-->
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="pubList.php"><i class="icon-font">&#xe008;</i>公告管理</a></li>
                        <li><a href="../article/articleList.php"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="../pinglun/pinglunList.php"><i class="icon-font">&#xe006;</i>评论管理</a></li>
                        <li><a href="../message/messageList.php"><i class="icon-font">&#xe006;</i>留言管理</a></li>
                        <li><a href="../userInfo/userInfoList.php"><i class="icon-font">&#xe006;</i>用户管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->

    <!--右边内容-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i>
                <a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span>
                <a class="crumb-name" href="/jscss/admin/design/">公告管理</a>
                <span class="crumb-step">&gt;</span><span>模糊查询</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="sel_tj" id="sel_tj">
                                    <option value="title" selected>公告主题</option>
                                    <option value="content">公告内容</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="sel_key" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="Submit" value="查询" type="submit"></td>
                            <td><input class="btn btn-primary btn2" id="addnew" value="发布公告" type="button"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <div class="crumb-wrap">
                <div class="crumb-list">
                    模糊搜索到的公告列表
                </div>
            </div>
            <?php
            if(isset($_GET["Submit"])) {
                $tj = $_GET["sel_tj"];
                $key = $_GET["sel_key"];

                $perNumber = 6; //每页显示的记录数
                $page = $_GET['page']; //获得当前的页面值
                $count = mysql_query("select count(*) from tb_public where $tj like '%$key%'"); //获得记录总数
                $result = mysql_fetch_array($count);
                $totalNumber = $result[0];
                $totalPage = ceil($totalNumber / $perNumber); //计算出总页数

                $totalcount = mysql_num_rows(mysql_query("select * from tb_public where $tj like '%$key%'"));
                if ($totalcount < 1) {
                    echo "<span style='color: red'>无相关的公告</span>";
                }
                if (!isset($page)) {
                    $page = 1;
                } //如果没有值,则赋值1
                $startCount = ($page - 1) * $perNumber; //分页开始,根据此方法计算出开始的记录
                $rs = mysql_query("select * from tb_public where $tj like '%$key%' limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数
                $num = mysql_num_rows(mysql_query("select * from tb_public"));

                while ($result = mysql_fetch_array($rs)) {
                    $_SESSION['title'] = $result['title'];
                    ?>
                    <table class="insert-tab" width="100%">
                        <tr>
                            <td>
                                <a href="pubList_de.php?id=<?php echo $result['id']; ?>">
                                    <?php echo $result['title']; ?>
                                </a>
                            </td>
                            <td style="float: right">
                                <a href="del_pub.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn2">
                                    删除
                                </a>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <?php
                if ($totalcount > 0) {
                    ?>
                    <div class="list-page">
                    <span class="pull-left">当前页:<?php echo $page; ?>&nbsp;&nbsp;总页数:<?php echo $totalPage; ?>页&nbsp;&nbsp;
            总记录数:<?php echo $totalcount; ?> 条</span>
                    <?php
                    $query = '&sel_tj=' . $tj . '&sel_key=' . $key . '&Submit=' . $_GET['Submit'];
                    if ($page != 1) { //页数不等于1
                        ?>
                        <!--显示上一页-->
                        <a href="pubList_sear.php?page=<?php echo ($page - 1) . $query; ?>">上一页</a>
                        <?php
                    }
                    for ($i = 1; $i <= $totalPage; $i++) {  //循环显示出页面
                        ?>
                        <a href="pubList_sear.php?page=<?php echo $i . $query; ?>"><?php echo $i; ?></a>
                        <?php
                    }
                    if ($page < $totalPage) { //如果page小于总页数,显示下一页链接
                        ?>
                        <!--显示下一页-->
                        <a href="pubList_sear.php?page=<?php echo ($page + 1) . $query; ?>">下一页</a>
                        <?php
                    }
                }
                ?>
                </div>
                <?php
            }
            ?>
        </div>
        <!--            分页条-->
    </div>
    <!--/main-->
    <div style="clear: both"></div>
</div>

<script>
    $(function () {

        $('#addnew').click(function(){

            window.location.href="add.php";
        });
    });
</script>
</body>
</html>