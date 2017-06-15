<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>欢迎页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/wform/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/wform/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/wform/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/wform/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/wform/Template/default_src/Home/Public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/wform/Template/default_src/Admin/Public/css/index.css" />
</head>
<body>
<div id="welcome">
    <div class="block">
        <h3 class="title">文章统计</h3>
        <ul class="content">
            <li>文章总数：<?php echo ($all_article); ?></li>
            <li>已删文章数：<?php echo ($delete_article); ?></li>
            <li>不显示的文章数：<?php echo ($hide_article); ?></li>
        </ul>
    </div>
    <div class="block">
        <h3 class="title">随言碎语统计</h3>
        <ul class="content">
            <li>随言总数：<?php echo ($all_chat); ?></li>
            <li>已删随言数：<?php echo ($delete_chat); ?></li>
            <li>不显示的随言数：<?php echo ($hide_chat); ?></li>
        </ul>
    </div>
    <div class="block">
        <h3 class="title">评论统计</h3>
        <ul class="content">
            <li>评论总数：<?php echo ($all_comment); ?></li>
        </ul>
    </div>
    <div class="block">
        <h3 class="title">其他数据</h3>
        <table>
            <tr>
                <th>P H P 版 本：</th>
                <td><?php echo PHP_VERSION;?></td>
            </tr>
            <tr>
                <th width="100px">服务器 信息：</th>
                <td><?php echo PHP_OS;?></td>
            </tr>
            <tr>
                <th>bjyblog版本：</th>
                <td><?php echo (C("THINK_INFORMATION")); ?></td>
            </tr>
        </table>
    </div>
</div>
<script src="/wform/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo U('Home/User/logout');?>";
</script>
<script src="/wform/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/wform/Public/static/js/html5shiv.min.js"></script>
<script src="/wform/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/wform/Public/static/pace/pace.min.js"></script>
<script src="/wform/Template/default_src/Home/Public/js/index.js"></script>
<!-- 百度页面自动提交开始 -->
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<!-- 百度页面自动提交结束 -->

<!-- 百度统计开始 -->

<!-- 百度统计结束 -->
</body>
</html>