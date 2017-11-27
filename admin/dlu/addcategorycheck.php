<?php
$catename=$_GET["catename"];
$sort=$_GET["sort"];
include "../../public/db.php";
$sql="INSERT INTO category(catename,sort) VALUES('{$catename}',{$sort})";
echo $sql;
$db->query($sql);
if($db->affected_rows==1){
    echo "1";
}else{
    echo "0";
}
$db->close();