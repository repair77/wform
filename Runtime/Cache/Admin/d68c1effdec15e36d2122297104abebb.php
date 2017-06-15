<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>文章列表</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/bjyblog/Template/default/Home/Public/css/index.css"></head><body><table class="table table-bordered table-striped table-hover table-condensed"><thead><tr><th width="3%">aid</th><th width="9%">所属栏目</th><th width="20%">标题</th><th width="8%">作者</th><th width="22%">标签</th><th width="4%">原创</th><th width="4%">显示</th><th width="4%">置顶</th><th width="5%">点击数</th><th width="13%">发布时间</th><th width="8%">操作</th></tr></thead><?php if(is_array($data)): foreach($data as $key=>$v): ?><tr><td><?php echo ($v['aid']); ?></td><td><?php echo ($v['category']['cname']); ?></td><td><a href="/article/<?php echo ($v['aid']); ?>" target="_blank"><?php echo ($v['title']); ?></a></td><td><?php echo ($v['author']); ?></td><td><?php if(is_array($v['tag'])): foreach($v['tag'] as $key=>$n): echo ($n['tname']); ?>&nbsp;<?php endforeach; endif; ?></td><td><?php if($v['is_original'] == 1): ?>✔<?php else: ?> ✘<?php endif; ?></td><td><?php if($v['is_show'] == 1): ?>✔<?php else: ?> ✘<?php endif; ?></td><td><?php if($v['is_top'] == 1): ?>✔<?php else: ?> ✘<?php endif; ?></td><td><?php echo ($v['click']); ?></td><td><?php echo ($v['addtime']); ?></td><td> <a href="<?php echo U('Admin/Article/edit',array('aid'=>$v['aid']));?>">修改</a> | <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Recycle/recycle',array('table_name'=>'Article','id_name'=>'aid','id_number'=>$v['aid']));?>'">删除</a></td></tr><?php endforeach; endif; ?></table><div style="text-align: center;"> <?php echo ($page); ?></div><script src="/bjyblog/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo U('Home/User/logout');?>";
</script>
<script src="/bjyblog/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/bjyblog/Public/static/js/html5shiv.min.js"></script>
<script src="/bjyblog/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/bjyblog/Public/static/pace/pace.min.js"></script>
<script src="/bjyblog/Template/default/Home/Public/js/index.js"></script>
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

<!-- 百度统计结束 --></body></html>