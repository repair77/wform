<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>分类列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default_src/Home/Public/css/index.css">
</head>
<body>
<form action="<?php echo U('Admin/Category/sort');?>" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th width="10%">cid</th>
                <th width="10%">排序</th>
                <th width="15%">分类名</th>
                <th width="25%">关键词</th>
                <th width="25%">描述</th>
                <th width="15%">操作</th>         
            </tr>
        </thead>
        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                <td><?php echo ($v['cid']); ?></td>
                <td>
                    <input class="form-control" type="text" name="<?php echo ($v['cid']); ?>" value="<?php echo ($v['sort']); ?>">
                </td>
                <td><?php echo ($v['_name']); ?></td>
                <td><?php echo ($v['keywords']); ?></td>
                <td><?php echo ($v['description']); ?></td>
                <td>
                    <a href="<?php echo U('Admin/Category/add',array('cid'=>$v['cid']));?>">添加子分类</a> | 
                    <a href="<?php echo U('Admin/Category/edit',array('cid'=>$v['cid']));?>">修改</a> | 
                    <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Category/delete',array('cid'=>$v['cid']));?>'">删除</a>             
                </td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td></td>
            <td>
                <input class="btn btn-success" type="submit" value="排序">
            </td>
        </tr>
    </table>
</form>
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