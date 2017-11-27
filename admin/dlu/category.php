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
    <h3>栏目管理</h3>
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-bordered text-center" style="table-layout:fixed" >
                <thead>
                    <tr>
                        <td>id</td>
                        <td>栏目名称</td>
                        <td>排序</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot></tfoot>
            </table>
            <a href="addcategory.php" class="btn btn-success">增加</a>


        </div>
    </div>
</div>
</body>
<script src="../../static/js/jquery.js"></script>
<script>
    function reWrite(){
        $.get("selectcategory.php",function(r){
            console.log(r)
            var str='';
            $.each(r,function(index,value){
                str+=`
                <tr id='${value.id}'>
                        <td>${value.id}</td>
                        <td  class="catename">${value.catename}</td>
                        <td  class="sort">${value.sort}</td>
                        <td class='del text-danger'>删除</td>
                </tr>`;
            })
            $('tbody').html(str);
        },"json")
    }
    reWrite();
//删除某个栏目
   $('tbody').on("click",".del",function(){
        var index=$(this).parent().attr('id');
        $.get("delcategory.php",{id:index},function(r){
            if(r=='1'){
                alert("删除成功");
                reWrite();
            }else{
                alert("删除失败");
            }
        })
   })
//    修改栏目内容
    $("tbody").on("dblclick",".sort,.catename",function(){
        var index=$(this).parent().attr('id');
        var attr=$(this).attr("class");
        var oval=$(this).html();
        $(this).html("");
        var input=  $("<input>").val(oval).css({
            width:'100%',
            height:'100%',
            border:"none",
            display:"block",
            textAlign:"center"

        }).appendTo(this);//把jq对象转换原生对象
        input.get(0).focus();
        input.blur(function(){
            var value=$(this).val();
            $.get("updatecategory.php",{index,attr,value},function(r){
                if(r=="1"){
                    alert("修改失败");
                    reWrite();
                }else{
                    alert('修改成功');
                }

            })
        })
    })
</script>
</html>