<?php
include "../../public/db.php";
header("Content-type: text/html; charset=utf-8");



$code=$_POST['code'];
session_start();
if(strtoupper($code)!=$_SESSION['code']){//输入的和图片显示的
    $msg='验证码错误';
    $href="login.php";
    include "message.php";
    exit();//退出脚本 之后的就不用执行了
}
$username=$_POST["ac"];
$password=$_POST["ps"];
$sql="SELECT * FROM my WHERE account='{$username}'";
$r=$db->query($sql);
$r=$r->fetch_array(MYSQLI_ASSOC); //转换成关联数组做判断

if($r){
    if($r["password"]== $password){//删除了加密
        $msg="登录成功";
        $href="index.php";
//        session_start();
        $_SESSION["user"]=$username;
    }else{
        $msg="密码错误";
        $href="login.php";
    }
}else{
    $msg="账号不存在";
    $href="login.php";
}
$db->close();
include "message.php";