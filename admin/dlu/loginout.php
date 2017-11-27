<?php
header("Content-type: text/html; charset=utf-8");

session_start();
unset($_SESSION['user']);

if(isset( $_SESSION['user']) ){
    $msg='退出失败';
    $href='index.php';
}else{
    $msg='退出成功';
    $href='login.php';
}
include "message.php";


