<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];

$ssql="select * from tb_filecomment where fileid=".$id;
$sres=mysql_query($ssql);
$row=mysql_fetch_array($sres);
$hid=$row["id"];


$sql="delete from tb_article where id=".$id;
$result=mysql_query($sql);
if($result){
    $sql1="delete from tb_filecomment where fileid=".$id;
    $res=mysql_query($sql1);
    $num1=mysql_num_rows($res);
    if($res){
        $sql2="delete from tb_huifu where commontid=".$hid;
        $re=mysql_query($sql2);
        $num2=mysql_num_rows($re);
        if($re){
            echo "<script>alert('删除成功!');window.location.href='articleList.php';</script>";
        }
        else{
            echo "<script>alert('删除操作失败3!');history.go(-1);</script>";
        }
    }
    else{
        echo "<script>alert('删除操作失败2!');history.go(-1);</script>";
    }
}
else{
    echo "<script>alert('删除操作失败1!');history.go(-1);</script>";
}
?>



