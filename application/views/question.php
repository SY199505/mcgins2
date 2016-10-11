<!DOCTYPE html>
<html lang="en" ng-app="myApp">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>常见问题</title>
		<base href="<?php echo site_url();?>">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/question.css">
	</head>
	<body ng-controller="myCtrl">
		<!-- 头部 -->
		<?php include 'header.php'; ?>
		<!-- 头部结束 -->
		<div class="container">
			<div class="row">
				<img src="<?php echo $imgs[4] -> img_src ;?>" id="question" class="img-responsive  col-md-10 col-md-offset-1" alt="">
				
			</div>
			<div class="row">
				<div id="content" class="col-md-10 col-md-offset-1">
					<div class="panel-group" id="accordion">
					<?php 
					$i = 0;
						foreach($faqInfo as $faq){
					?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<span data-toggle="collapse"  href="#collapse<?php  echo $faq -> FAQ_id;?>" >
									<?php echo ++$i;?>.<?php  echo $faq -> FAQ_title;?>
								</span>
								</h4>
							</div>
							<div id="collapse<?php  echo $faq -> FAQ_id;?>" class="panel-collapse collapse " >
								<div class="panel-body">
									<?php  echo $faq -> FAQ_content;?>
								</div>
							</div>
						</div>
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
					$(function(){
						$('.panel-collapse').on('show.bs.collapse', function(){
							console.log($(this).prev());
							$(this).prev().addClass('selected');
						});
						$('.panel-collapse').on('hide.bs.collapse', function(){
							console.log($(this).prev());
							$(this).prev().removeClass('selected');
						});
					});
				</script>
			</body>
		</html>