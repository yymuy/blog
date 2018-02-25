<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['message_btn'])){
    if($_SESSION[username] == ""){
        echo "<script>
      alert('对不起，本博客网站只有登录的用户才可以进行在线留言');
      window.location.href='messageList.php';</script>";
    }else{
        $title=$_POST['title'];
        $content=$_POST['content'];
        $author=$_SESSION[username];
        $datetime=date("Y-m-d");

        $sql="insert into tb_message(id,title,content,username,datetime) VALUES (' ','$title','$content','$author','$datetime')";
        $result=mysql_query($sql);
        if($result){
            echo "<script>alert('添加留言成功!!!');window.location.href='messageList.php';</script>";
        }
        else{
            echo "<script>alert('对不起，添加留言操作失败!!!');window.location.href='articleList.php';</script>";

        }
    }
}
?>
