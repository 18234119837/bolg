<?php
$id=$_GET['index'];
include "../../public/db.php";
$sql="DELETE FROM content WHERE id=$id";
$db->query($sql);
if($db->affected_rows==1){
    echo "1";
}else{
    echo "0";
}
