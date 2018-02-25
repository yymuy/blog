<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 14:59
 */

error_reporting(0);
session_start();
include_once ("../../Conn/conn.php");

if (isset($_POST['reg_btn'])){
    $name=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $fig='1';

    //    检测用户名的唯一性
    $sel_sql="select * from tb_users where regname='$name'";
    $sel_num=mysql_num_rows(mysql_query($sel_sql));
    if($sel_num  > 0){
        echo "<script>alert('该用户名已被占用，请重新输入');window.location.href='addUser.php';</script>";
        exit();
    }

    //    检测邮箱的的唯一性
    $sel_sql1="select * from tb_users where email='$email'";
    $sel_num1=mysql_num_rows(mysql_query($sel_sql1));
    if($sel_num1  > 0){
        echo "<script>alert('该邮箱已被注册，请重新输入');window.location.href='addUser.php';</script>";
        exit();
    }

    $sql="insert into tb_users(id,regname,regpwd,email,fig) values('','$name','$password','$email','$fig')";
    $rs = mysql_query($sql);
    if ($rs){
        echo "<script>alert('添加管理员成功');window.location.href='userInfoList.php';</script>";
    }
    else{
        echo "<script>alert('添加管理员操作失败!');history.go(-1);</script>";
    }
}