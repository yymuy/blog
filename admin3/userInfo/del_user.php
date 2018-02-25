<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
$user_regname=$_GET['regname'];
$f_sql = "select * from tb_users where regname = ".$user_regname;
$f_rst = mysql_query($f_sql,$link);
$rows = mysql_fetch_array($f_rst);
if($rows[fig] == 1){
    echo "<script>alert('不允许删除管理员');history.go(-1)</script>";
    exit();
}
else{
    $sql="delete from tb_users where regname = ".$user_regname;
    $rs=mysql_query($sql);
    if($rs){



        $sql1="delete from tb_article where author = ".$user_regname;
        $rs1=mysql_query($sql1);

        $sql2="delete from tb_filecomment where username = ".$user_regname;
        $rs2=mysql_query($sql2);

        $sql3="delete from tb_huifu where author = ".$user_regname;
        $rs3=mysql_query($sql3);

        $sql4="delete from tb_message where username = ".$user_regname;
        $rs4=mysql_query($sql4);

        $sql5="delete from tb_huifup where author = ".$user_regname;
        $rs5=mysql_query($sql5);

        if($rs1 || $rs2 ||$rs3 ||$rs4 ||$rs5){
            echo "<script>alert('该用户已被删除');location='userInfoList.php';</script>";
        }




//        echo "<script>alert('该用户已被删除!');location='userInfoList.php';</script>";
    }
    else{
        echo "<script>alert('删除操作失败!');history.go(-1);</script>";
    }
}

?>



