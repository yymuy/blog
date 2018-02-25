<?php
session_start();
header("Content-Type:text/html;charset=utf-8");      //设置头部信息
//isset()检测变量是否设置
if(isset($_POST['ok'])){

    //strtolower()小写函数
    if($_POST['authcode'] == $_SESSION["VerifyCode"]) {
        echo "ok";
    }else{
        echo "no";
    }
}