<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title></head>
<link rel="stylesheet" href="../../static/css/bootstrap.css">
<?php
    include "../../public/db.php";
    $sql="SELECT account FROM my ";
//    注意改
$r=$db->query($sql);//记得改mysqli
$r=$r->fetch_array(MYSQLI_ASSOC)//获取到admin123

//$db->close();
?>

<body>

<div class="container">
    <h3>密码修改</h3>
    <div class="row">
        <div class="col-sm-6">
<!--            直接应用-->
            <form class="form-horizontal" id="myform"  action="newpass.php"         >
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">用户名</label>
                    <div class="col-sm-8">
<!--                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
                        <?php echo $r["account"]?>
                    </div>
                </div>



                <div class="form-group">
                    <label for="inputPassword1" class="col-sm-4 control-label">原始密码</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword1" placeholder="Password"     name="originalpass">
                    </div>
                </div>



                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-4 control-label">新密码</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="newpass">
                    </div>
                </div>



                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">再次确认密码</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="againnewpass">
                    </div>
                </div>



<!--                <div class="form-group">-->
<!--                    <div class="col-sm-offset-2 col-sm-10">-->
<!--                        <div class="checkbox">-->
<!--                            <label>-->
<!--                                <input type="checkbox"> Remember me-->
<!--                            </label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default btn-danger">确认修改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="../../static/js/jquery.js"></script>
<script src="../../static/js/jquery.validate.js"></script>
<script>
    $.validator.addMethod("ps",function(val){
        var reg=/^[a-zA-Z0-9]{6,8}$/;
        return reg.test(val);
    },"请输入符合规范的内容");
    $("#myform").validate({
        rules:{
            originalpass:{
                required:true,
                ps:true,
            },
            newpass:{
                required:true,
                ps:true,
            },
            againnewpass:{
                required:true,
                equalTo:"#inputPassword2" ,
            }
        },
        messages:{
            originalpass:{
                required:"请输入原始密码",
            },
            newpass:{
                required:"请输入新的密码",
            },
            againnewpass:{
                required:"请再次输入新的密码",
                equalTo:"请输入相同的密码"
            }

        },
        errorElement:"span",    //    放置错误的属性
        errorPlacement:function (error,ele) {
            ele.parent().append(error)
        }
    })
//    -----------------------------






</script>
</html>