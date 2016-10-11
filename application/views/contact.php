<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<title>联系我们</title>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	
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
			<div class="info col-md-6 col-xs-12" >
				<div class="title text-center" ng-bind="'CONTACTUS' | translate"></div>
				<ul>
                    <li><a href="tel:<?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_phone;}?>">{{'PHONE'|translate}}  <?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_phone;}?></a></li>
                    <li><a href="http://wx.qq.com">{{'WEICHAT'|translate}} <?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_wechat;}?></a></li>
					<li><a href="mailto:<?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_mail;}?>">{{'EMAIL'|translate}} <?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_mail;}?></a></li>
                    <li><a href="http://www.mcgins.com">{{'WEBSITE'|translate}} <?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_website;}?></a></li>
					{{'CONTACT'|translate}}<br/>
					<li>
						{{'ADDRESS'|translate}}
					<?php /*foreach($contactInfo as $key=>$value) {echo $value -> webinfo_addr;}*/?></li>
				</ul>
			</div>
			<div id="allmap" class="col-md-6 col-xs-12 img-responsive"></div>
		</div>
	</div>
</div>
<?php //$longitude =$contactInfo -> webinfo_longitude ?>
<?php //$latitude = $contactInfo -> webinfo_latitude ?>
<!-- 尾部 -->
<?php include 'footer.php' ?>
<!-- 尾部结束 -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.goup.min.js"></script>
	<script src="js/style.js"></script>
	<script src="http://api.map.baidu.com/api?v=2.0&ak=AMt1vrxwTqGzf1I94PMx7K0u" type="text/javascript"></script>
<?php



;?>
<script type="text/javascript">
  // 百度地图API功能
  var map = new BMap.Map("allmap");
  var point = new BMap.Point(<?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_longitude;} ?>
		  ,<?php foreach($contactInfo as $key=>$value) {echo $value -> webinfo_latitude;} ?>
  );
  map.centerAndZoom(point, 18);
  var marker = new BMap.Marker(point);  // 创建标注
  map.addOverlay(marker);               // 将标注添加到地图中
  marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
  map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
  //map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
  map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>
</body>
</html>

