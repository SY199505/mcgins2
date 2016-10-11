<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>编辑问题 - McGins English后台管理</title>
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
  <style>
    .add{
      margin-top: 20px;
    }
  </style>
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

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">课程列表界面</strong> | <a class="am-badge am-badge-success am-square">Admin List</a></div>
    </div>

    <div class="am-g add">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="admin/add_question"> 新增</a></button>
          </div>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <table class="am-table am-table-striped am-table-hover table-main">
          <thead>
          <tr>
            <th style="width:45px;">序号</th>
            <th style="width:200px;"">问题</th>
            <th>回答</th>
          </tr>
          </thead>
          <tbody>
          <?php
          foreach($faqInfo as $faq){
            ?>
            <tr>

              <td><?php echo $faq -> FAQ_id; ?></td>
              <td><?php echo $faq -> FAQ_title; ?></td>
              <td><?php echo $faq -> FAQ_content; ?></td>

              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary" data-id="<?php echo $faq -> FAQ_id; ?>"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" data-id="<?php echo $faq -> FAQ_id; ?>" style=" margin-left:0px;"><span class="am-icon-trash-o" style="width:12px;"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
            <?php
          }
          ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf">
          <strong class="am-text-primary am-text-lg">编辑课程</strong> /
          <small>form</small>
        </div>
      </div>

      <hr>

      <div class="am-tabs am-margin" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab2">课程信息</a></li>
        </ul>

        <div class="am-tabs-bd">

          <div class="am-tab-panel am-fade am-in am-active" id="tab2">
            <form class="am-form" action="admin/update_course" method="post">
              <?php
              $i = 0;
              foreach($faqInfo as $faq){
              ?>
              <input type="hidden" name="course_id" value="<?php echo $faq -> FAQ_id;?>">


                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-4 am-u-md-2 am-text-right">
                    <?php echo $faq -> FAQ_id;?>.常见问题
                  </div>
                  <div class="am-u-sm-8 am-u-md-10 am-u-end">
                    <input type="text" class="am-input-sm" value="<?php echo $faq -> FAQ_title;?>">
                  </div>
                </div>

                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-4 am-u-md-2 am-text-right">
                    回答
                  </div>
                  <div class="am-u-sm-12 am-u-md-10 am-u-end">
                    <textarea rows="4"><?php  echo $faq -> FAQ_content;?></textarea>
                  </div>
                </div>

                <?php
              }
              ;?>
            </form>
          </div>

        </div>
      </div>
      <div class="am-g am-margin-top">
        <div class="am-u-sm-4 am-u-md-5 am-text-right">
          &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
          <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交编辑</button>
          <button type="button" class="am-btn am-btn-primary am-btn-xs" id="btn-return">放弃编辑</button>
        </div>
      </div>

    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>
  </div> -->
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
  $(function(){
    $('.btn-edit').on('click', function(){
      var id = $(this).data('id');
      location.href="admin/edit_question/"+id;
    });
    $('.btn-delete').on('click', function(){
      var id = $(this).data('id');
      if(   confirm('您确定要删除这条信息吗？')   ){
        location.href="admin/delete_question/"+id;
      }
    });
  });
</script>
</body>
</html>