<?php
include "../../public/db.php";
$image=$_GET['image'];
$simage=$_GET['simage'];
$sort=$_GET['sort'];//排序中的ID
$sql="INSERT INTO  banner (image,simage,sort) VALUES ('{$image}','{$simage}','{$sort}' )";
$db->query($sql);//执行
if($db->affected_rows==1){
    echo "1";
}else{
    echo "0";
}
$db->close();