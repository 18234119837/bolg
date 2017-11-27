<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">

    <style>
*{
    margin: 0;
    list-style: none;
}
html,body{
    width: 100%;
    height: 100%;
    overflow: hidden;
    padding:0;
    margin:0;
}
body{
    display: flex;
    flex-direction: column;
}
header{
            width: 100%;
            height:10%;
            background: #5293F1;
            /*margin-top: 100px;*/
}
header h1{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}
.menu{
    width: 16%;
    background-color: #ccc;
    height: 100%;
    float:left;
    flex-grow: 1;
}
.bottom{
    width: 100%;
    flex-grow: 1;
    height:80%;
}
.content{
    width: 80%;
    float:left;
    height:100%;
    background-color:#fff;
}
.content iframe{
    width: 100%;
    height: 100%;
    display: block;
}
.menu ul li{
    margin:20px;
}



    </style>
    <?php

    session_start();
    if (isset($_SESSION["user"])) {   //开启session
        $user = $_SESSION["user"];
    }
//    else {
//        $msg = '请登录';
//        $href = 'login.php';
//        include 'message.php';
//    }
    ?>

<!--    引入一个bootstrp css-->
</head>

<body>
<header>
    <?php if (isset($user)): ?>
        欢迎<?php echo $user ?>登录
        <a href="loginout.php">退出</a>
    <?php else: ?>
        尚未登录，请 <a href="login.php">登录</a>
    <?php endif; ?>
    <h1>后台的首页</h1>
    <div class="text-right">
        <a href="../../index/index.php" target="_blank" style="color:#fff;"></a>
    </div>
</header>
<!--------------------------------------------->
<div class="bottom">
    <div class="menu">
        <ul>
            <li><a href="changepass.php " target="main"> 密码修改</a></li>
            <li><a href="category.php" target="main"> 栏目管理</a></li>
            <li><a href="content.php" target="main"> 内容管理</a></li>
            <li><a href="banner.php" target="main"> banner管理 </a></li>
        </ul>
    </div>
    <div class="content">
        <iframe src="" frameborder="0" name="main">
        </iframe>
    </div>
</div>
</body>
</html>