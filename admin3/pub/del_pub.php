<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$sql="delete from tb_public where id=".$id;
$result=mysql_query($sql);
if($result){
    echo "<script>alert('删除成功!');window.location.href='pubList.php';</script>";
}
else{
    echo "<script>alert('删除操作失败!');history.go(-1);</script>";
}
?>



