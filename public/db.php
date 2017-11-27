<?php
$db=new mysqli(
    'localhost',
    'root',
    '',
    "blog");
    if($db->errno){
        echo "数据连接有误<br/>".$db->error;
        exit();
    }
    $sql='set names utf8';
    $db->query($sql);
