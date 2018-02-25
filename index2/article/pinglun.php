<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['pinglun_btn'])){

    if($_SESSION[username] == ""){
        echo "<script>
      alert('对不起，本博客网站只有登录的用户才可以对博客文章进行评论');
      window.location.href='articleList.php';</script>";
    }else{
        $fileid=$_GET['fileid'];
        $content=$_POST['pinglun_text'];
        $author=$_SESSION[username];
        $datetime=date("Y-m-d");

        $sql="insert into tb_filecomment(id,fileid,content,username,datetime) VALUES (' ','$fileid','$content','$author','$datetime')";
        $result=mysql_query($sql);
        if($result){
            echo "<script>alert('评价成功!!!');window.location.href='articleList_de.php?id=$fileid';</script>";
        }
        else{
            echo "<script>alert('对不起，评价操作失败!!!');window.location.href='articleList_de.php?id=$fileid';</script>";

        }
    }
}
?>
