<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['add_btn'])){
    $title=$_POST["title"];
    $content=$_POST["content"];
    $now=date("Y-m-d");
    $sql="Insert Into tb_public(id,title,content,pub_time)  Values('','$title','$content','$now')";
    $result=mysql_query($sql);
    if($result){
        echo "<script>alert('公告发布成功!!!');window.location.href='pubList.php';</script>";
    }
    else{
        echo "<script>alert('对不起，公告发布失败!!!');window.location.href='pubList.php';</script>";
    }
}
?>
