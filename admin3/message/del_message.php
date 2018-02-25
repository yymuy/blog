<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];
$sql="delete from tb_message where id=".$id;
$result=mysql_query($sql);
if($result){
    $sql1="delete from tb_huifup where messageid='$id'";
    $res=mysql_query($sql1);
    if($res){
        echo "<script>alert('删除成功!');window.location.href='messageList.php';</script>";
    }
    else{
        echo "<script>alert('删除操作失败!');history.go(-1);</script>";
    }
}
else{
    echo "<script>alert('删除操作失败!');history.go(-1);</script>";
}
?>



