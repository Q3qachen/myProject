<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"C:\achen\phpstudy\WWW\myProject\rixiang\public/../application/admin\view\orders\edit.html";i:1774858886;s:82:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\layout\default.html";i:1774858886;s:79:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\meta.html";i:1774858886;s:81:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\script.html";i:1774858886;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Ordersn'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-ordersn" class="form-control" name="row[ordersn]" type="text" value="<?php echo htmlentities($row['ordersn'] ?? ''); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Userid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-userid" data-rule="required" class="form-control" name="row[userid]" type="number" value="<?php echo htmlentities($row['userid'] ?? ''); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('收货人信息'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <textarea id="c-name" class="form-control" name="row[name]" ><?php echo htmlentities($row['name'] ?? ''); ?></textarea>
        </div>
    </div>
    <!--<div class="form-group">-->
    <!--    <label class="control-label col-xs-12 col-sm-2"><?php echo __('Phone'); ?>:</label>-->
    <!--    <div class="col-xs-12 col-sm-8">-->
    <!--        <input id="c-phone" class="form-control" name="row[phone]" type="text" value="<?php echo htmlentities($row['phone'] ?? ''); ?>">-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="form-group">-->
    <!--    <label class="control-label col-xs-12 col-sm-2"><?php echo __('Address'); ?>:</label>-->
    <!--    <div class="col-xs-12 col-sm-8">-->
    <!--        <input id="c-address" class="form-control" name="row[address]" type="text" value="<?php echo htmlentities($row['address'] ?? ''); ?>">-->
    <!--    </div>-->
    <!--</div>-->
    
        <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('收货邮编'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-zipcode" class="form-control" name="row[zipcode]" type="text" value="<?php echo htmlentities($row['zipcode'] ?? ''); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kimage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-kimage" class="form-control" size="50" name="row[kimage]" type="text" value="<?php echo htmlentities($row['kimage'] ?? ''); ?>">
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
                <input id="c-cimage" class="form-control" size="50" name="row[cimage]" type="text" value="<?php echo htmlentities($row['cimage'] ?? ''); ?>">
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
            <input id="c-wnumber" class="form-control" name="row[wnumber]" type="text" value="<?php echo htmlentities($row['wnumber'] ?? ''); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('货物重量KG'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-weight" class="form-control" name="row[weight]" type="text" value="<?php echo htmlentities($row['weight'] ?? ''); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('货物体积（抛重）KG'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-volume" class="form-control" name="row[volume]" type="text" value="<?php echo htmlentities($row['volume'] ?? ''); ?>">
        </div>
    </div>
    
       <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('耗材'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
              <select  name='row[mables]' class="form-control" data-live-search="true" value="<?php echo htmlentities($row['mables'] ?? ''); ?>">
                        <option  value="0" <?php if(($row['mables'] == 0)): ?>selected <?php endif; ?>>无</option>
                        <option  value="18" <?php if(($row['mables'] == 18)): ?>selected <?php endif; ?>>550*380*300</option>
                        <option  value="16" <?php if(($row['mables'] == 16)): ?>selected <?php endif; ?>>445*350*350</option>
                        <option  value="13"  <?php if(($row['mables'] == 13)): ?>selected <?php endif; ?>>395*295*190</option>
                        <option  value="11"  <?php if(($row['mables'] == 11)): ?>selected <?php endif; ?>>320*230*145</option>
                        <option  value="9"  <?php if(($row['mables'] == 9)): ?>selected <?php endif; ?>>230*170*115</option>
                </select>
        </div>
    </div>
      <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Money'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-money" class="form-control" step="0.01" name="row[money]" type="number" value="<?php echo htmlentities($row['money'] ?? ''); ?>">
             <span class="text-gray">不填写订单金额时，系统自动按货物重量/体积加耗材计算出订单金额</span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('三方单号'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-party" class="form-control" name="row[party]" type="text" value="<?php echo htmlentities($row['party'] ?? ''); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Notes'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-notes" class="form-control" name="row[notes]" type="text" value="<?php echo htmlentities($row['notes'] ?? ''); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[status]', ['0'=>__('未入库'), '1'=>__('待打包'), '2'=>__('待打款'), '3'=>__('已发货')], $row['status']); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[time]" type="text" value="<?php echo $row['time']; ?>">
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
