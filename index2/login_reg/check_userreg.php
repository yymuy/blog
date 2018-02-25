<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 14:59
 */

include_once ("../../Conn/conn.php");

if (isset($_POST['reg_btn'])){
    $name=$_POST['username'];
    $password=$_POST['pwd'];
    $password1=$_POST['pwd1'];
    $email=$_POST['email'];
    $fig='0';

//    检测用户名的唯一性
    $sel_sql="select * from tb_users where regname='$name'";
    $sel_num=mysql_num_rows(mysql_query($sel_sql));
    if($sel_num  > 0){
        echo "<script>alert('该用户名已被占用，请重新输入');window.location.href='login_reg.php';</script>";
        exit();
    }

    //    检测邮箱的的唯一性
    $sel_sql1="select * from tb_users where email='$email'";
    $sel_num1=mysql_num_rows(mysql_query($sel_sql1));
    if($sel_num1  > 0){
        echo "<script>alert('该邮箱已被注册，请重新输入');window.location.href='login_reg.php';</script>";
        exit();
    }

    $sql="insert into tb_users(id,regname,regpwd,email,fig) values('','$name','$password','$email','$fig')";
    $rs = mysql_query($sql);
    if ($rs){
        echo "<script>alert('注册成功，去登录');window.location.href='login_reg.php';</script>";
    }
    else{
        echo "<script>alert('注册失败');window.location.href='login_reg.php';</script>";
    }
}