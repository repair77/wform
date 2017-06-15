<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>评论列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default_src/Home/Public/css/index.css">
</head>
<body>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th width="5%">cmtid</th>
            <th width="20%">被评表单</th>
            <th width="15%">评论人</th>
            <th width="15%">评论时间</th>
            <th width="30%">评论内容</th>
            <th width="5%">审核</th>
            <th width="10%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['cmtid']); ?></td>
            <td>
                <a href="/article/<?php echo ($v['aid']); ?>" target="_blank"><?php echo ($v['title']); ?></a>
            </td>
            <td><?php echo ($v['nickname']); ?></td>
            <td><?php echo date('Y-m-d H:i:s',$v['date']);?></td>
            <td><?php echo ($v['content']); ?></td>
            <th>
                <?php if(($v['status']) == "1"): ?>✔
                <?php else: ?>
                    ✘<?php endif; ?>
            </th>
            <td>
                <?php if((C("COMMENT_REVIEW")) == "1"): if(($v['status']) == "1"): ?><a href="<?php echo U('Admin/Comment/change_status',array('cmtid'=>$v['cmtid'],'status'=>0));?>">取消审核</a>
                    <?php else: ?>
                        <a href="<?php echo U('Admin/Comment/change_status',array('cmtid'=>$v['cmtid'],'status'=>1));?>">通过审核</a><?php endif; ?> |<?php endif; ?>
                <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Recycle/recycle',array('table_name'=>'Comment','id_name'=>'cmtid','id_number'=>$v['cmtid']));?>'">删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<div style="text-align: center;">
    <?php echo ($page); ?>
</div>
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