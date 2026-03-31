<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:88:"C:\achen\phpstudy\WWW\myProject\rixiang\public/../application/admin\view\orders\add.html";i:1774858886;s:82:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\layout\default.html";i:1774858886;s:79:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\meta.html";i:1774858886;s:81:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\script.html";i:1774858886;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta name="referrer" content="never">
<meta name="robots" content="noindex, nofollow">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<?php if(\think\Config::get('fastadmin.adminskin')): ?>
<link href="/assets/css/skins/<?php echo \think\Config::get('fastadmin.adminskin'); ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">
<?php endif; ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config ?? ''); ?>
    };
</script>

    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !\think\Config::get('fastadmin.multiplenav') && \think\Config::get('fastadmin.breadcrumb')): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <?php if($auth->check('dashboard')): ?>
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                    <?php endif; ?>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Ordersn'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-ordersn" class="form-control" name="row[ordersn]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Userid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-userid" data-rule="required" class="form-control" name="row[userid]" type="number">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('收货人信息'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-name" class="form-control" name="row[name]" type="text">
        </div>
    </div>
    <!--<div class="form-group">-->
    <!--    <label class="control-label col-xs-12 col-sm-2"><?php echo __('Phone'); ?>:</label>-->
    <!--    <div class="col-xs-12 col-sm-8">-->
    <!--        <input id="c-phone" class="form-control" name="row[phone]" type="text">-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="form-group">-->
    <!--    <label class="control-label col-xs-12 col-sm-2"><?php echo __('Address'); ?>:</label>-->
    <!--    <div class="col-xs-12 col-sm-8">-->
    <!--        <input id="c-address" class="form-control" name="row[address]" type="text">-->
    <!--    </div>-->
    <!--</div>-->
    
      <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('收货邮编'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-zipcode" class="form-control" name="row[zipcode]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Money'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-money" class="form-control" step="0.01" name="row[money]" type="number">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kimage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-kimage" class="form-control" size="50" name="row[kimage]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="faupload-kimage" class="btn btn-danger faupload" data-input-id="c-kimage" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp,image/webp" data-multiple="false" data-preview-id="p-kimage"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-kimage" class="btn btn-primary fachoose" data-input-id="c-kimage" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-kimage"></span>
            </div>
            <ul class="row list-inline faupload-preview" id="p-kimage"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Cimage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-cimage" class="form-control" size="50" name="row[cimage]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="faupload-cimage" class="btn btn-danger faupload" data-input-id="c-cimage" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp,image/webp" data-multiple="false" data-preview-id="p-cimage"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-cimage" class="btn btn-primary fachoose" data-input-id="c-cimage" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-cimage"></span>
            </div>
            <ul class="row list-inline faupload-preview" id="p-cimage"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Wnumber'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-wnumber" class="form-control" name="row[wnumber]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('三方单号'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-party" class="form-control" name="row[party]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Notes'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-notes" class="form-control" name="row[notes]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"2"))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[time]" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-primary btn-embossed disabled"><?php echo __('OK'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version'] ?? ''); ?>"></script>
    </body>
</html>
