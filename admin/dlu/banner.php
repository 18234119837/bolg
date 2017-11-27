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
        .tusize{
            width: 100px;
            height: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>轮播图管理</h3>
    <div class="row">
        <div class="col-xs-6">
            <table class="table table-bordered text-center ">
                <thead>
                <tr>
                    <td>id</td>
                    <td>大图路径</td>
                    <td>小图路径</td>
                    <td>排序</td>
                    <td>删除</td>
                </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
            <h3>添加内容</h3>
            <form action="" class="form-horizontal"><!--垂直居中-->
                <!--第一块------------------------------>
                <div class="form-group">
                    <!--for 指向那个表单  和label共用 可以在点击lable的时候 实现上传功能-->
                    <label for="one" class="control-label col-xs-4">上传大图</label>
                    <div class="col-xs-8">
                        <input type="file" id="one" class="form-control"  >
                    </div>
                    <div class="col-xs-8 col-xs-offset-4">
                        <div class="showarea" style="border:1px solid #ccc;min-height: 100px"></div>
                        <input type="button" value="上传" class="btn btn-success upload">
                    </div>
                    <input type="hidden" id="hidden1" name="image">
                </div>
            <!--第二块------------------------------->
                <div class="form-group">
                    <!--for 指向那个表单  和label共用 可以在点击lable的时候 实现上传功能-->
                    <label for="two" class="control-label col-xs-4 upload">上传小图</label>
                    <div class="col-xs-8">
                        <input type="file" id="two" class="form-control " >
                    </div>
                    <div class="col-xs-8 col-xs-offset-4">
                        <div class="showarea " style="border:1px solid #ccc;min-height: 100px"></div>
                        <input type="button" value="上传" class="btn btn-success upload">
                    </div>
                    <input type="hidden" id="hidden2" name="simage">
                </div>
            <!--第三块------------>
                <div class="form-group">
                    <lable for="" class="control-label col-xs-4">排序</lable>
                    <div class="col-xs-8 ">
                        <input type="text" value="0" class="form-control" name="sort">
                        <input type="button" value="添加" class="btn btn-success " id="sub">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
<script src="../../static/js/jquery.js"></script>
<script>
    function reWrite() {
        $.ajax({
            url: "selectbanner.php",
            dataType:'json',
            success: function (r) {
                var str = "";
                $.each(r, function (index, value) {
                    str += `
                        <tr id='${value.id}' >
                            <td>${value.id}</td>
                            <td>
                                <img src="${value.image}" alt="" class="tusize">
                            </td>
                            <td>
                                <img src="${value.simage}" alt=""  class="tusize">
                            </td>
                            <td class="gai">${value.sort}</td>
                            <td class="del text-danger">删除</td>
                        </tr>`
                })
                $('tbody').html(str);
            }
        })
    }
    reWrite();
    $(".upload").click(function () {
        var file = $(this).parent().prev().find("input").get(0).files[0];
        if (!file) {
            return;
        }
        var fd = new FormData();
        var showarea = $(this).prev();
        var hidden = $(this).parent().next();
        fd.append("f", file);
        $.ajax({
            url:"upload.php",
            method:'post',
            data:fd,
            contentType:false,
            processData:false,
            success: function (r) {
                $('<img>').attr("src",r).appendTo(showarea);
                hidden.val(r);

            }
        })
    })

    $('#sub').click(function () {
        $.ajax({
            url: "addbanner.php",
            data: $("form").serialize(),
            success: function () {
                if (r == '1') {
                    alert('添加成功');
                    $('input:not(:button)').val('');
                    $('.showarea').empty();
                    reWrite();
                } else {
                    alert('添加失败');
                }
            }
        })
    })
//    删除
    $('tbody').on("click",'.del',function(){
        if(!confirm("确定删除吗？")){
            return;
        }
        var id=$(this).parent().attr('id');
        $.get('delbanner.php',{id},function(r){
            if(r=='1'){
                alert("删除成功");
                reWrite();
            }else{
                alert("删除失败");
            }
        })
    })
    $('tbody').on("dblclick",".gai",function () {
            var id=$(this).parent().attr("id");
            var oval=$(this).html();
            $(this).html("");
            var input= $("<input>").css("padding","0").addClass("form-control").val(oval).appendTo(this);
            console.log(input);
            input.get(0).focus();
            input.blur(function () {
                var nval=$(this).val();


                $.ajax({
                    url:"updatebanner.php",
                    data:{id,sort:nval},
                    success:function (r) {
                        if(r=="1"){
                            alert("修改成功");
                            reWrite();
                        }else {
                            alert("修改失败");
                        }
                    }
                })
            })
        })




</script>
</html>