<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$sql="delete from tb_huifup where id=".$id;
$result=mysql_query($sql);
if($result){
    echo "<script>alert('删除成功!');location='$_SERVER[HTTP_REFERER]';</script>";
}
else{
    echo "<script>alert('删除操作失败!');history.go(-1);</script>";
}
?>



