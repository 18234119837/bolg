<?php
$opass=$_GET["originalpass"];
$npass=$_GET["newpass"];
include "../../public/db.php";
$sql="SELECT password FROM my";
$r=$db->query($sql);
$r=$r->fetch_array(MYSQLI_ASSOC);//转换为一维数组
if($opass!=$r["password"]){
    $msg="原始密码错误";
    $href="changepass.php";
    include "message.php";
    exit();
}
$sql="UPDATE my SET password='{$npass}'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="修改成功";
    $href="changepass.php";
}else{
    $msg="修改失败或者没有修改";
    $href="changepass.php";
}

include "message.php";
$db->close();//关闭数据库