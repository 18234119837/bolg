<?php
include "header.php";
$id=$_GET['id'];
$sql="SELECT *  FROM content WHERE cid={$id} ORDER BY id DESC 
  LIMIT 0,3";

$r=$db->query($sql);//执行
$r=$r->fetch_all(MYSQLI_ASSOC );//多维数组

$catname=$_GET['cats'];

?>

<div class="container">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

            <?php
            foreach ($r as $v) {
                echo "<div class='page-two-r' >
                    <h3>
                        {$v['title']};
                    </h3>
                    <p>
                        {$v['content']};
                    </p>
                    <div class='btn-more'>详情</div>
                </div>";
            }
            ?>
        </div>

    </div>
</div>

<?php
include "footer.php";
?>

