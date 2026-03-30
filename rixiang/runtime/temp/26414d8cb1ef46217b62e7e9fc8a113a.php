<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"C:\achen\phpstudy\WWW\myProject\rixiang\addons\cms\view\default\index.html";i:1774859294;s:82:"C:\achen\phpstudy\WWW\myProject\rixiang\addons\cms\view\default\common\layout.html";i:1774859294;s:84:"C:\achen\phpstudy\WWW\myProject\rixiang\addons\cms\view\default\common\userinfo.html";i:1774859294;s:83:"C:\achen\phpstudy\WWW\myProject\rixiang\addons\cms\view\default\common\sidebar.html";i:1774859294;}*/ ?>
<!DOCTYPE html>
<html class="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta name="force-rendering" content="webkit">
    <title><?php echo htmlentities(\think\Config::get('cms.title') ?? ''); ?> - <?php echo \think\Config::get('cms.sitename'); ?></title>
    <meta name="keywords" content="<?php echo htmlentities(\think\Config::get('cms.keywords') ?? ''); ?>"/>
    <meta name="description" content="<?php echo htmlentities(\think\Config::get('cms.description') ?? ''); ?>"/>

    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" media="screen" href="/assets/css/bootstrap.min.css?v=<?php echo $site['version']; ?>"/>
    <link rel="stylesheet" media="screen" href="/assets/libs/font-awesome/css/font-awesome.min.css?v=<?php echo $site['version']; ?>"/>
    <link rel="stylesheet" media="screen" href="/assets/libs/fastadmin-layer/dist/theme/default/layer.css?v=<?php echo $site['version']; ?>"/>
    <link rel="stylesheet" media="screen" href="/assets/addons/cms/css/swiper.min.css?v=<?php echo $site['version']; ?>">
    <link rel="stylesheet" media="screen" href="/assets/addons/cms/css/share.min.css?v=<?php echo $site['version']; ?>">
    <link rel="stylesheet" media="screen" href="/assets/addons/cms/css/iconfont.css?v=<?php echo $site['version']; ?>">
    <link rel="stylesheet" media="screen" href="/assets/addons/cms/css/common.css?v=<?php echo $site['version']; ?>"/>

    <!--分享-->
    <meta property="og:title" content="<?php echo htmlentities(\think\Config::get('cms.title') ?? ''); ?>"/>
    <meta property="og:image" content="<?php echo htmlentities(\think\Config::get('cms.image') ?? ''); ?>"/>
    <meta property="og:description" content="<?php echo htmlentities(\think\Config::get('cms.description') ?? ''); ?>"/>

    {__STYLE__}

    
</head>
<body class="group-page skin-white">

<header class="header">
    <!-- S 导航 -->
    <nav class="navbar navbar-default navbar-white navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle sidebar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo \think\Config::get('cms.indexurl'); ?>"><img src="<?php echo cdnurl((\think\Config::get('cms.sitelogo') ?: '/assets/addons/cms/img/logo.png') ?? ''); ?>" style="height:100%;" alt=""></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav" data-current="<?php echo (isset($__CHANNEL__['id']) && ($__CHANNEL__['id'] !== '')?$__CHANNEL__['id']:0); ?>">
                    
                    <!--如果你需要自定义NAV,可使用channellist标签来完成,这里只设置了2级,如果显示多级栏目,请使用cms:nav标签-->
                    <?php $__bscP54dQBJ__ = \addons\cms\model\Channel::getChannelList(["id"=>"nav","type"=>"top","condition"=>"1=isnav"]); if(is_array($__bscP54dQBJ__) || $__bscP54dQBJ__ instanceof \think\Collection || $__bscP54dQBJ__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__bscP54dQBJ__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                    <!--判断是否有子级或高亮当前栏目-->
                    <li class="<?php if($nav['has_child']): ?>dropdown<?php endif; if($nav->is_active): ?> active<?php endif; ?>">
                        <a href="<?php echo $nav['url']; ?>" <?php if($nav['has_child']): ?> data-toggle="dropdown" <?php endif; ?>><?php echo htmlentities($nav['name'] ?? ''); if($nav['has_nav_child']): ?> <b class="caret"></b><?php endif; ?></a>
                        <ul class="dropdown-menu <?php if(!$nav['has_nav_child']): ?>hidden<?php endif; ?>" role="menu">
                            <?php $__pZAgHCy8kY__ = \addons\cms\model\Channel::getChannelList(["id"=>"sub","type"=>"son","typeid"=>$nav['id'],"condition"=>"1=isnav"]); if(is_array($__pZAgHCy8kY__) || $__pZAgHCy8kY__ instanceof \think\Collection || $__pZAgHCy8kY__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__pZAgHCy8kY__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                            <li><a href="<?php echo $sub['url']; ?>"><?php echo htmlentities($sub['name'] ?? ''); ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__pZAgHCy8kY__; ?>
                            
                        </ul>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__bscP54dQBJ__; ?>

                    <!--如果需要多级栏目请使用cms:nav标签-->
                    
                     <li><a href="<?php echo url('index/baoguo'); ?>"><i class="fa fa-shopping-bag fa-fw"></i><?php echo __('添加包裹'); ?></a></li>
                              <li><a href="<?php echo url('index/yunfei'); ?>"><i class="fa fa-calculator fa-fw"></i><?php echo __('运费测算'); ?></a></li>
                             <li><a href="<?php echo url('index/dingdan'); ?>"><i class="fa fa-reorder fa-fw"></i><?php echo __('订单列表'); ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="form-inline navbar-form" action="<?php echo addon_url('cms/search/index'); ?>" method="get">
                            <div class="form-search hidden-sm">
                                <input class="form-control" name="q" data-suggestion-url="<?php echo addon_url('cms/search/suggestion'); ?>" type="search" id="searchinput" placeholder="搜索">
                                <div class="search-icon"></div>
                            </div>
                            <?php echo token('__searchtoken__'); ?>
                        </form>
                    </li>
                    <?php if(config('fastadmin.usercenter')): ?>
                        <li class="dropdown navbar-userinfo">
    <?php if($user): ?>
    <a href="<?php echo url('index/user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown">
        <span class="avatar-img pull-left"><img src="<?php echo htmlentities(cdnurl($user['avatar'] ?? '') ?? ''); ?>" style="width:30px;height:30px;border-radius:50%;" alt=""></span>
        <span class="visible-xs pull-left ml-2 pt-1"><?php echo htmlentities($user['nickname'] ?? ''); ?> <b class="caret"></b></span>
    </a>
    <?php else: ?>
    <a href="<?php echo url('index/user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown">会员<span class="hidden-sm">中心</span> <b class="caret"></b></a>
    <?php endif; ?>
    <ul class="dropdown-menu">
        <?php if($user): ?>
        <li><a href="<?php echo url('index/user/index'); ?>"><i class="fa fa-user fa-fw"></i> 会员中心</a></li>
<!--        <li><a href="<?php echo addon_url('cms/user/index', [':id'=>$user['id']]); ?>"><i class="fa fa-user-circle fa-fw"></i> 我的个人主页</a></li>-->
<!--        <?php $sidenav = array_filter(explode(',', config('cms.usersidenav'))); ?>-->
<!--        <?php if(in_array('myarchives', $sidenav)): ?>-->
        <!--<li><a href="<?php echo url('index/cms.archives/my'); ?>"><i class="fa fa-list fa-fw"></i> 我发布的文档</a></li>-->
<!--        <?php endif; ?>-->
<!--        <?php if(in_array('postarchives', $sidenav)): ?>-->
<!--        <li><a href="<?php echo url('index/cms.archives/post'); ?>"><i class="fa fa-pencil fa-fw"></i> 发布文档</a></li>-->
<!--        <?php endif; ?>-->
<!--        <?php if(in_array('myorder', $sidenav)): ?>-->
<!--        <li><a href="<?php echo url('index/cms.order/index'); ?>"><i class="fa fa-shopping-bag fa-fw"></i> 我的消费订单</a></li>-->
<!--        <?php endif; ?>-->
<!--        <?php if(in_array('mycomment', $sidenav)): ?>-->
<!--        <li><a href="<?php echo url('index/cms.comment/index'); ?>"><i class="fa fa-comments fa-fw"></i> 我发表的评论</a></li>-->
<!--        <?php endif; ?>-->
<!--        <?php if(in_array('mycollection', $sidenav)): ?>-->
<!--        <li><a href="<?php echo url('index/cms.collection/index'); ?>"><i class="fa fa-bookmark fa-fw"></i> 我的收藏</a></li>-->
        <?php endif; ?>
        <li><a href="<?php echo url('index/user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> 退出</a></li>
        <?php else: ?>
        <li><a href="<?php echo url('index/user/login'); ?>"><i class="fa fa-sign-in fa-fw"></i> 登录</a></li>
        <li><a href="<?php echo url('index/user/register'); ?>"><i class="fa fa-user-o fa-fw"></i> 注册</a></li>
        <?php endif; ?>
    </ul>
</li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <!-- E 导航 -->

</header>

<main class="main-content">
    

<div class="container" id="content-container">

    <!--<div style="margin-bottom:20px;">-->
    <!---->
    <!--</div>-->

    <div class="row">

        <main class="col-xs-12 col-md-8">
            <div class="swiper-container index-focus">
                <!-- S 焦点图 -->
                <div id="index-focus" class="carousel slide carousel-focus" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $__fNoLlYQTds__ = \addons\cms\model\Block::getBlockList(["id"=>"block","name"=>"indexfocus","row"=>"5"]); if(is_array($__fNoLlYQTds__) || $__fNoLlYQTds__ instanceof \think\Collection || $__fNoLlYQTds__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__fNoLlYQTds__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$block): $mod = ($i % 2 );++$i;?>
                        <li data-target="#index-focus" data-slide-to="<?php echo $i-1; ?>" class="<?php if($i==1): ?>active<?php endif; ?>"></li>
                        <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__fNoLlYQTds__; ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php $__c4K5F0piPu__ = \addons\cms\model\Block::getBlockList(["id"=>"block","name"=>"indexfocus","row"=>"5"]); if(is_array($__c4K5F0piPu__) || $__c4K5F0piPu__ instanceof \think\Collection || $__c4K5F0piPu__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__c4K5F0piPu__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$block): $mod = ($i % 2 );++$i;?>
                        <div class="item <?php if($i==1): ?>active<?php endif; ?>">
                            <a href="<?php echo $block['url']; ?>">
                                <div class="carousel-img" style="background-image:url('<?php echo $block['image']; ?>');"></div>
                                <div class="carousel-caption hidden-xs">
                                    <h3><?php echo htmlentities($block['title'] ?? ''); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__c4K5F0piPu__; ?>
                    </div>
                    <a class="left carousel-control" href="#index-focus" role="button" data-slide="prev">
                        <span class="icon-prev fa fa-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#index-focus" role="button" data-slide="next">
                        <span class="icon-next fa fa-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>仓库信息</span>
              
                <div class="panel-body p-0">
                     
                    <div class="article-list">
                
                        <article  style="padding: 20px 0;">
                            
                            <div class="media">
                                   <p style="color:red;font-size:12px">注意：[地址前的ID]必须填写正确，否则会导致无法正常入库，出现发错货的情况。使用前请看下方系统使用说明，熟悉使用流程，感谢您的使用。</p>
                                <div class="media-left">
                                      
                                    <a href="#">
                                        <div class="embed-responsive embed-responsive-4by3 img-zoom">
                                            <img src="/uploads/20260327/8f488b956f6e91e655021dc7fe1c8ed2.png" alt="仓库详情">
                                        </div>
                                    </a>
                                </div>
                               
                                <div class="media-body">
<!--                                    <h3 class="article-title">-->
<!--                                        <a href="#">仓库详情</a>-->
<!--                                    </h3>-->
                                 <?php if($userid): ?>
                                    <div style="height: 85px;
                                            line-height: 17px;
                                            color: #828a92;
                                            font-size: 10px;
                                            text-overflow: ellipsis;
                                            -webkit-box-orient: vertical;
                                            display: -webkit-box;
                                           ">
                                       
                                        <span id='textToCopy'>(必填ID:<?php echo $userid; ?>)地址：沈阳市浑南区天坛南街8-12号沿海国际中心A2
                                        <div>联系人：郭彬</div>
                                        <div>电话：13998159009</div></span>
                                        <button  onclick="copyWaybillNumber()">一键复制</button>
                                    </div>
                                  <?php else: ?>
                                   <div style="height: 85px;
                                            line-height: 17px;
                                            color: #828a92;
                                            font-size: 13px;
                                            text-overflow: ellipsis;
                                            -webkit-box-orient: vertical;
                                            display: -webkit-box;
                                           ">
                                         注册登录后查看邮寄地址
                                        <!--<div>微信关注【乐邮集运】公众号</div>-->
                                        <div>电话：13998159009</div>
                                    <a href='http://rixiang.com/index/user/register.html'>
                                      <button>点击登录</button>
                                    </a>
                                   
                                   </div>
                                  <?php endif; ?>
   
                                </div>
                            </div>
                        </article>
                      </div>
                    </div>
                    </h3>
                </div>
            </div>
          
      <style>
    
        .input-group {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }

        button {
            padding: 2px 6px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .success-message {
            color: #4CAF50;
            margin-top: 10px;
            display: none;
        }
    </style>
        
        
   

            <div  style="display: flex;  align-items: center;justify-content:space-between">
                <a href="http://rixiang.com/index/baoguo/index.html"><img src="/uploads/20241202133734.png" alt="Image 1" style="width: 130px;height:90px;padding: 2px;border-radius:20px"></a>
                <a href="http://rixiang.com/index/yunfei/index.html"><img src="/uploads/20241202133805.png" alt="Image 2"  style="width: 130px;height:90px;padding: 2px;border-radius:20px"></a>
                <a href="http://rixiang.com/index/dingdan/index.html"><img src="/uploads/20241202133906.png" alt="Image 3"  style="width: 130px;height:90px;padding: 2px;border-radius:20px"></a>
            </div>
        </main>
   
         <aside class="col-xs-12 col-md-4" style="margin-top:20px">
            <div class="panel panel-default lasest-update">
                <!-- S 最近更新 -->
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo __('Recently update'); ?></h3>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <?php $__RbHAXO4Gyj__ = \addons\cms\model\Archives::getArchivesList(["id"=>"new","row"=>"8","orderby"=>"id","orderway"=>"desc"]); if(is_array($__RbHAXO4Gyj__) || $__RbHAXO4Gyj__ instanceof \think\Collection || $__RbHAXO4Gyj__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__RbHAXO4Gyj__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?>
                        <li>
                            <span>[<a href="<?php echo (isset($new['channel']['url']) && ($new['channel']['url'] !== '')?$new['channel']['url']:'javascript:'); ?>"><?php echo htmlentities((isset($new['channel']['name']) && ($new['channel']['name'] !== '')?$new['channel']['name']:'未知') ?? ''); ?></a>]</span>
                            <a class="link-dark" href="<?php echo $new['url']; ?>" title="<?php echo htmlentities($new['title'] ?? ''); ?>"><?php echo htmlentities($new['title'] ?? ''); ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__RbHAXO4Gyj__; ?>
                    </ul>
                </div>
                <!-- E 最近更新 -->
            </div>

            <div class="panel panel-blockimg">

            </div>

            
<!--<div class="panel panel-blockimg">-->
<!--    <?php if((!0 || time()>0)&&(!0 || time()<0)): ?><?php echo cache('taglib_cms_block_content_8'); endif; ?>-->
<!--</div>-->

<!--&lt;!&ndash; S 热门资讯 &ndash;&gt;-->
<!--<div class="panel panel-default hot-article">-->
<!--    <div class="panel-heading">-->
<!--        <h3 class="panel-title"><?php echo __('Recommend news'); ?></h3>-->
<!--    </div>-->
<!--    <div class="panel-body">-->
<!--        <?php $__cvJXKwVM0m__ = \addons\cms\model\Archives::getArchivesList(["id"=>"item","model"=>"1","row"=>"10","flag"=>"recommend","orderby"=>"id","orderway"=>"asc"]); if(is_array($__cvJXKwVM0m__) || $__cvJXKwVM0m__ instanceof \think\Collection || $__cvJXKwVM0m__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__cvJXKwVM0m__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>-->
<!--        <div class="media media-number">-->
<!--            <div class="media-left">-->
<!--                <span class="num tag"><?php echo $i; ?></span>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <a class="link-dark" href="<?php echo $item['url']; ?>" title="<?php echo htmlentities($item['title'] ?? ''); ?>"><?php echo htmlentities($item['title'] ?? ''); ?></a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__cvJXKwVM0m__; ?>-->
<!--    </div>-->
<!--</div>-->
<!--&lt;!&ndash; E 热门资讯 &ndash;&gt;-->

<!--<div class="panel panel-blockimg">-->
<!--    <?php if((!0 || time()>0)&&(!0 || time()<0)): ?><?php echo cache('taglib_cms_block_content_9'); endif; ?>-->
<!--</div>-->

<!--&lt;!&ndash; S 热门标签 &ndash;&gt;-->
<!--<div class="panel panel-default hot-tags">-->
<!--    <div class="panel-heading">-->
<!--        <h3 class="panel-title"><?php echo __('Hot tags'); ?></h3>-->
<!--    </div>-->
<!--    <div class="panel-body">-->
<!--        <div class="tags">-->
<!--            <?php $__uODgRQwIoP__ = \addons\cms\model\Tag::getTagList(["id"=>"tag","orderby"=>"rand","limit"=>"30"]); if(is_array($__uODgRQwIoP__) || $__uODgRQwIoP__ instanceof \think\Collection || $__uODgRQwIoP__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__uODgRQwIoP__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>-->
<!--            <a href="<?php echo $tag['url']; ?>" class="tag"> <span><?php echo htmlentities($tag['name'] ?? ''); ?></span></a>-->
<!--            <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__uODgRQwIoP__; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--&lt;!&ndash; E 热门标签 &ndash;&gt;-->

<!--&lt;!&ndash; S 推荐下载 &ndash;&gt;-->
<!--<div class="panel panel-default recommend-article">-->
<!--    <div class="panel-heading">-->
<!--        <h3 class="panel-title"><?php echo __('Recommend download'); ?></h3>-->
<!--    </div>-->
<!--    <div class="panel-body">-->
<!--        <?php $__ARID2noJVa__ = \addons\cms\model\Archives::getArchivesList(["id"=>"item","model"=>"3","row"=>"10","flag"=>"recommend","orderby"=>"id","orderway"=>"asc"]); if(is_array($__ARID2noJVa__) || $__ARID2noJVa__ instanceof \think\Collection || $__ARID2noJVa__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__ARID2noJVa__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>-->
<!--        <div class="media media-number">-->
<!--            <div class="media-left">-->
<!--                <span class="num tag"><?php echo $i; ?></span>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <a href="<?php echo $item['url']; ?>" title="<?php echo htmlentities($item['title'] ?? ''); ?>"><?php echo htmlentities($item['title'] ?? ''); ?></a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <?php endforeach; endif; else: echo "" ;endif; $__LASTLIST__=$__ARID2noJVa__; ?>-->
<!--    </div>-->
<!--</div>-->
<!--&lt;!&ndash; E 推荐下载 &ndash;&gt;-->

<!--<div class="panel panel-blockimg">-->
<!--    <?php if((!0 || time()>0)&&(!0 || time()<0)): ?><?php echo cache('taglib_cms_block_content_28'); endif; ?>-->
<!--</div>-->


        </aside>
        
         
        
        
        
    </div>
</div>

 <script>
function copyWaybillNumber() {

  var textToCopy = $('#textToCopy').text();

  // 创建一个临时的输入框来存储要复制的文本
  var input = document.createElement("input");
  input.value = textToCopy;
  
  // 将临时输入框添加到页面中
  document.body.appendChild(input);
  
  // 选中临时输入框的文本
  input.select();
  
  // 执行复制操作
  document.execCommand("copy");
  
  // 移除临时输入框
  document.body.removeChild(input);
  
  // 可以添加一些用户反馈，比如弹窗提示复制成功
layer.msg('复制成功');
}

    </script>



</main>

<footer>
    <div id="footer">
        <div class="container">
            <div class="row footer-inner">
                <div class="col-xs-12">
                    <div class="footer-logo pull-left mr-4">
                        <a href="<?php echo addon_url('cms/index/index'); ?>"><i class="fa fa-bookmark"></i></a>
                    </div>
                    <div class="pull-left">
                        Copyright&nbsp;©&nbsp;<?php echo date("Y"); ?> All rights reserved. <?php echo \think\Config::get('cms.sitename'); ?>
                        <a href="https://beian.miit.gov.cn" target="_blank" rel="noopener">备案号</a>
                    <!--<ul class="list-unstyled list-inline mt-2">-->
                    <!--    <li><a href="<?php echo addon_url('cms/page/index', [':diyname'=>'aboutus']); ?>">关于我们</a></li>-->
                    <!--    <li><a href="<?php echo addon_url('cms/page/index', [':diyname'=>'agreement']); ?>">用户协议</a></li>-->
                    <!--    <?php if(config('fastadmin.usercenter')): ?>-->
                    <!--    <li><a href="<?php echo url('index/user/index'); ?>">会员中心</a></li>-->
                    <!--    <?php endif; ?>-->
                    <!--</ul>-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>

<div id="floatbtn">
    <!-- S 浮动按钮 -->

    <!--<?php if(isset($config['wxapp'])&&$config['wxapp']): ?>-->
    <!--<a href="javascript:;">-->
    <!--    <i class="iconfont icon-wxapp"></i>-->
    <!--    <div class="floatbtn-wrapper">-->
    <!--        <div class="qrcode"><img src="<?php echo htmlentities(cdnurl($config['wxapp'] ?? '') ?? ''); ?>"></div>-->
    <!--        <p>微信小程序</p>-->
    <!--        <p>微信扫一扫体验</p>-->
    <!--    </div>-->
    <!--</a>-->
    <!--<?php endif; ?>-->

    <!--<?php if(in_array('postarchives', explode(',', config('cms.usersidenav'))) && config('fastadmin.usercenter')): ?>-->
    <!--<a class="hover" href="<?php echo url('index/cms.archives/post'); ?>" target="_blank">-->
    <!--    <i class="iconfont icon-pencil"></i>-->
    <!--    <em>立即<br>投稿</em>-->
    <!--</a>-->
    <!--<?php endif; ?>-->

    <!--<div class="floatbtn-item floatbtn-share">-->
    <!--    <i class="iconfont icon-share"></i>-->
    <!--    <div class="floatbtn-wrapper" style="height:50px;top:0">-->
    <!--        <div class="social-share" data-initialized="true" data-mode="prepend">-->
    <!--            <a href="#" class="social-share-icon icon-weibo" target="_blank"></a>-->
    <!--            <a href="#" class="social-share-icon icon-qq" target="_blank"></a>-->
    <!--            <a href="#" class="social-share-icon icon-qzone" target="_blank"></a>-->
    <!--            <a href="#" class="social-share-icon icon-wechat"></a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!--<?php if($config['qrcode']): ?>-->
    <!--<a href="javascript:;">-->
    <!--    <i class="iconfont icon-qrcode"></i>-->
    <!--    <div class="floatbtn-wrapper">-->
    <!--        <div class="qrcode"><img src="<?php echo htmlentities(cdnurl($config['qrcode'] ?? '') ?? ''); ?>"></div>-->
    <!--        <p>微信公众账号</p>-->
    <!--        <p>微信扫一扫加关注</p>-->
    <!--    </div>-->
    <!--</a>-->
    <!--<?php endif; ?>-->

    <!--<?php if(isset($__ARCHIVES__) && $__ARCHIVES__['iscomment']): ?>-->
    <!--<a id="feedback" class="hover" href="#comments">-->
    <!--    <i class="iconfont icon-comment"></i>-->
    <!--    <em>发表<br>评论</em>-->
    <!--</a>-->
    <!--<?php endif; ?>-->

    <a id="back-to-top" class="hover" href="javascript:;">
        <i class="iconfont icon-backtotop"></i>
        <em>返回<br>顶部</em>
    </a>
    <!-- E 浮动按钮 -->
</div>


<script type="text/javascript" src="/assets/libs/jquery/dist/jquery.min.js?v=<?php echo $site['version']; ?>"></script>
<script type="text/javascript" src="/assets/libs/bootstrap/dist/js/bootstrap.min.js?v=<?php echo $site['version']; ?>"></script>
<script type="text/javascript" src="/assets/libs/fastadmin-layer/dist/layer.js?v=<?php echo $site['version']; ?>"></script>
<script type="text/javascript" src="/assets/libs/art-template/dist/template-native.js?v=<?php echo $site['version']; ?>"></script>
<script type="text/javascript" src="/assets/addons/cms/js/jquery.autocomplete.js?v=<?php echo $site['version']; ?>"></script>
<script type="text/javascript" src="/assets/addons/cms/js/swiper.min.js?v=<?php echo $site['version']; ?>"></script>
<script type="text/javascript" src="/assets/addons/cms/js/share.min.js?v=<?php echo $site['version']; ?>"></script>
<script type="text/javascript" src="/assets/addons/cms/js/cms.js?v=<?php echo $site['version']; ?>"></script>

<?php if($isWechat): ?>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
<?php endif; ?>

<script type="text/javascript" src="/assets/addons/cms/js/common.js?v=<?php echo $site['version']; ?>"></script>

{__SCRIPT__}


</body>
</html>