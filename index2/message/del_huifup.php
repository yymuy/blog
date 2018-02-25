<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$messageid=$_GET['messageid'];
$sql="delete from tb_huifup where id=".$id;
$result=mysql_query($sql);
if($result){
    echo "<script>alert('删除成功!');window.location.href='messageList_de.php?id=$messageid';</script>";
}
else{
    echo "<script>alert('删除操作失败!');history.go(-1);</script>";
}
?>



