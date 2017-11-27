<?php
$file=$_FILES['f'];//接收name
//var_dump($file);
//array (size=5)
//'name' => string 'bg-pc.jpg' (length=9)
//  'type' => string 'image/jpeg' (length=10)
//  'tmp_name' => string 'D:\wamp\wamp\tmp\php42D4.tmp' (length=28)
//  'error' => int 0
//  'size' => int 49842
error_reporting(0);//写上 程序不报错误
if(!is_dir("../../upload")){//is_dir;//用来判断某个文件夹是否存在
    mkdir("../../upload");//mkdir();创建一个文件夹
    //.mkdir("./upload");
}
//获取文件的后缀名
//$houzhui=$file["name"];//上传原来的名字
//explode（） 类似js中的split 将字符串转换为数组的形式
//explode() 两个参数 分隔符//"1.png"   ["1","png"]
//array_pop();// 类似于js总 删除数组中最后一个数并返回删除的数
//time(); 获取时间 也可以作为一个名字
$arr=explode(",",$file["name"]);
$houzhui=array_pop($arr);
$filename=md5(time()+mt_rand(0,1000)).".".$houzhui;
//echo $filename;  //经过加密出来的名字
//var_dump(is_uploaded_file($file["tmp_name"]1));
//is_uploaded_file(); 判断文件是否为上传的文件
if(is_uploaded_file($file["tmp_name"])){
    move_uploaded_file($file["tmp_name"],"../../upload/$filename");
//    move_uploaded_file();
//    将某个上传的临时文件移动到另一个文件夹中
    echo "../../upload/".$filename;//返回给 r
}

