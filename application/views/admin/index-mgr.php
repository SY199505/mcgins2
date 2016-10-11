<?php
$adminInfo = $this -> session -> userdata('adminInfo');
if(!$adminInfo){
    redirect('admin/login');
}
?>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>McGins English后台管理</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
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
        .icheckbox_square-blue{
            width: 24px;
            height: 24px;
        }
        .hidden{
            display: none;
        }
        .am-btn-toolbar{
            margin-top: 10px;
        }
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
    <?php include 'admin-sidebar.php'; ?>

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页特色列表界面</strong> | <a class="am-badge am-badge-success am-square">Admin List</a></div>
        </div>

        <!--<div class="am-g add">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="admin/add_index"> 新增</a></button>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="am-g">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead><tr><th>中文</th><th>英文</th><th>保存</th></tr></thead>
                    <tbody>
                    <form action="admin/index_update" method="post">
                        <tr><td><input type="text" name="chinese" value="<?php echo $dame[0] -> title ?>"><td><input type="text" name="english" value="<?php echo $dame[1] -> title ?>"></td><td><button type="submit" formaction="admin/index_update">确认修改</button></td></tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th style="width:45px;">序号</th>
                        <th>标题</th>
                        <th>图片</th>
                        <th>特色中文内容</th>
                        <th>特色英文标题</th>
                        <th>特色英文内容</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($indexInfo as $index){
                        ?>
                        <tr>

                            <td><?php echo $index -> features_id; ?></td>
                            <td><img src="<?php echo $index -> features_picture ?>" alt="" class="img-circle img-responsive center-block" width="70px" height="70px"></td>
                            <td><?php echo $index -> features_title_chn; ?></td>
                            <td><?php echo $index -> features_chn; ?></td>
                            <td><?php echo $index -> features_title_en; ?></td>
                            <td><?php echo $index -> features_en; ?></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary" data-id="<?php echo $index -> features_id; ?>"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                        <button class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" data-id="<?php echo $index -> features_id; ?>"style=" margin-left:0px;"><span class="am-icon-trash-o" style="width:12px;"></span> 删除</button>
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
    <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>


<!--弹出层-->
<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Warning!</div>
        <div class="am-modal-bd">
            当前用户没有编辑权限
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn">确定</span>
        </div>
    </div>
</div>
<!--弹出层-->

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
            location.href="admin/edit_index/"+id;
        });
        $('.btn-delete').on('click', function(){
            var id = $(this).data('id');
            if(   confirm('您确定要删除这条信息吗？')   ){
                location.href="admin/delete_index/"+id;
            }
        });
    });
</script>
</body>
</html>
