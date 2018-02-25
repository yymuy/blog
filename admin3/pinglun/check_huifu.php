<?php
date_default_timezone_set("Asia/Shanghai");
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['huifu_btn'])){
//    echo "<script>alert('7777');</script>";
    $commontid=$_GET['commontid'];
    $content=$_POST['huifu_text'];
    $author=$_SESSION['username'];
    $datetime=date("Y-m-d");

    $sql="insert into tb_huifu(id,commontid,content,author,datetime) VALUES (' ','$commontid','$content','$author','$datetime')";
    $result=mysql_query($sql);
    if($result){
        echo "<script>alert('回复成功!!!');window.location.href='pinglunList_de.php?id=$commontid';</script>";
    }
    else{
        echo "<script>alert('对不起，回复操作失败!!!');window.location.href='pinglunList.php';</script>";

    }
}
?>
