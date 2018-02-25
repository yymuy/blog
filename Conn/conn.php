<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/7
 * Time: 14:49
 */
$link=mysql_connect("localhost","root","");
mysql_select_db("db_tmlog",$link);
mysql_query("set names utf8");
//if ($link){
//    echo "连接服务器成功";
//}
?>