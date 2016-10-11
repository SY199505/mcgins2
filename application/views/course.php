<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<title>麦金思课程体系</title>
	<base href="<?php echo site_url();?>">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/course.css">
	<style>

	</style>
</head>
<body ng-controller="myCtrl">
<!-- 头部 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->
<div class="container">
	<div class="row">
		<div id="content">
			<div class="title text-center">
				<h1><?php echo $dame[2] -> title ?></h1>
				<span><?php echo $dame[3] -> title ?></span>
				<p><?php echo $dame[4] -> title ?></p>
				<p><?php echo $dame[5] -> title ?></p>
			</div>
			<!-- 课程安排 -->
			<div id="course-plan" class="text-center">
				<p class="title"><?php echo $dame[6] -> title ?></p>
				<!-- <img src="img/learn-plan.jpg" alt="" class="center-block img-responsive"> -->
<!--				<div id="main" class="center-block" style="width:70%;height:400px;"></div>-->
				<div style="overflow-y: hidden">
					<span class="visible-xs">左滑还有更多<i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
				<table class="col-md-10 col-md-offset-1">
					<thead class="">
						<tr>
							<td class="col-md-2"><?php echo $courseInfo[0]->levels;?></td>
							<?php 
							for ($i=1; $i<count($courseInfo); $i++){
								$course = $courseInfo[$i];
							?>
							<td class="col-md-2"><?php echo $course -> levels ?></td>
							<?php
							}
							?>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $courseInfo[0]->age;?></td>
							<?php
							for ($i=1; $i<count($courseInfo); $i++){
								$course = $courseInfo[$i];
							?>
							<td><?php echo $course -> age ?></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<td><?php echo $courseInfo[0]->courses;?></td>
							<?php
							for ($i=1; $i<count($courseInfo); $i++){
								$course = $courseInfo[$i];
							?>
							<td><?php echo $course -> courses ?></td>
							<?php
							}
							?>
						</tr>
						<tr>
							<td><?php echo $courseInfo[0]->intro;?></td>
							<?php
							for ($i=1; $i<count($courseInfo); $i++){
								$course = $courseInfo[$i];
							?>
							<td>
								<p><?php echo $course -> intro ?></p>
							</td>
							<?php
							}
							?>
						</tr>
					</tbody>
					
				</table>	
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
<script src="js/echart.min.js"></script>
	<script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
        	// color: ['#3398DB'],
        	color: ['#5cb85c'],
        	// color: ['#d9534f'],
        	// color: ['#4285f4'],
        	// color: ['#f0ad4e'],
        	//backgroundColor: '-webkit-gradient(linear, 0% 0%, 0% 100%,from(#15A216), to(#fafafa))',
            title: {
                text: '学习难度'
            },
            tooltip : {
		        trigger: 'axis',
		        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
		            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
		        }
    		},
		    grid: {
		        left: '3%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
            legend: {
                data:['百分比']
            },
            xAxis: {
                data: ["4 ~ 6岁","7 ~ 9岁","10 ~ 12岁","13 ~ 15岁"]
            },
            yAxis: {},
            series: [{
                name: '学习难度',
                type: 'bar',
                barWidth: '30%',
                //data: [25, 50, 60, 70]
                data:[
			              {
			                value:25,
			                itemStyle:{
			                  //normal:{color:'#f0ad4e'}
								normal:{color:'#e28400'}
			              	}
			              }, 
			              {
			                value:50,
			                itemStyle:{
			                  //normal:{color:'#5cb85c'}
								normal:{color:'#eaab00'}
			              	}
			              },
			              {
			                value:60,
			                itemStyle:{
			                  //normal:{color:'#4285f4'}
								normal:{color:'#829d00'}
			              	}
			              },
			              {
			                value:70,
			                itemStyle:{
			                  //normal:{color:'#d9534f'}
								normal:{color:'#3f8715'}
			              	}
			              }
			 		],
					animationDuration: 3000
            }]
        };

        // 使用刚指定的配置项和数据显示图表。



        myChart.setOption(option);
    </script>
</body>
</html>

