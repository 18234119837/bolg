<?php
//水印验证码
//$width=180;
//$height=40;
//$img=imagecreatetruecolor($width,$height);//创建画布
//创建颜色 四个参数
//$color=imagecolorallocate($img,255,0,0);
//填充颜色 4个参数
//imagefill($img,0,0,$color);

//字的绘制

//    ttf下载

//header
//header("content-type:image/png");
//imagepng($img);

//$widht=160;
//$height=40;
//$img=imgage
//    利用全局变量获取
//    php中的随机数 随机颜色


//imagefill($img,0,0,getcolor());
//$str="qwertyuipasdfghjklzxcvbnm23456789";
//$len=strlen($str);//用来计算某一个字符串的长度的
//for($i=0;$i<4;$i++){
//    $pos=mt_rand(0,$len-1);
//    substr($str,$pos,1); //截取
////    绘制
//    imagettftext($img,mt_rand(25,35),mt_rand(-10,10),$i*40,mt_rand(30,40),getcolor(type:"d"),fontfile:"")
//
//}
//header("Content-Type:image/png");
//------------------------
$width=100;
$height=32;//显示二维码的画布的大小
$img = imagecreatetruecolor($width,$height);        //创建画布


function getcolor($type="l"){       //获取随机颜色的函数
    $img = $GLOBALS["img"];        //超全局变量获取$img
    if($type=="l"){
        $color = imagecolorallocate($img,mt_rand(130,255),mt_rand(130,255),mt_rand(130,255));
    }else{
        $color = imagecolorallocate($img,mt_rand(0,130),mt_rand(0,130),mt_rand(0,130));
    }
    return $color;
}
imagefill($img,0,0,getcolor());


//画线
for($i=0;$i<10;$i++){
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),getcolor());
}
//画点
for($i=0;$i<30;$i++){
    imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),getcolor());
}


//获取随机的四个内容
$str = "asdfsdvferhtrhdsfer4564651676";
$len=strlen($str);            //计算某一个字符串的长度

$word='';
for($i=0;$i<4;$i++){
    $pos=mt_rand(0,$len-1);
    $leter=substr($str,$pos,1);

    $word.=strtoupper($leter);//不区分大小写的写法

    imagettftext($img,mt_rand(18,20),mt_rand(-30,10),$i*20+10,mt_rand(20,30),getcolor("d"),"../../static/font/font.ttf",$leter);
}

session_start();
$_SESSION['code']=$word;

header("Content-type:image/png");
imagepng($img);
imagedestroy($img);




