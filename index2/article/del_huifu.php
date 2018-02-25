<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$fileid=$_GET['fileid'];
$sql="delete from tb_huifu where id=".$id;
$result=mysql_query($sql);
if($result){
    echo "<script>alert('删除成功!');window.location.href='huifu_de.php?fileid=$fileid';</script>";
}
else{
    echo "<script>alert('删除操作失败!');window.location.href='huifu_de.php?fileid=$fileid';</script>";
}
?>



