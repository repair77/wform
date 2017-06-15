<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>已删表单</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default_src/Home/Public/css/index.css">
    <style type="text/css">
    table {
        word-break:break-all;
        word-wrap:break-word;
    }
    </style>
</head>
<body>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th width="5%">aid</th>
            <th width="15%">所属分类</th>
            <th width="20%">作者</th>
            <th width="30%">标题</th>
            <th width="30%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['aid']); ?></td>
            <td><?php echo ($v['category']['cname']); ?></td>
            <td><?php echo ($v['author']); ?></td>
            <td><?php echo ($v['title']); ?></td>
            <td>
                <a href="<?php echo U('Admin/Recycle/recover',array('table_name'=>'Article','id_name'=>'aid','id_number'=>$v['aid']));?>">恢复</a> |
                <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Article/delete',array('aid'=>$v['aid']));?>'">彻底删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<script src="/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo U('Home/User/logout');?>";
</script>
<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/Public/static/js/html5shiv.min.js"></script>
<script src="/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/Public/static/pace/pace.min.js"></script>
<script src="/Template/default_src/Home/Public/js/index.js"></script>
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