<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            width:400px;
            height:200px;
            border:1px solid #000;
            color:#000;
            text-align: center;
            margin: 150px auto;
            line-height: 100px;

        }
    </style>
</head>
<body>
    <div class="container">
        <h3><?php echo $msg?></h3>
        本页面会在<span>3</span>S钟之后
        <a href="<?php echo $href?>">跳转</a>
    </div>
</body>
<script>
    var span=document.querySelector("span");
    var a=document.querySelector("a");
    var time=3;
    setInterval(function () {
        time--;
        span.innerHTML=time;
        if(time===0){
            location.href=a.href;
        }
    },2000);
</script>
</html>