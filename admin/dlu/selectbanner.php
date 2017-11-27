<?php
include "../../public/db.php";
$sql="SELECT *  FROM banner ORDER BY sort";
$r=$db->query($sql);//执行
$r=$r->fetch_all(MYSQLI_ASSOC );//多维数组
echo json_encode($r);//json格式的字符串
$db->close();