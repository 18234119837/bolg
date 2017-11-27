<?php
$id=$_GET['id'];
$attr=$_GET["attr"];
$val=$_GET['value'];
include  "../../public/db.php";
$sql="UPDATE  category SET {$attr}='{$val}' WHERE id={$id}";
$db->query($sql);
if($db->affected_rows==1){
    echo "1";

}else{
    echo "0";
}
$db->close();