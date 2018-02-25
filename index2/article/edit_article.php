<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['edit_btn'])){

        $title=$_POST['edit_title'];
        $author=$_SESSION[username];
        $content=$_POST['edit_content'];
        $now=date("Y-m-d");
        $sql="update tb_article set title='$title',content='$content', now='$now' where id=$_GET[id]";
        $result=mysql_query($sql);
        if($result){
            echo "<script>alert('恭喜您，你的文章编辑成功!!!');window.location.href='articleList.php';</script>";
        }
        else{
            echo "<script>alert('对不起，编辑操作失败!!!');window.location.href='articleList.php';</script>";
        }
    }
?>
