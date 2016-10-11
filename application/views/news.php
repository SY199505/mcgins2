<!DOCTYPE html>
<html lang="en" ng-app="myApp">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>最新动态</title>
		<base href="<?php echo site_url();?>">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/news.css">
	</head>
	<body ng-controller="myCtrl">
		<!-- 头部 -->
		<?php include 'header.php'; ?>
		<!-- 头部结束 -->
		<div class="container">
			<div class="row">
				<img src="<?php echo $imgs[5] -> img_src ;?>" id="write" class="img-responsive  col-md-10 col-md-offset-1" alt="">
				
			</div>
			<div class="row">
				<div class="col-md-7 col-md-offset-1" style="padding:0;">
					<div id="share-pic"></div>
					<ul id="share" >
					<?php 
						$i = 0;
						foreach($activityInfo as $activity){
					?>

						<li>
							<a href="welcome/article/<?php  echo $activity -> activity_id;?>">
								<img style="width:230px;height:128px;" src="<?php  echo $activity -> activity_img;?>" class="img-responsive center-block col-md-4 col-xs-12" alt="">
								<div class="col-md-7  text-center ">
									<h4><?php  echo $activity -> activity_title;?></h4>
									<p><?php  echo mb_substr($activity -> activity_content, 0,100)."......";?></p>
								</div>
							</a>
						</li>

					<?php 
						}
					;?>
					</ul>
					

				<!-- <div class="panel-footer"> -->
				    <kbd>共有<?php echo $news_total;?>篇文章</kbd>
				     
				    <nav>
				         <?php echo $this -> pagination -> create_links();?>
				    </nav>
    			<!-- </div> -->

				</div>
				<div class="col-md-3" style="padding:0;">
					<div id="active-pic"></div>
					<div id="active">
						<?php
						$i = 0;
						foreach($barginInfo as $bargin){
						?>
						<a href="welcome/bargin/<?php  echo $bargin -> bargin_id;?>"><img src="<?php  echo $bargin -> bargin_img;?>" class="col-md-12 img-responsive" alt=""></a>

						<?php
						}
						;?>
					</div>
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
		<script>
			$('#share p img').css('display', 'none');
		</script>
		</body>
	</html>