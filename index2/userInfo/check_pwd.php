<?php
error_reporting(0);
session_start();
include "../../Conn/conn.php";
//if($btn_tj<>""){
if(isset($_POST['edit_btn'])){

    $old_pwd=$_POST['old_pwd'];
    $new_pwd=$_POST['new_pwd'];
    $new_pwd1=$_POST['new_pwd1'];

    $rs1=mysql_query("select * from tb_users where id='$_GET[id]'");
    $res=mysql_fetch_array($rs1);

    if($old_pwd != $res['regpwd']){
        echo "<script>alert('输入的旧密码不正确，请重新输入');window.location.href='edit_pwd.php?id=$_GET[id]';</script>";
        exit();
    }else{
        $sql="update tb_users set regpwd='$new_pwd' where id=$_GET[id]";
        $result=mysql_query($sql);

        if($result){
            echo "<script>alert('恭喜您，密码修改成功，请重新登录本系统');window.location.href='../login_reg/login_reg.php';</script>";
            session_unset();    //删除会话
            session_destroy();  //结束会话
        }
        else{
            echo "<script>alert('对不起，密码修改失败!!!');window.location.href='edit_pwd.php?id=$_GET[id]';</script>";
        }
}



}
?>
