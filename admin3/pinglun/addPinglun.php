<?php
/**
 * Created by PhpStorm.
 * User: yym
 * Date: 2017/4/10
 * Time: 12:15
 */
error_reporting(0);
session_start();
include_once "../../Conn/conn.php"
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
                    <label for="">用户名:</label><input type="text" name="txt_user" class="form-control" />
                    <label for="">密码:</label><input name="txt_pwd" type="password" class="form-control" />
                    <label for="">验证码:</label><input type="text" name="txt_yan" class="form-control" />
                    <img id="captcha_img" src="../code.php?r='+rand()+'" style="width:100px; height:24px" onclick="changing()"/>
                    <input type="submit" class="btn btn-primary" value="登录" name="login_btn" onClick="return f_check(form)" />
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
                        <li><a href="../pub/pubList.php"><i class="icon-font">&#xe008;</i>公告发布</a></li>
                        <li><a href="../article/articleList.php"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="pinglunList.php"><i class="icon-font">&#xe006;</i>评论管理</a></li>
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
                <a href="/jscss/admin/design/">首页</a>
                <span class="crumb-step">&gt;</span>
                <a class="crumb-name" href="/jscss/admin/design/">评论管理</a>
                <span class="crumb-step">&gt;</span><span>添加评论</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="pinglunList_sear.php" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="sel_tj" id="sel_tj">
                                    <option value="username" selected>评论作者</option>
                                    <option value="content">评论内容</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="sel_key" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="Submit" value="查询" type="submit"></td>

                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" action="check_pinglun.php?fileid=<?php echo $_SESSION['acid'];?>" id="myform" method="post">
                <div class="result-content">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>要评论的博客主题：</th>
                            <td>

                                <select name="title" id="title"  class="common-text" style="width: 600px;height: 33px;line-height: 33px;">
                                    <?php
                                    $sql="select * from tb_article";
                                    $rs=mysql_query($sql);
                                    while($result = mysql_fetch_array($rs)) {
                                        $_SESSION["acid"]=$result['id'];
                                        ?>
                                        <option value="<?php echo $result['title'];?>" selected><?php echo $result['title'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>评论内容：</th>
                            <td><textarea name="file" class="common-textarea" id="file" cols="30" style="width: 98%;border-radius: 5px" rows="10" required></textarea></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input name="pinglun_btn" class="btn btn-primary btn6 mr10" value="确定" type="submit">
                                <input class="btn btn6" id="fanhui" value="返回列表" type="button">
                            </td>
                        </tr>
                        </tbody></table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>

<script>
    $(function () {

        $('#fanhui').click(function(){

            window.location.href="pinglunList.php";
        });
    });
</script>
</body>
</html>