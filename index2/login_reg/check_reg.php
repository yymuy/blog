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
    $realusername=$_POST['realusername'];
    $password=$_POST['password'];
    $birth=$_POST['birth'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $photo=$_POST['photo'];

    $sex=$_POST['sex'];
    $qq=$_POST['qq'];
    $homepage=$_POST['homepage'];
    $sign=$_POST['sign'];
    $introduce=$_POST['introduce'];
    $ip=$_SERVER["REMOTE_ADDR"];
    $fig='0';

    $sql="insert into tb_user(id,regname,regrealname,regpwd,regbirthday,regemail,regcity,regico,regsex,regqq,reghomepage,regsign,regintroduce,ip,fig) 
                        values('','$name','$realusername','$password','$birth','$email','$city','$photo','$sex','$qq','$homepage','$sign','$introduce','$ip','$fig')";
    $rs = mysql_query($sql);
    if ($rs){
        echo "注册成功";
    }
}