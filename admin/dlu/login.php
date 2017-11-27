<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            list-style: none;
            outline: none;
            box-sizing: border-box;
            text-decoration:none;
            color:#000;
        }
        body{
            background: url('../../static/img/bg-pc.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        label.error{
            color:red;
            font-size: 14px;
            margin-left: 4px;
        }
        input.error{
           /*outline:1px solid indianred;*/
        }
        form{
            width: 500px;
            height: 320px;
            margin:150px auto;
            background: rgba(255,255,255,0.5);
            border-radius: 8px;
            padding:30px 70px;
        }
        h2{
            text-align: center;
            margin-bottom: 35px;
        }
        form ul{
            width: 100%;
            height: 100%;
        }
        form ul li{
            width: 100%;
            height: 50px;
            font-size: 16px;
        }
        .btn{
            width: 68px;
            height: 30px;
            background: #5191F2;
            border:none;
            float: left;
            margin-left: 67px;
            display: block;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        #myform li .btn{
            font-size: 14px;
        }
        .txt{
            width: 200px;
            height: 30px;
            background: #fff;
            outline: none;
            border-radius: 4px;
            padding:2px 8px;
            margin-left: 3px;
        }
        .yanzheng-txt{
            float: left;
        }
        .yanzheng{
            width: 90px;
            height: 30px;
            float: left;
            border-radius: 4px;
            padding:2px 8px;
            margin-left: 5px;
            line-height: 32px;
        }
        img{
            width: 100px;
            height: 30px;
            margin-left: 10px;
            float: left;
        }

    </style>
</head>
<body>
<!--登录界面-->
<form action="checklogin.php" method="post" id="myform">
    <h2>用户登录界面</h2>
    <ul>
        <li>用户名：
            <input type="text" name="ac" class="txt">
        </li>
        <li>密&nbsp;&nbsp;&nbsp;码：
            <input type="password" name="ps" class="txt"></li>
        <li class="yanzheng-box">
            <span class="yanzheng-txt">验证码：</span>
            <input type="text" name="code" class="yanzheng">
            <img src="code.php" alt=""  width="180px" height="40px" onclick="this.src='code.php?='+Math.random()">
        </li>
        <li>
            <input type="submit" value="登录" class="btn">
            <a href="sign.html" class="btn">注册</a>
        </li>
        <!--<li>还没注册，请-->
            <!--<a href="sign.html">注册</a>-->
        <!--</li>-->
    </ul>
</form>

<!--插件：calidate  关于验证的 -->
<!--<script src="jquery.min.js"></script>-->
<script src="../../static/js/jquery.js"></script>
<script src="../../static/js/jquery.validate.js"></script>
<script src="../../static/js/messages_zh.js"></script>
<script>
    $.validator.addMethod("account",function(value){
        var reg=/^[0-9a-zA-Z]{6,8}$/;
        return reg.test(value);
    },"请输入6-10位字母或者数字");

    $('#myform').validate({
        rules:{//需要验证
            ac:{required:true},
            ps:{required:true},
        },
        messages:{//这里面自己写自己要改的东西
            ac:{required:'请填写账号'},
            ps:{required:'请填写密码'}
        },
//        errorElement:"span",
//        errorPlacement:function(){
//        }

    })

</script>
</body>
</html>