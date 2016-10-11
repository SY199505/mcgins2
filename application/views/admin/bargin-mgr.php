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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新闻列表界面</strong> | <a class="am-badge am-badge-success am-square">bargin List</a></div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span><a href="admin/add_bargin"> 新增</a></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th>新闻主图</th>
                            <th>新闻标题</th>
                            <th>新闻内容</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($barginInfo as $bargin){
                            ?>
                            <tr>
                                <td><img style="width:40%;height:40%;" src="<?php  echo $bargin -> bargin_img;?>" alt=""></td>
                                <td><?php echo $bargin -> bargin_title; ?></td>
                                <td><?php echo mb_substr($bargin -> bargin_content, 0,30)."......"; ?></td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="admin/bargin_setting?bargin_id=<?php echo $bargin -> bargin_id;?>"> 编辑</a></button>
                                            <button class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" data-id="<?php echo $bargin -> bargin_id;?>"><span class="am-icon-trash-o"></span> 删除</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
<!--                    <ul id="page" class="am-pagination am-fr admin-content-pagination">-->
<!--                        --><?php //echo $this->pagination->create_links();?>
<!--                    </ul>-->
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
</body>
<script>
    $(function(){

        $('.btn-delete').on('click', function(){
            var id = $(this).data('id');
            if(   confirm('您确定要删除这条信息吗？')   ){
                location.href="admin/delete_bargin/"+id;
            }
        });
    });
</script>
</html>
