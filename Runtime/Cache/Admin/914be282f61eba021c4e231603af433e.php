<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>全部用户</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Template/default_src/Home/Public/css/index.css">
</head>
<body>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th width="5%">id</th>
            <th width="10%">来源</th>
            <th width="15%">用户名</th>
            <th width="15%">创建时间</th>
            <th width="15%">最后登录时间</th>
            <th width="10%">登录次数</th>
            <th width="20%">邮箱</th>
            <th width="10%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['id']); ?></td>
            <td><?php echo ($v['type']); ?></td>
            <td><?php echo ($v['nickname']); ?></td>
            <td><?php echo date('Y-m-d H:i:s',$v['create_time']);?></td>
            <td><?php echo date('Y-m-d H:i:s',$v['last_login_time']);?></td>
            <td><?php echo ($v['login_times']); ?></td>
            <td><?php echo ($v['email']); ?></td>
            <td>
                <a href="<?php echo U('Admin/User/is_admin',array('id'=>$v['id'],'is_admin'=>$v['is_admin']));?>">
                    <?php if(($v['is_admin']) == "1"): ?>取消标记<?php else: ?>标记为站长<?php endif; ?>
                </a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<div style="text-align: center;">
    <?php echo ($page); ?>
</div>
<script src="/bjyblog/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo U('Home/User/logout');?>";
</script>
<script src="/bjyblog/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/bjyblog/Public/static/js/html5shiv.min.js"></script>
<script src="/bjyblog/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/bjyblog/Public/static/pace/pace.min.js"></script>
<script src="/bjyblog/Template/default_src/Home/Public/js/index.js"></script>
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