<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/my.css">
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <link rel="stylesheet" href="../static/css/swiper.min.css">
    <style>
        .swiper-container {
            width: 100%;
            height: 450px;
            background: #ccc;
        }
        .swiper-slide li img{
            width: 100%;
            height: 100%;
        }
    </style>
    <?php
    include "../public/db.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        $id=0;
    }
    //  获取导航
    $sql="SELECT * FROM category  ORDER BY sort";
    $r=$db->query($sql);
    $cats=$r->fetch_all(MYSQLI_ASSOC);
    //  banner
    $sql="SELECT * FROM banner ORDER BY sort";
    $r=$db->query($sql);
    $banners=$r->fetch_all(MYSQLI_ASSOC);

    //        $sql="SELECT * FROM content  WHERE cid=1 ORDER BY id DESC LIMIT 0,3";
    //        $db->query($sql);
    //        $html=$r->fetch_all(MYSQLI_ASSOC);

    //    $sql="SELECT *FROM content WHERE cid=3 ORDER BY id DESC LIMIT 0,2";
    //    $r=$db->query($sql);
    //    $css=$r->fetch_all(MYSQLI_ASSOC);

    ?>
</head>
<body>
<!--导航开始-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">个人博客</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">首页 </a></li>
                <?php
                foreach ($cats as $v){
                    if($v["id"]==$id){
                        echo "<li class='active'><a href='list.php?id={$v['id']}&cats={$v['catename']}'>{$v['catename']}</a></li>";
                    }else{
                        echo "<li><a href='list.php?id={$v['id']}&cats={$v['catename']}'>{$v['catename']}</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!--导航结束-->