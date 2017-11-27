<?php
include "../../public/db.php";
$sql="SELECT * FROM `category` ORDER BY sort ";//以什么排序 ASC默认升序 DESC降序
$r=$db->query($sql);
$r=$r->fetch_all(MYSQLI_ASSOC);
echo json_encode($r);

