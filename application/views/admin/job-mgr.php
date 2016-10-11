<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>McGins English后台管理</title>
    <base href="<?php echo site_url();?>">
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
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
        <div class="am-cf am-padding">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户列表界面</strong> | <a class="am-badge am-badge-success am-square">Admin List</a></div>
        </div>
        <div class="am-g add">
          <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
              <div class="am-btn-group am-btn-group-xs">
                <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="admin/add_job"> 新增</a></button>
              </div>
            </div>
          </div>
        </div>
        <!-- 文本域 -->
        <div class="am-g">
          <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
                <tr>
                  <th style="width:45px;">序号</th>
                  <th style="width:200px;">标题</th>
                  <th>内容</th>
                  <th>操作</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($job as $job){
                ?>
                <tr>
                  <td><?php echo $job -> job_id; ?></td>
                  <td><?php echo $job -> job_title; ?></td>
                  <td><?php echo $job -> job_content; ?></td>
                  <td>
                    <div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">
                        <button class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary" data-id="<?php echo $job -> job_id ?>"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                        <button class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" data-id="<?php echo $job -> job_id; ?>" style=" margin-left:0px;"><span class="am-icon-trash-o" style="width:12px;"></span> 删除</button>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
              }
              ?>
              <tr>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
    <?php include 'admin-footer.php' ;?>
  </div>
  <!-- content end -->
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
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
<script>
  $(function(){
    $('.btn-edit').on('click', function(){
      var id = $(this).data('id');
      location.href="admin/edit_job/"+id;
    });
    $('.btn-delete').on('click', function(){
      var id = $(this).data('id');
      if(   confirm('您确定要删除这条信息吗？')   ){
        location.href="admin/delete_job/"+id;
      }
    });
  });
  </script>
</body>
</html>