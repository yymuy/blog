<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$titleid=$_GET['titleid'];
$sql="delete from tb_filecomment where id=".$id;
$result=mysql_query($sql);
if($result){
    $sql1="delete from tb_huifu where commontid='$id'";
    $res=mysql_query($sql1);
    if($res){
        echo "<script>alert('删除成功!');window.location.href='articleList_de.php?titleid=$titleid';</script>";
    }
    else{
        echo "<script>alert('删除操作失败!');window.location.href='articleList_de.php?titleid=$titleid';;</script>";
    }
}
else{
    echo "<script>alert('删除操作失败!');window.location.href='articleList_de.php?titleid=$titleid';;</script>";
}
?>



