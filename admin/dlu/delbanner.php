<?php
$id=$_GET['id'];
include "../../public/db.php";
$sql="DELETE FROM banner WHERE id={$id}";
$db->query($sql);
if($db->affected_rows==1){
    echo "1";
}else{
    echo "0";
}
$db->close();

