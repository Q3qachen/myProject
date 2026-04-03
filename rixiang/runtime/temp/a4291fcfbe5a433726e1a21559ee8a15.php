<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"C:\achen\phpstudy\WWW\myProject\rixiang\public/../application/admin\view\scode\index.html";i:1774922776;s:82:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\layout\default.html";i:1774858886;s:79:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\meta.html";i:1774858886;s:81:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\script.html";i:1774858886;}*/ ?>
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
                                <style type="text/css">

    #myTabs li p {
        padding-top: 5px;
        margin-bottom: 0px;
        font-weight: 600;
        font-size: 15px;
    }

    .question {
        position: relative;
        padding: 10px 0;
    }

    .question label {
        transform-origin: left center;
        color: #4E73DF;
        font-size: 13px;
        padding: 8px 15px;
        display: block;
        position: absolute;
        margin-top: -40px;
        z-index: 2;
    }

    .question input[type="text"] {
        border: 1px solid #4E73DF;
        font-size: 15px;
        width: 100%;
        padding: 10px 45px 10px 15px;
        border-radius: 60px;
        color: #4E73DF;
    }

    .question input[type="text"]:focus {
        outline: none;
        background-image:linear-gradient(135deg,#66B3FF 10%,#0066CC 100%);
        color:white;
    }

    /* 相机按钮 */
    .scan-btn{
        position:absolute;
        right:15px;
        top:12px;
        font-size:20px;
        color:#4E73DF;
        cursor:pointer;
    }

    /* 扫码弹窗 */
    .modal {
        display:none;
        position:fixed;
        inset:0;
        background:rgba(0,0,0,0.6);
        z-index:9999;
    }

    .modal-content{
        width:90%;
        max-width:500px;
        height:400px;
        margin:80px auto;
        background:#fff;
        border-radius:10px;
        padding:10px;
    }

</style>


<div class="panel panel-default panel-intro">

    <?php echo build_heading(); ?>

    <div class="panel-heading" style='background-image:linear-gradient(135deg,#66B3FF 10%,#0066CC 100%) !important;'>
        <div class="panel-lead" style='color:#0066CC'><em>商品入库</em></div>
    </div>

    <div class="panel-body">

        <form id="myInput" action="scode/index" class="form-horizontal" role="form" method="POST">

            <div class="form-group">

                <label class="control-label col-xs-12 col-sm-2"></label>

                <div class="col-xs-12 col-sm-8 question">

                    <div style="position:relative">

                        <input id="ordersn" name="ordersn" type="text" placeholder="输入接货运单号" required>

                        <!-- 相机按钮 -->
                        <i id="scanBtn" class="fa fa-camera scan-btn"></i>

                    </div>

<!--                    <label>输入接货运单号</label>-->

                </div>

            </div>

            <input type="submit" value="Submit" style="display:none;"/>

        </form>



        <label class="control-label col-xs-12 col-sm-2"></label>

        <div class="col-xs-12 col-sm-8 question">

            <div class="col-xs-11 liebiao">

                <div id="toolbar" class="toolbar hidden">
                    <a href="javascript:;" class="btn btn-primary btn-refresh">
                        <i class="fa fa-refresh"></i>
                    </a>
                </div>

                <table id="table"
                       class="table table-striped table-bordered table-hover table-nowrap"
                       data-operate-edit="<?php echo $auth->check('test/edit'); ?>"
                       data-operate-del="<?php echo $auth->check('test/del'); ?>"
                       width="100%">
                </table>

            </div>

        </div>

        <div style="margin-bottom:20px"></div>

    </div>
</div>


<!-- 扫码弹窗 -->
<div id="scanModal" class="modal">
    <div class="modal-content">
        <div id="reader" style="width:100%;height:100%"></div>
    </div>
</div>


<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script src="/assets/libs/fastadmin-layer/src/layer.js"></script>

<!-- 扫码库 -->
<script src="https://unpkg.com/html5-qrcode"></script>


<script>

    $(document).ready(function(){

        // 如果不是手机就隐藏扫码按钮
        if(!isMobile()){
            $("#scanBtn").hide();
        }

        /* 回车提交 (保留你原逻辑) */
        $('#myInput').keydown(function(e){

            if(e.which == 13){

                e.preventDefault();

                var inputValue = $("#ordersn").val();

                var formData = { 'ordersn': inputValue };

                $.ajax({

                    url:'scode/index',
                    type:'POST',
                    data:formData,
                    dataType:"JSON",

                    success:function(response){

                        layer.msg(response.msg);

                        setTimeout(function(){

                            window.parent.location.reload();

                        },2500);

                    }

                });

            }

        });


        /* 自动聚焦 */
        $("#ordersn").focus();

    });

    function isMobile(){
        return /Android|iPhone|iPad|iPod|Mobile/i.test(navigator.userAgent);
    }

    $(document).ready(function(){



    });


    /* 手机扫码 */

    let html5QrCode;

    $("#scanBtn").click(function(){

        $("#scanModal").show();

        html5QrCode = new Html5Qrcode("reader");

        Html5Qrcode.getCameras().then(devices => {

            if(devices && devices.length){

                let cameraId = devices[0].id;

                html5QrCode.start(

                    cameraId,

                    {fps:10, qrbox:250},

                    (decodedText)=>{

                        $("#ordersn").val(decodedText);

                        html5QrCode.stop();

                        $("#scanModal").hide();

                        layer.msg("扫码成功");

                    }

                );

            }

        }).catch(err=>{

            layer.msg("无法调用摄像头");

        });

    });


</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version'] ?? ''); ?>"></script>
    </body>
</html>
