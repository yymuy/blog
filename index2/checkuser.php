<?php
error_reporting(0);
session_start();
include "../Conn/conn.php";


if(isset($_POST['login_btn'])){
    //strtolower()小写函数
    if($_POST['txt_yan'] == $_SESSION["VerifyCode"]) {
        $name=$_POST[txt_user];
        $pwd=$_POST[txt_pwd];

        $sql=mysql_query("select * from tb_user where regname='".$name."' and regpwd='".$pwd."'");
        $result=mysql_fetch_array($sql);
        if($result!=""){
            $_SESSION[fig]=$result[fig];
            $_SESSION[username]=$name;
            ?>
            <script language="javascript">
                alert("登录成功");window.location.href="index.php";
            </script>
            <?php
        }else{
            ?>
            <script language="javascript">
                alert("对不起，您输入的用户名或密码不正确，请重新输入!");
                window.location.href="index.php";
            </script>
            <?php
        }

    }else{
        $_POST['txt_yan']="";
        echo "<script>alert('验证码错误，请重新输入');
        window.location.href=\"index.php\";
        </script>";
    }
}

?>