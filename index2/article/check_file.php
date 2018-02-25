<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['btn_tj'])){

    if($_SESSION[username] == ""){
        echo "<script>
      alert('对不起，本博客网站只有登录的用户才可以发表博客文章');
      window.location.href='articleList.php';</script>";
    }else{
        $title=$_POST[txt_title];
        $author=$_SESSION[username];
        $content=$_POST[file];
        $now=date("Y-m-d");
        $sql="Insert Into tb_article (title,content,author,now) Values ('$title','$content','$author','$now')";
        $result=mysql_query($sql);
        if($result){
            echo "<script>alert('恭喜您，你的文章发表成功!!!');window.location.href='articleList.php';</script>";
        }
        else{
            echo "<script>alert('对不起，添加操作失败!!!');window.location.href='articleList.php';</script>";
        }
    }



}
?>
