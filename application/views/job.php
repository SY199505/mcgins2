<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<title>招聘信息</title>
	<base href="<?php echo site_url();?>">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/job.css">
	<style>

	</style>
</head>
<body ng-controller="myCtrl">
<!-- 头部 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->
<div class="container">
	<div class="row">
		<div id="content" class="col-md-10 col-md-offset-1">
			<img src="<?php echo $imgs[3] -> img_src ;?>" alt="" class="center-block">
			<!--<div class="info col-md-10 col-md-offset-1">
				<p><?php /*echo $dame[7] -> title */?></p>
			</div>-->
			<div class="recruit-teacher">
				<div class="require col-md-10 col-md-offset-1">
					<?php
					foreach($jobInfo as $job){
					?>
						<h3><?php echo $job -> job_title; ?></h3>
						<p><?php echo $job -> job_content; ?></p>
					<?php
					}
					?>
			</div>
			</div>
		</div>
	</div>
</div>
<!-- 尾部 -->
<?php include 'footer.php' ?>
<!-- 尾部结束 -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.goup.min.js"></script>
	<script src="js/style.js"></script>
</body>
</html>

