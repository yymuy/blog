<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";

if(isset($_POST["delAll"])){

    $ids=$_POST["ids"];

    $str = implode("','",$ids);//拼接字符
    echo "99".$str;
    $sql="delete from tb_article where id in ('{$str}')";
    $result=mysql_query($sql);
    if($result){
//        $sql1="delete from tb_filecomment where fileid in ('{$str}')";
//        $res=mysql_query($sql1);
//        if($res){
//            $sql2="delete from tb_huifu where commontid in ('{$str}')";;
//            $re=mysql_query($sql2);
//            if($re){
//                echo "<script>alert('删除成功!');window.location.href='articleList.php';</script>";
//            }
//            else{
//                echo "<script>alert('删除操作失败!');history.go(-1);</script>";
//            }
//        }
//        else{
//            echo "<script>alert('删除操作失败!');history.go(-1);</script>";
//        }

        echo "<script>alert('删除成功!');history.go(-1);</script>";
    }
    else{
        echo "<script>alert('删除操作失败!');history.go(-1);</script>";
    }
}

?>



