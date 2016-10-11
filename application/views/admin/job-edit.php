<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>编辑新招聘 - McGins English后台管理</title>
  <meta name="description" content="这是一个form页面">
  <meta name="keywords" content="form">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">

  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>


<div class="am-cf admin-main">
  <!-- sidebar start -->
  <?php include 'admin-sidebar.php'; ?>

  <!-- sidebar end -->

<!-- content start -->
<div class="admin-content">
  <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
      <div class="am-fl am-cf">
        <strong class="am-text-primary am-text-lg">编辑新招聘</strong> /
        <small>form</small>
      </div>
    </div>

    <hr>

    <div class="am-tabs am-margin" data-am-tabs>
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab2">招聘信息</a></li>
      </ul>

      <div class="am-tabs-bd">

        <div class="am-tab-panel am-fade am-in am-active" id="tab2">
          <form class="am-form" action="admin/update_job" method="post">
            <input type="hidden" name="id" value="<?php echo $job -> job_id;?>">
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                标题
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm" name="title" value="<?php echo $job -> job_title ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
            </div>

            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                内容
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea id="intro" name="content" rows="10" placeholder="请使用富文本编辑插件" style="height: 400px;"><?php echo $job -> job_content ?></textarea>
              </div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                &nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
                <button type="button" class="am-btn am-btn-primary am-btn-xs" id="btn-return">放弃保存</button>
              </div>
            </div>


          </form>
        </div>

      </div>
    </div>

  </div>

  <footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
  </footer>
</div>
<!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script charset="utf-8" src="assets/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="assets/kindeditor/lang/zh_CN.js"></script>
<script>
  KindEditor.ready(function(K) {
    window.editor = K.create('#intro');
    var options = {
      cssPath : '/css/index.css',
      filterMode : true
    };
    var editor = K.create('textarea[name="content"]',options);
  });
  $('#btn-return').on('click', function(){
    if(confirm('您确定要放弃所有的信息吗？')){
      location.href="admin/job_mgr";
    }
  });
</script>
</body>
</html>
