<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"C:\achen\phpstudy\WWW\h5\addons\cms\view\hook\user_sidenav_after.html";i:1746783040;}*/ ?>
<?php if(isset($sidenav) && $sidenav): ?>
<!--<ul class="list-group">-->
<!--    <li class="list-group-heading"><?php echo __('内容管理'); ?></li>-->
<!--    <?php if(in_array('myhomepage', $sidenav) && config('fastadmin.usercenter')): ?>-->
<!--    <li class="list-group-item"><a href="<?php echo addon_url('cms/user/index', [':id'=>$user['id']]); ?>" target="_blank"><i class="fa fa-home fa-fw"></i> <?php echo __('我的个人主页'); ?></a></li>-->
<!--    <?php endif; ?>-->
<!--    &lt;!&ndash;如果需要直接跳转对应的模型(比如我的新闻,我的产品,发布新闻,发布产品)，可以在链接后加上 ?model_id=模型ID &ndash;&gt;-->
<!--    <?php if(in_array('myarchives', $sidenav)): ?>-->
<!--    <li class="list-group-item <?php echo check_nav_active('cms.archives/my'); ?>"><a href="<?php echo url('index/cms.archives/my'); ?>"><i class="fa fa-newspaper-o fa-fw"></i> <?php echo __('我发布的文档'); ?></a></li>-->
<!--    <?php endif; ?>-->
<!--    <?php if(in_array('postarchives', $sidenav)): ?>-->
<!--    <li class="list-group-item <?php echo check_nav_active('cms.archives/post'); ?>"><a href="<?php echo url('index/cms.archives/post'); ?>"><i class="fa fa-pencil fa-fw"></i> <?php echo __('发布文档'); ?></a></li>-->
<!--    <?php endif; ?>-->
<!--    <?php if(in_array('myorder', $sidenav)): ?>-->
    <!--<li class="list-group-item <?php echo check_nav_active('cms.order/index'); ?>"><a href="<?php echo url('index/cms.order/index'); ?>"><i class="fa fa-shopping-bag fa-fw"></i> <?php echo __('我的消费订单'); ?></a></li>-->
<!--    <?php endif; ?>-->
<!--    <?php if(in_array('mycomment', $sidenav)): ?>-->
<!--    <li class="list-group-item <?php echo check_nav_active('cms.comment/index'); ?>"><a href="<?php echo url('index/cms.comment/index'); ?>"><i class="fa fa-comments fa-fw"></i> <?php echo __('我发表的评论'); ?></a></li>-->
<!--    <?php endif; ?>-->
<!--    <?php if(in_array('mycollection', $sidenav)): ?>-->
<!--    <li class="list-group-item <?php echo check_nav_active('cms.collection/index'); ?>"><a href="<?php echo url('index/cms.collection/index'); ?>"><i class="fa fa-bookmark fa-fw"></i> <?php echo __('我的收藏'); ?></a></li>-->
<!--    <?php endif; ?>-->
<!--</ul>-->
<?php endif; ?>
