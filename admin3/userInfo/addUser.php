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
    <style>
        .error{
            color: red;
        }
    </style>
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
                        <li><a href="../pub/pubList.php"><i class="icon-font">&#xe008;</i>公告管理</a></li>
                        <li><a href="../article/articleList.php"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="../pinglun/pinglunList.php"><i class="icon-font">&#xe006;</i>评论管理</a></li>
                        <li><a href="../message/messageList.php"><i class="icon-font">&#xe006;</i>留言管理</a></li>
                        <li><a href="userInfoList.php"><i class="icon-font">&#xe006;</i>用户管理</a></li>
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
                <a class="crumb-name" href="/jscss/admin/design/">用户管理</a>
                <span class="crumb-step">&gt;</span><span>添加管理员</span></div>
        </div>
        <div class="result-wrap">
            <div class="search-wrap">
                <div class="search-content">
                    <form action="userInfoList_sear.php" method="get">
                        <table class="search-tab">
                            <tr>
                                <th width="120">选择分类:</th>
                                <td>
                                    <select name="sel_tj" id="">
                                        <option value="regname">用户名</option>
                                        <option value="email">邮箱</option>
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
                <form name="myform" action="check_user.php" id="addForm" method="post">
                    <div class="result-content">
                        <table class="insert-tab" width="100%">
                            <tbody>
                            <tr>
                                <th><i class="require-red">*</i>管理员名：</th>
                                <td>
                                    <input class="common-text required" id="username" name="username" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>管理员密码：</th>
                                <td>
                                    <input class="common-text required" id="pass" name="password" size="50" value="" type="password">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>管理员邮箱：</th>
                                <td>
                                    <input class="common-text required" id="email" name="email" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input name="reg_btn" class="btn btn-primary btn6 mr10" value="确定" type="submit">
                                    <input class="btn btn6" value="重置" type="reset">
                                    <input class="btn btn6" id="fanhui" value="返回列表" type="button">
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
<script type="text/javascript" src="../js/addAdmin.js"></script>
<script>
    $(function () {

        $('#fanhui').click(function(){

            window.location.href="userInfoList.php";
        });
    });
</script>
</body>
</html>