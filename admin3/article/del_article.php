<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$id=$_GET['id'];

$ssql="select * from tb_filecomment where fileid='$_GET[id]'";
$sres=mysql_query($ssql);
$row=mysql_fetch_array($sres);
$num=mysql_num_rows($sres);
$hid=$row["id"];

if($num < 1){
    $sql="delete from tb_article where id=".$id;
    $result=mysql_query($sql);
    if($result){
        echo "<script>alert('删除成功!');window.location.href='articleList.php';</script>";
    }else{
        echo "<script>alert('删除操作失败');history.go(-1);</script>";
    }
}
if ($num > 0){
    $sql="delete from tb_article where id=".$id;
    $result=mysql_query($sql);
    if($result){
        $sql1="delete from tb_filecomment where fileid=".$id;
        $res=mysql_query($sql1);
        if($res){
            $sql2="delete from tb_huifu where commontid=".$hid;
            $re=mysql_query($sql2);
            if($re){
                echo "<script>alert('删除成功!');window.location.href='articleList.php';</script>";
            }
            else{
                echo "<script>alert('该文章无回复');history.go(-1);</script>";
            }
        }
        else{
            echo "<script>alert('该文章下无评论');history.go(-1);</script>";
        }
    }
    else{
        echo "<script>alert('删除操作失败');history.go(-1);</script>";
    }
}

?>



