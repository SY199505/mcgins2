<style>
.aa{

}
	/*轮播图后面的背景图*/
.bg{
	position: absolute;
}
/*轮播图*/
#carousel{
	margin-top: 140px;
}
/*轮播图按钮*/
#carousel-example-generic .carousel-direction{
	font-size: 4.29rem;
	position: absolute;
	top: 50%;
	left: 50%;
	z-index: 5;
	display: inline-block;
	margin-top: -10px;
	font-style: normal;
	font-weight: 900;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
}

#content .feature{
/*	background: url(../img/content-bg.jpg) no-repeat;*/
	-webkit-background-size: cover;
	background-size: cover;
}
#content .feature li:nth-child(n+5){
	margin-top: 15%;
}

#content h2{
	font-size: 1.07rem;
	font-weight: bold;
}
#content li p{
	text-indent: 25px;
	height: 130px;
}

/*媒体查询，干掉背景图片*/
@media all and (max-width: 767px) {
	#content .feature{
		background-size: 0 0;
	}
}

@media all and (max-width: 768px) {

	#carousel{
		margin-top: 50px;
	}

}









</style>