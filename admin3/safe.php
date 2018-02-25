<?php
error_reporting(0);
session_start();    //启动会话
session_unset();    //删除会话
session_destroy();  //结束会话
header("location: index.php");
?>