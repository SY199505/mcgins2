<!DOCTYPE html>
<html lang="en" ng-app="myApp">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>关于我们</title>
		<base href="<?php echo site_url();?>">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/intro.css">
	</head>
	<body ng-controller="myCtrl">
		<!-- 头部 -->
		<?php include 'header.php'; ?>
		<!-- 头部结束 -->
		<div class="container">
			<div class="row">
				<div id="banner" class="col-md-10 col-md-offset-1" style="background-image:url(<?php echo $imgs[1] -> img_src ;?>); background-repeat: no-repeat; ">
					<img src="img/logo1.png" class="img-responsive center-block" alt="">
					<!-- <p class="col-md-8 col-md-offset-2 ">麦金思青少儿英语（McGins English Education）是由在美国从事TESL教学与研究数年的国内外教育专
						家及一线英语教师团队，专为中国青少年儿童打造的英语学习项目，帮助中国孩子实现英语运用能力和应试水平双提
						升。麦金思旨在把美国的ESL教育理念和方式，转化为适应中国孩子英语学习特点和实际需求的教育模式。美国教育
						界有学者提出，“若要适应未来国际社会的不确定性挑战、成为世界公民，各国儿童应当从小被有意识地被培养成为
						‘3IN’人才”。麦金思通过英语引导青少年儿童建立世界观和人生格局，成为未来国际社会需要的独立、国际化、
					跨文化的“3IN”人才。</p> -->
					<p class="col-md-8 col-md-offset-2" ng-bind="'ABOUT_US' | translate"></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div id="intro" class="col-md-10 col-md-offset-1">
					<h4 class="text-center aa">3IN人才 </h4>
					<h5 class="text-center bb">3IN Talents </h5>
					<div class="talents text-center  ">
						<div class="talent col-md-4">
							<div class="title">
								<div class="talent-box">
									<h4><?php echo $dame[8] -> title ?></h4>
									<h5><?php echo $dame[9] -> title ?></h5>
								</div>
							</div>
							<div class="content">
								<div class="talent-box">
									<p><?php echo $dame[10] -> title ?></p>
									<p><?php echo $dame[11] -> title ?></p>
								</div>
							</div>
						</div>
						<div class="talent col-md-4">
							<div class="title">
								<div class="talent-box">
									<h4><?php echo $dame[12] -> title ?></h4>
									<h5><?php echo $dame[13] -> title ?></h5>
								</div>
								
							</div>
							<div class="content">
								<div class="talent-box">
									<p><?php echo $dame[14] -> title ?></p>
									<p><?php echo $dame[15] -> title ?></p>
								</div>
							</div>
						</div>
						<div class="talent col-md-4">
							<div class="title">
								<div class="talent-box">
									<h4><?php echo $dame[16] -> title ?></h4>
									<h5><?php echo $dame[17] -> title ?></h5>
								</div>
							</div>
							<div class="content">
								<div class="talent-box">
									<p><?php echo $dame[18] -> title ?></p>
									<p><?php echo $dame[19] -> title ?></p>
								</div>
								
							</div>
						</div>
						
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
	</body>
</html>