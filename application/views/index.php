    <!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.5" />
	<title>麦金思青少儿英语</title>
	<meta name="keywords" content="麦金思,麦金思网,麦金思教育门户,麦金思英语,麦金思青少儿英语,麦金思官网,麦金思英语培训,麦金思教育科技集团,麦金思官方网站,麦金思培训,麦金思集团" />
	<meta name="description" content="想让孩子学好英语吗？麦金思青少儿英语是家长的最好选择！" />
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/index.css.php">
</head>
<body ng-controller="myCtrl">
<!-- 头部 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->

<img src="img/bg.jpg" class="img-responsive bg" alt="">
<div id="carousel">
	<div class="container main-carousel">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <?php $i=0; foreach($carouselInfo as $carousel){
                            $i++;
                            if($i==1){continue;}?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $carousel -> index_id ?>"></li>
                        <?php } ?>

                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo $carouselInfo[0] -> index_carousel ?>" alt="...">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <?php $i=0; foreach($carouselInfo as $carousel){
                            $i++;
                            if($i==1){continue;}?>
                        <div class="item">
                            <img src="<?php echo $carousel -> index_carousel ?>" alt="...">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <?php } ?>
                    </div>

					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span aria-hidden="true"><i class="fa fa-angle-left carousel-direction"></i></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span aria-hidden="true"><i class="fa fa-angle-right carousel-direction"></i></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>			
		</div>
	</div>
	
</div>
<!-- 主体 -->
<div class="container">
    <div class="row">
        <div id="content" class="col-md-10 col-md-offset-1">
            <div class="feature col-md-12 col-sm-12">
                <div class="title">
                    <h1 class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 text-center"><?php echo $dame[0] -> title ?></h1>
                    <p class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center"><?php echo $dame[1] -> title ?></p>
                </div>
                <ul>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[0] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item1.title1' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item1.content1' | translate"></p>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[1] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item2.title2' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item2.content2' | translate"></p>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[2] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item3.title3' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item3.content3' | translate"></p>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[3] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item4.title4' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item4.content4' | translate"></p>
                    </li>
                <!--</ul>
            </div>
            <div class="feature-second col-md-12 col-sm-12">
                <ul>-->
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[4] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item5.title5' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item5.content5' | translate"></p>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[5] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item6.title6' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item6.content6' | translate"></p>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[6] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item7.title7' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item7.content7' | translate"></p>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo $indexInfo[7] -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px">
                        <h2 class="text-center" ng-bind="'Features.item8.title8' | translate"></h2>
                        <p class="{{'JUSTIFY' | translate}}" ng-bind="'Features.item8.content8' | translate"></p>
                    </li>
                </ul>
            </div>                  
        </div>

    </div>
</div>
<!-- 尾部 -->
<?php include 'footer.php'; ?>
<!-- 尾部结束 -->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.goup.min.js"></script>
<script src="js/style.js"></script>
<script>
    $(document).ready(function(){
        $('#content .feature').css({'background-image': 'url(<?php echo $imgs[0] -> img_src ?>)'});
    });
</script>
</body>
</html>

