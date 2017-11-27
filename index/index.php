<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/my.css">
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <link rel="stylesheet" href="../static/css/swiper.min.css">
    <style>
        .swiper-container {
            width: 100%;
            height: 450px;
            background: #ccc;
        }
        .swiper-slide li img {
            width: 100%;
            height: 100%;
        }
        .addfloat {
            float: left;
        }
    </style>
    <?php
    include "../public/db.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = 0;
    }
    //        获取导航
    $sql = "SELECT * FROM category  ORDER BY sort";
    $r = $db->query($sql);
    $cats = $r->fetch_all(MYSQLI_ASSOC);
//           var_dump($cats);

    $sql = "SELECT * FROM banner ORDER BY sort";
    $r = $db->query($sql);
    $banners = $r->fetch_all(MYSQLI_ASSOC);


    $sql = "SELECT * FROM content  WHERE cid=1 ORDER BY id DESC LIMIT 0,2";
    $db->query($sql);
    $html = $r->fetch_all(MYSQLI_ASSOC);


    $sql = "SELECT * FROM content WHERE cid=5 ORDER BY id DESC LIMIT 0,2";
    $r = $db->query($sql);
    $css = $r->fetch_all(MYSQLI_ASSOC);

    $sql = "SELECT * FROM content WHERE cid=7 ORDER BY id DESC LIMIT 0,2";
    $r = $db->query($sql);
    $js = $r->fetch_all(MYSQLI_ASSOC);


    ?>
</head>
<body>
<!--导航开始-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">个人博客</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页 </a></li>
                <?php
                foreach ($cats as $v) {
                    if ($v["id"] == $id) {
                        echo "<li class='active'><a href='list.php?id={$v['id']}&cats={$v['catename']}'>{$v['catename']}</a></li>";
                    } else {
                        echo "<li><a href='list.php?id={$v['id']}&cats={$v['catename']}'>{$v['catename']}</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!--导航结束-->
<!--banner 开始-->
<div class="container">
    <div class="row">
        <div class="swiper-container col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding:0">
            <div class="swiper-wrapper">
                <?php
                foreach ($banners as $v) {
                    echo "<div class='swiper-slide'><img src='11-16blog/{$v['image']}' alt='' width='100%'></div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--banner 结束-->
<!--三个大图开始-->
<div class="container-fluid ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
                <div class="more-img-title">
                    <h2>PAGES</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="item">
                <div class="txt-box" >
                    <h3 style="padding:20px 10px 0">HTML基础知识</h3>
                    <?php
                    foreach ($js as $v) {
                        echo "<div class=\"txt-inner-box\">
                        <div style='font-size: 18px;padding-bottom: 4px;' >{$v['title']}</div>
                        <p>{$v['description']}</p>
                        <h5>{$v['time']}</h5>
                    </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="item">
                <div class="txt-box" >
                    <h3 style="padding:20px 10px 0">CSS基础知识</h3>
                    <?php
                    foreach ($css as $v) {
                        echo "<div class=\"txt-inner-box\">
                        <div style='font-size: 18px;padding-bottom: 4px;' >{$v['title']}</div>
                        <p>{$v['description']}</p>
                        <h5>{$v['time']}</h5>
                    </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="item">
                <div class="txt-box" >
                    <h3 style="padding:20px 10px 0">JS基础知识</h3>
                    <?php
                    foreach ($js as $v) {
                        echo "<div class=\"txt-inner-box\">
                        <div style='font-size: 18px;padding-bottom: 4px;' >{$v['title']}</div>
                        <p>{$v['description']}</p>
                        <h5>{$v['time']}</h5>
                    </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--三个大图结束-->
<!--关于我开始-->
<div class="container">
    <div class="row ">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
            <div class="page-two-r">
                <h3>ABOUT ME</h3>
                <p>I'm a passionate designer, ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. In 2015, quis nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehe in voluptate velit esse cillum
                    dolore eu.</p>
                <div class="btn-more">详情</div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
            <div class="page-two-r">
                <h3>ABOUT ME</h3>
                <p>I'm a passionate designer, ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. In 2015, quis nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehe in voluptate velit esse cillum
                    dolore eu.</p>
                <div class="btn-more">详情</div>
            </div>
        </div>
    </div>
</div>
<!--关于我结束-->

<!--图片区域标题开始-->
<div class="container-fluid ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
                <div class="more-img-title">
                    <h2>PORTFOLIO</h2>
                    <p>Out believe has request not how comfort evident. Up delight cousins we feeling
                        <br>minutes. Genius has looked end piqued spring.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
<!--图片区域标题结束-->
<!--图片区域内容开始-->
<div class="container del-xia">
    <div class="row">
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 ">
            <div class="img-box">
                <a href="##">
                    <img src="../static/img/all.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 ">
            <div class="img-box">
                <a href="##">
                    <img src="../static/img/all.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 ">
            <div class="img-box">
                <a href="##">
                    <img src="../static/img/all.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<!--图片区域第二行-->
<div class="container add-margin-bottom" id="del-shang">
    <div class="row">
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 ">
            <div class="img-box">
                <a href="##">
                    <img src="../static/img/all.jpg" alt="">
                </a>

            </div>
        </div>
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 ">
            <div class="img-box">
                <a href="##">
                    <img src="../static/img/all.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4  col-sm-4 col-xs-12 ">
            <div class="img-box">
                <a href="##">
                    <img src="../static/img/all.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<!--图片区域图片结束-->


</body>
<script src="../static/js/swiper.min.js"></script>
<script src="../static/js/myswiper.js"></script>
</html>