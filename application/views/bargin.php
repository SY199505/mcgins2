<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>文章内容</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bargin.css">
</head>
<body ng-controller="myCtrl">
<!-- 头部 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->
<div class="container">
    <div class="row">
        <img src="img/write.jpg" id="write" class="img-responsive  col-md-10 col-md-offset-1" alt="">


    </div>
    <div class="row">
        <h3 class="col-md-7 col-md-offset-1 text-center"><?php  echo $bargin -> bargin_title;?></h3>
        <div id="pink" class="col-md-3"></div>
    </div>
    <div class="row" style="margin-bottom: 50px;">
        <h4 class="col-md-7 col-md-offset-1 text-center">发布日期：<?php  echo $bargin -> add_time;?></h4>
        <div class="content col-md-7 col-md-offset-1">
            <?php  echo $bargin -> bargin_content;?>
        </div>

        <div id="active" class="col-md-3">
            <?php
            $i = 0;
            foreach($activityInfo as $activity){
            ?>
            <a href="welcome/article/<?php  echo $activity -> activity_id;?>">
                <img style="width:230px;height:128px;" src="<?php  echo $activity -> activity_img;?>" class="img-responsive center-block col-md-4 col-xs-12" alt="">
            </a>
            <?php
            }
            ;?>

        </div>

    </div>
</div>
<!-- 尾部 -->
<?php include 'footer.php' ?>
<!-- 尾部结束 -->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.goup.min.js"></script>
<script src="js/style.js"></script>
</body>
</html>