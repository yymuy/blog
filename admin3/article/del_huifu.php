<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$aid=$_GET['aid'];
$sql="delete from tb_huifu where id=".$id;
$result=mysql_query($sql);
if($result){
    echo "<script>alert('删除成功!');window.location.href='huifu_de.php?id=$aid';</script>";
}
else{
    echo "<script>alert('删除操作失败!');window.location.href='huifu_de.php?id=$aid';</script>";
}
?>



