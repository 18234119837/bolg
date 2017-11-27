<?php
$id=$_GET['id'];
$sort=$_GET["sort"];
include  "../../public/db.php";
$sql="UPDATE  banner SET sort='{$sort}' WHERE id={$id}";
$db->query($sql);
if($db->affected_rows==1){
    echo "1";
}else{
    echo "0";
}
$db->close();
//ajax 请求和表单请求

