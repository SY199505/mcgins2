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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">关于我们管理界面</strong> | <a class="am-badge am-badge-success am-square">Admin List</a></div>
        </div>

        <div class="am-g add">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="admin/add_carousel"> 新增轮播图图片</a></button>
                    </div>
                </div>
            </div>
        </div>
        <form action="admin/update_intro" method="post">
            <div class="am-g am-margin-top">
                <div class="am-u-sm-4 am-u-md-3 am-text-right">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                    <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
                    <button type="button" class="am-btn am-btn-primary am-btn-xs" id="btn-return">放弃保存</button>
                </div>
            </div>
            <div class="am-g">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($introInfo as $intro){
                        ?>
                        <tr>
                            <td>中文</td>
                            <td><textarea name="aboutUs_chn" id="" cols="100" rows="10"><?php echo $intro -> aboutUs_chn; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>英文</td>
                            <td><textarea name="aboutUs_en" id="" cols="100" rows="10"><?php echo $intro -> aboutUs_en; ?></textarea></td>
                        </tr>
                        <?php
                    }
                    ?>
                        <tr>
                            <td></td>
                            <td>
                            <input type="text" name="eight" value="<?php echo $dame[8] -> title ?>">
                            <input type="text" name="nine" value="<?php echo $dame[9] -> title ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <input style="width:600px;" type="text" name="ten" value="<?php echo $dame[10] -> title ?>">
                            <input style="width:600px;" type="text" name="eleven" value="<?php echo $dame[11] -> title ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" name="twelve" value="<?php echo $dame[12] -> title ?>">
                                <input type="text" name="thirteen" value="<?php echo $dame[13] -> title ?>">
                            </td>
                            </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input style="width:600px;" type="text" name="forteen" value="<?php echo $dame[14] -> title ?>">
                                <input style="width:600px;" type="text" name="fifteen" value="<?php echo $dame[15] -> title ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" name="sixteen" value="<?php echo $dame[16] -> title ?>">
                                <input type="text" name="seventeen" value="<?php echo $dame[17] -> title ?>">
                                </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input style="width:600px;" type="text" name="eighteen" value="<?php echo $dame[18] -> title ?>">
                                <input style="width:600px;" type="text" name="ninteen" value="<?php echo $dame[19] -> title ?>">

                            </td>
                        </tr>
                        <!--<tr>
                            <td>
                                <a href="admin/edit_feature_bg"><button type="button" class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>更换</button>
                                </a>
                            </td>
                            <td><img style="width: 80%;" src="<?php /*echo $carouselInfo[0] -> index_feature_bg; */?>" alt=""></td>
                        </tr>-->

                    <?php
                    foreach($carouselInfo as $carousel){
                        ?>
                        <tr>
                            <td>
                                <button type="button" class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary" data-id="<?php echo $carousel -> index_id ?>"><span class="am-icon-pencil-square-o"></span>更换</button>
                                <button type="button" class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" data-id="<?php echo $carousel -> index_id ?>"><span class="am-icon-trash-o" style="width:12px;"></span>  删除</button>
                            </td>
                            <td><img style="width: 80%;" src="<?php echo $carousel -> index_carousel; ?>" alt=""></td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>

        </div>

        </form>


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
            location.href="admin/edit_carousel/"+id;
        });
        $('.btn-delete').on('click', function(){
            var id = $(this).data('id');
            if(   confirm('您确定要删除这条信息吗？')   ){
                location.href="admin/delete_carousel/"+id;
            }
        });
        $('#btn-return').on('click', function(){
            if(confirm('您确定要放弃所有的信息吗？')){
                location.href="admin/intro_mgr";
            }
        });
    });
</script>
</body>
</html>
