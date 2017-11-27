<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
    <?php
        $id=$_GET['id'];
        include "../../public/db.php";
        $sql='SELECT  *  FROM content WHERE id={$id}';
        $r=$db->query($sql);
        $r=$r->fetch_array(MYSQLI_ASSOC);

        $sql='SELECT * FROM category ORDER BY sort';
        $c=$db->query($sql);
        $c=$c->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <div class="container">
        <h3>内容修改</h3>
        <div class="row">

            <div class="col-xs-6">
                <form action="" class="form-horizontal">

                    <div class=" form-group">
                        <label for="id" class="control-label col-xs-4">id</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="id" value="<?php echo $r['id']?>" readonly>
                        </div>
                    </div>


                    <div class=" form-group">
                        <label for="title" class="control-label col-xs-4">标题</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="title"  value="<?php echo $r['title']?>">
                        </div>
                    </div>


                    <div class=" form-group">
                        <label for="description" class="control-label col-xs-4">描述</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="description"  value="<?php echo $r['description']?>">
                        </div>
                    </div>

                    <div class=" form-group">
                        <label for="time" class="control-label col-xs-4">时间</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="time"  value="<?php echo $r['time']?>">
                        </div>
                    </div>

                    <div class=" form-group">
                        <label for="content" class="control-label col-xs-4">内容</label>
                        <div class="col-xs-8">
                            <textarea name="" class="form-control" id="content" cols="15" rows="10" style="resize:none"><?php echo $r["content"]; ?></textarea>
                        </div>
                    </div>


                    <div class=" form-group">
                        <label for="image" class="control-label col-xs-4">图片</label>
                        <div class="col-xs-8">
                            <input type="file"  class="form-control" id="image" >
                        </div>
                        <div class="col-xs-8 col-xs-offset-4" >
                            <div style="border:1px solid red;"    >
                                <img src="<?php echo $r["image"] ?>" alt="">
                            </div>
                            <input type="hidden" value=""><!--隐藏域-->
                        </div>
                        <div class="col-xs-8 col-xs-offset-4" >
                            <button class="btn btn-success">上传</button>
                        </div>
                    </div>


                    <div class=" form-group">
                        <label for="id" class="control-label col-xs-4">所属栏目</label>
                        <div class="col-xs-8">
                            <select name="" id="cid" class="form-control">
                                <?php
                                    foreach ($c as $v){
                                        if($v['id']==$r['id']){
                                            echo "<option value='{$v['id']}' selected>{$v['catename']}</option>";
                                        }else{
                                            echo "<option value='{$v['id']}'>{$v['catename']}</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-xs-offset-4">
                            <input type="button" class="btn btn-success" value="提交">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>