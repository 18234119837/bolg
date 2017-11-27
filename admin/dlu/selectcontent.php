<?php
include "../../public/db.php";
$sql="SELECT *  FROM content";
$r=$db->query($sql);
$r=$r->fetch_all(MYSQLI_ASSOC);
echo json_encode($r);
$db->close();