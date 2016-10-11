<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>McGins English后台管理</title>
    <meta name="description" content="这是一个form页面">
    <meta name="keywords" content="form">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>">
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <style>
        .hidden{
            visibility: hidden;
        }
        #tip{
            display: none;
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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">管理员信息添加界面</strong> | <small><a class="am-badge am-badge-success am-square">Update Admin</a></small></div>
        </div>

        <div class="am-tabs am-margin" data-am-tabs>
            <ul class="am-tabs-nav am-nav am-nav-tabs">
                
            </ul>

            <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                    <form action="admin/save_team" method="post" class="am-form am-form-inline" enctype="multipart/form-data">
                        <input type="hidden" name="team_id">
                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">姓名</div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                <input type="text" id="teamname" name="team_name" >
                                <a id="tip" class="am-badge am-badge-danger am-square"><span class="am-icon-exclamation-triangle"></span> 当前用户名不可用</a>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">职务</div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                <input type="text" id="teamname" name="team_type" >
                                <a id="tip" class="am-badge am-badge-danger am-square"><span class="am-icon-exclamation-triangle"></span> 当前用户名不可用</a>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">描述</div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                <textarea name="team_desc" id="" cols="30" rows="10"></textarea>
                                <a id="tip" class="am-badge am-badge-danger am-square"><span class="am-icon-exclamation-triangle"></span> 当前用户名不可用</a>
                            </div>
                        </div>



                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">更改头像</div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                <!--              文件上传-->
                                <div class="am-form-group am-form-file">
                                    <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                        <i class="am-icon-cloud-upload"></i> 选择新的头像文件</button>
                                    <input id="doc-form-file" type="file" multiple name="team_photo">
                                    <!--图片预览-->
                                    <br/>
                                    <small class="am-badge am-badge-success am-radius">预览图</small>
                                    <div id="imgdiv"><img id="imgShow" width="50%" height="50%" /></div>
                                    <!--图片预览-->
                                </div>
                                <div id="file-list"></div>
                                <!--              文件上传-->
                            </div>
                        </div>

                        <div class="am-margin">
                            <input type="reset" class="am-btn am-btn-primary am-btn-xs hidden" value="重置">
                            <input type="submit" class="am-btn am-btn-primary am-btn-xs" value="提交更新">
                            <button type="reset" class="am-btn am-btn-primary am-btn-xs">重置</button>
                        </div>

                    </form>
                </div>



            </div>
        </div>

        
    </div>
   

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>


<button
    id="alert"
  type="button"
  class="am-btn am-btn-primary"
  data-am-modal="{target: '#my-alert'}">
  Alert
</button>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">Amaze UI</div>
    <div class="am-modal-bd">
      Hello world！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>

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

<!--密码框明文显示-->
<script>
    $(function(){
        
        var $check = $('#pwd-type');
        var $pwd = $("input[type='password']");

        $("input").change(function(){
            if($check.is(":checked")){
                $pwd.attr('type','text');
            }else{
                $pwd.attr('type','password');
            }
        });

    });
    

    
        
   
</script>
<!--密码框明文显示-->

<!--图片上传-->
<script>
    $(function() {
        $('#doc-form-file').on('change', function() {
            var fileNames = '';
            $.each(this.files, function() {
                fileNames += '<span class="am-badge">' + this.name + '</span> ';
            });
            $('#file-list').html(fileNames);
        });
    });
</script>
<!--图片上传-->

<!--图片上传预览-->
<script src="js/uploadPreview.min.js"></script>
<script>
    window.onload = function () {
        new uploadPreview({ UpBtn: "doc-form-file", DivShow: "imgdiv", ImgShow: "imgShow" });
    }
</script>
<!--图片上传预览-->


<!--用户名验证-->
<script>
  $(function(){
    var $username = $('#username');
    var $tip = $('#tip');
    $username.on('keyup',function(){
      var $usernameVal = $(this).val().trim();
      $.get('admin/check_username',{'admin_username':$usernameVal},function(res){
        if( res === "success" ){
          $tip.show();
          //alert('当前用户名已存在，请重新输入!');
          location.reload();
        }else{
          $tip.hide();
          //console.log("当前用户名可用");
        }
      },'text');
    });

  });




</script>

</body>
</html>

