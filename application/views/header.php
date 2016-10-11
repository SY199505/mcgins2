<header id='main-navbar' class='navbar navbar-fixed-top' role='banner' style="background: #fff">
	<div class="container">
		<div class="row">
			<div id="header" class="col-md-10 col-md-offset-1">
				<!-- logo -->
				<a href="index.php" class="col-md-5 col-sm-5">
					<img src="img/header-logo.png" alt="logo" class="">
				</a>
				<!-- 按钮 -->
				<!--<button type="button" class="navbar-toggle navbar-default collapsed" data-toggle="collapse" data-target="">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>-->
				<!-- 电话 -->
				<div id="tel" class="col-md-4">
					<a href="tel:<?php foreach($footerInfo as $key=>$value) {echo $value -> webinfo_tel;}?>">{{'TEL'|translate}} <?php foreach($footerInfo as $key=>$value) {echo $value -> webinfo_tel;}?></a>

				</div>
				<!-- 中英文 -->
				<div id="change" class="col-md-3 col-sm-4">
					<a class="changeCHN" ng-click="changeLanguage('chn')" href="javascript:;" translate="BUTTON_LANG_CHN">中文</a> |
					<a class="changeEN" ng-click="changeLanguage('en')" href="javascript:;" translate="BUTTON_LANG_EN" >ENGLISH</a>
				</div>

			</div>

		</div>
	</div>
	<!-- 导航栏 -->
<div id="nav" class="{{'BG_COLOR' | translate }}">
	<div class="container">
		<div class="row">
		    <ul class="nav-list navigation col-md-10 col-md-offset-1">
		    	<!-- <?php
			    	foreach ($chnNavs as $nav) {
		    	?>
		    		<li ><a href="<?php echo $nav -> loadPage;?>" ><?php echo $nav -> nav_name;?></a></li>
		    	<?php
		    	 }
		    	?> -->
		        <li ><a href="welcome/index" ng-bind="'NAV.item1.title1' | translate"></a></li>
		        <li ><a href="welcome/intro" ng-bind="'NAV.item2.title2' | translate"></a></li>
		        <li ><a href="welcome/course" ng-bind="'NAV.item3.title3' | translate"></a></li>
		        <li ><a href="welcome/team" ng-bind="'NAV.item4.title4' | translate"></a></li>
		        <li ><a href="welcome/job" ng-bind="'NAV.item5.title5' | translate"></a></li>
		        <li ><a href="welcome/question" ng-bind="'NAV.item6.title6' | translate"></a></li>
		        <li ><a href="welcome/contact" ng-bind="'NAV.item7.title7' | translate"></a></li>
		        <li ><a href="welcome/news" ng-bind="'NAV.item8.title8' | translate"></a></li>
		    </ul>  
		</div>
	</div>
</div>

</header>




<header id="mobile-nav" class="navbar navbar-fixed-top" role='banner'>
    <div>
      <div class="navbar-header {{'BG_COLOR' | translate }}">
		      <div id="logo" style="display: inline-block">
				  <img src="img/mobile.png" alt="" style="width:48px;height: 48px;">
				  <span class="ch">麦金思青少儿英语</span><br/>
				  <span class="en">McGins English Education</span>
			  </div>

        <button type="button" class="navbar-toggle navbar-default collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	          <span class="icon-bar {{'BG_COLOR' | translate }}"></span>
	          <span class="icon-bar {{'BG_COLOR' | translate }}"></span>
	          <span class="icon-bar {{'BG_COLOR' | translate }}"></span>
        </button>

      </div>
      <nav class="collapse navbar-collapse {{'BG_COLOR' | translate }}" role='navigation'>
        <ul class='nav nav-list navbar-nav navbar-left'>
	        <li><a class="link" href="welcome/index" ng-bind="'NAV.item1.title1' | translate"></a></li>
	        <li><a class="link" href="welcome/intro" ng-bind="'NAV.item2.title2' | translate"></a></li>
	        <li><a class="link" href="welcome/course" ng-bind="'NAV.item3.title3' | translate"></a></li>
	        <li><a class="link" href="welcome/team" ng-bind="'NAV.item4.title4' | translate"></a></li>
	        <li><a class="link" href="welcome/job" ng-bind="'NAV.item5.title5' | translate"></a></li>
	        <li><a class="link" href="welcome/question" ng-bind="'NAV.item6.title6' | translate"></a></li>
	        <li><a class="link" href="welcome/contact" ng-bind="'NAV.item7.title7' | translate"></a></li>
	        <li><a class="link" href="welcome/news" ng-bind="'NAV.item8.title8' | translate"></a></li>
        </ul>

        <ul class='nav navbar-nav navbar-left'>

	         <li ng-click="changeLanguage('chn')" ><a class="changeCHN lang-btn link"  href="javascript:;" translate="BUTTON_LANG_CHN">中 文</a></li>
	         
			 <li ng-click="changeLanguage('en')"><a class="changeEN lang-btn link"  href="javascript:;"  translate="BUTTON_LANG_EN">ENGLISH</a></li>

			 <li><a class="tel" href="tel:<?php foreach($footerInfo as $key=>$value) {echo $value -> webinfo_tel;}?>">{{'TEL'|translate}} <?php foreach($footerInfo as $key=>$value) {echo $value -> webinfo_tel;}?></a></li>

		</ul>


      </nav>
    </div>
</header>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/angular-1.5.5.js"></script>
<script src="js/angular-cookies.js"></script>
<script src="js/angular-translate.min.js"></script>
<script src="js/angular-translate-storage-cookie.js"></script>
<script src="js/angular-translate-storage-local.js"></script>
<?php include 'i18n.php' ?>

<script>
	

		$('.changeCHN').on('click',function(){
			localStorage.lang = '.changeCHN';
			var oUl = $('.nav-list');
			$.get('admin/get_chn_nav',function(res){

			//console.log(res.chnNavs[0]);
				var html = "";
				for(var i=0; i<res.chnNavs.length; i++)
				{
					html+='<li>'
							+'<a class="link" href='+res.chnNavs[i].loadPage+'>'
							+ res.chnNavs[i].nav_name
							+'</a>'
							+'</li>';
				}

				//console.log(html);
				oUl.empty().append(html);

			},'json');
		});


		$('.changeEN').on('click',function(){
			localStorage.lang = '.changeEN';
			var oUl = $('.nav-list');
			$.get('admin/get_en_nav',function(res){

				//console.log(res.enNavs[0]);
				var html = "";
				for(var i=0; i<res.enNavs.length; i++)
				{
					html+='<li>'
						+'<a class="link" href='+res.enNavs[i].loadPage+'>'
						+ res.enNavs[i].nav_name
						+'</a>'
						+'</li>';
				}

				//console.log(html);
				oUl.empty().append(html);

			},'json');
		});

		if(localStorage.lang === '.changeCHN'){
			$('.changeCHN').trigger('click');
		}else{
			$('.changeEN').trigger('click');
		}

</script>


