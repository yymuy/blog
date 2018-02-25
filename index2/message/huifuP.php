<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['huifu_btn'])){

    if($_SESSION[username] == ""){
        echo "<script>
      alert('对不起，本博客网站只有登录的用户才可以对他人的留言进行回复');
      window.location.href='messageList.php';</script>";
    }else{
        $messageid=$_GET['messageid'];
        $title=$_SESSION['messagetitle'];
        $content=$_POST['huifu_text'];
        $author=$_SESSION['username'];
        $datetime=date("Y-m-d");

        $sql="insert into tb_huifup(id,messageid,title,content,author,datetime) VALUES (' ','$messageid','$title','$content','$author','$datetime')";
        $result=mysql_query($sql);
        if($result){
            echo "<script>alert('回复成功!!!');window.location.href='messageList_de.php?id=$messageid';</script>";
        }
        else{
            echo "<script>alert('对不起，回复操作失败!!!');window.location.href='messageList.php';</script>";

        }
    }
}
?>
