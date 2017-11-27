<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h3>添加栏目</h3>
    <div class="row">
        <div class="col-sm-6">
            <form class="form-horizontal" id="myform">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">栏目名称</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="栏目名称" name="catename"    >
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">栏目排序</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="栏目排序"  name="sort"  >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="button" class="btn btn-success" id="sub">确定</button>
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
    $("#myform").validate({
        rules:{
            catename:{
                required:true,
            },
            sort:{
                required:true,
                digits:true,//表示整数
            }
        },
        messages:{
            catename:{
                required:"栏目名称必须填写",
            },
            sort:{
                required:"栏目排序必须填写",
                digits:"栏目排序必须为整数"//表示整数
            }
        }
    })
    $("#sub").click(function(){
        if(!$("#myform").valid()){
            return;//没有填写的时候不会发送ajax请求
        }
        var str=$("#myform").serialize();
        console.log(str);
        $.ajax({
            url:"addcategorycheck.php",
            data:str,
            success:function(r){
                if(r==="1"){
                    alert("插入失败");
                }else{
                    alert("插入成功");
                    location.href="category.php";
                }
            }
        })
    })
</script>



</html>