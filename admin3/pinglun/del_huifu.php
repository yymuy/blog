<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$commontid=$_GET['commontid'];
$sql="delete from tb_huifu where id=".$id;
$result=mysql_query($sql);
if($result){
    echo "<script>alert('删除成功!');window.location.href='pinglunList_de.php?id=$commontid';</script>";
}
else{
    echo "<script>alert('删除操作失败!');history.go(-1);</script>";
}
?>



