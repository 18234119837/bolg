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
        /*.container{*/
            /*width: 100%;*/
        /*}*/
        /*@media screen and (min-width:768px){*/
            /*.container{*/
                /*width:750px;*/
            /*}*/
        /*}*/
    </style>
</head>
<body>
<div class="container">
    <h3>内容管理</h3>
    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="">
                    <td>id</td>
                    <td>标题</td>
                    <td>描述</td>
                    <td>时间</td>
                    <td>内容</td>
                    <td>图片</td>
                    <td>栏目</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot></tfoot>
        </table>
        <a href="selectcontent.php" class="btn btn-success">增加</a>
    </div>
</div>
</body>
<script src="../../static/js/jquery.js"></script>
<script>
    function reWrite() {
        $.get("selectcontent.php",function (r) {
            var str="";
            $.each(r,function(index,value){
                str+=`
                <tr >
                    <td>${value.id}</td>
                    <td>${value.title}</td>
                    <td>${value.description}</td>
                    <td>${value.time}</td>
                    <td>${value.content.slice(0,10)}...</td>
                    <td><img src="${value.image}" alt=""  class="img-responsive"></td>
                    <td>${value.cid}</td>
                    <td id="${value.id}">
                        <a href="updatecontent.php?id=${value.id}" class="btn btn-warning ">修改</a>
                        <a href="##" class="btn btn-danger del">删除</a>
                    </td>
                </tr>`
            })
            $('tbody').html(str);
        },"json")
    }
    reWrite();
    $('tbody').on("click",".del",function(){
        if(!confirm("确定删除吗？")){
            return;
        }
            var id=$(this).parent().attr("id");
        $.get("delcontent.php",{index:id},function(r){
            if(r=="1"){
                alert("删除成功");
                reWrite();
            }else{
                alert("删除成功");
            }
        })
    })
</script>
</html>
