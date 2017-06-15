<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>表单系统后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default_src/Home/Public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/Template/default_src/Admin/Public/css/index.css" />
</head>
<body>
<!-- 顶部导航菜单开始 -->
<div id="nav-top">
    <div class="nt-logo">
        <a href="<?php echo U('Admin/Index/index');?>"></a>
        <span>表单系统</span>
    </div>
    <ul class="nt-nav list-unstyled">
        <li class="ntn-li ntn-active">
            <span class="fa fa-list-ul nt-ico"></span>
            内容管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-comments nt-ico"></span>
            评论管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-trash nt-ico"></span>
            回收管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-users nt-ico"></span>
            用户管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-cogs nt-ico"></span>
            网站设置
        </li>
    </ul>
    <ul class="nt-msg list-unstyled">
        <li class="nt-go-index">
            <a href="<?php echo U('Home/Index/index');?>" target="_blank"><span class="fa fa-home"></span>前台首页</a>
        </li>
        <li class="nt-sign-out">
            <a href="<?php echo U('Admin/Login/logout');?>"><span class="fa fa-sign-out"></span>退出</a>
        </li>
    </ul>
</div>
<!-- 顶部导航菜单结束 -->

<!-- 左侧导航菜单开始 -->
<div id="nav-left">
    <!-- 内容管理开始 -->
    <div class="nl-con nl-show">
        <dl>
            <dt>
                <span class="fa fa-th"></span>表单管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Article/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加表单
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Article/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>表单列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
        <dl>
            <dt>
                <span class="fa fa-tags"></span>单元表单管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Tag/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加单元表单
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Tag/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>单元表单列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
        <!-- 略去标签管理
        <dl>
            <dt>
                <span class="fa fa-tags"></span>标签管理(表单打标签)
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Tag/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加标签
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Tag/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>标签列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl> 
        -->
        <dl>
            <dt>
                <span class="fa fa-columns"></span>分类管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Category/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加分类
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Category/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>分类列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 内容管理结束 -->

    <!-- 留言评论开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-comment-o"></span>评论管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Comment/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>评论列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
        <!-- 略去随言碎语 
        <dl>
            <dt>
                <span class="fa fa-list-alt"></span>随言碎语
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Chat/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加碎言
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Chat/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>碎言列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
         -->        
    </div>
    <!-- 留言评论结束 -->

    <!-- 回收管理开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-trash-o"></span>回收管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Recycle/article');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>已删表单
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Recycle/comment');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>已删评论
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Recycle/chat');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>已删随言
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 回收管理结束 -->

    <!-- 用户管理开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-user"></span>用户管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/User/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>第三方用户
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 用户管理结束 -->

    <!-- 网站设置开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-cog"></span>基本设置
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Config/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>网站信息
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Config/change_password');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>修改密码
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 网站设置结束 -->
</div>
<!-- 左侧导航菜单结束 -->

<!-- 右侧内容开始 -->
<div id="content">
    <iframe id="content-iframe" src="<?php echo U('Admin/Index/welcome');?>" frameborder="0" width="100%" height="100%" name="right_content" scrolling="auto" frameborder="0" scrolling="no"></iframe>
</div>
<!-- 右侧内容结束 -->
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
<script type="text/javascript" src="/Template/default_src/Admin/Public/js/index.js"></script>
<script>
// 动态调整iframe的高度以适应不同高度的显示器
$('#content').height($(window).height());
$('#content').css('padding-bottom',50);
</script>
</body>
</html>