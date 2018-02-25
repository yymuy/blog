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
                <a href="/jscss/admin/design/">首页</a>
                <span class="crumb-step">&gt;</span>
                <a class="crumb-name" href="/jscss/admin/design/">公告管理</a>
                <span class="crumb-step">&gt;</span><span>发布公告</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="pubList_sear.php" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="sel_tj" id="sel_tj">
                                    <option value="title" selected>公告主题</option>
                                    <option value="content">公告管理</option>
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
                <form name="myform" action="check_add.php" id="myform" method="post">
                    <div class="result-content">
                        <table class="insert-tab" width="100%">
                            <tbody>
                            <tr>
                                <th><i class="require-red">*</i>公告主题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>公告内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="20" style="width: 98%;border-radius: 5px;" rows="10" required></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input name="add_btn" class="btn btn-primary btn6 mr10" value="确定" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回列表" type="button">
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                </form>
            </div>
    </div>
    <!--/main-->
</div>

</body>
</html>