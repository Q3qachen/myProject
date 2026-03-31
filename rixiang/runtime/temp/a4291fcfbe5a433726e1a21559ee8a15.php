<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"C:\achen\phpstudy\WWW\myProject\rixiang\public/../application/admin\view\scode\index.html";i:1774858886;s:82:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\layout\default.html";i:1774858886;s:79:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\meta.html";i:1774858886;s:81:"C:\achen\phpstudy\WWW\myProject\rixiang\application\admin\view\common\script.html";i:1774858886;}*/ ?>
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
        #myTabs li a{
            height: 128px;
        }
        .cheek {
            width: 100%;
            /*height: 120px;*/
            overflow: auto;
            border: 1px solid #DBDBDB;
            border-radius: 10px;
            padding: 10px 20px;
            /*margin-bottom: 20px;*/
           
        }
        .cheek:hover {
            background-color: #B1EBE6;
            border-color: #33CABB;
        }
        .pro-img {
            padding: 10px 0;
            float: left;
            width: 20%;
            /*background-color: #33CABB;*/
        }
        .pro-img img {
            width: 70px;
            /*width: 100%;*/
        }
        .pro-content {
            float: right;
            padding-left: 30px;
            width: 80%;
        }
        .describe {
            height:20px;
            overflow: hidden;
            text-overflow: ellipsis;
            display:-webkit-box;
            -webkit-box-orient:vertical;
            -webkit-line-clamp:1;
        }
        .name {
            overflow: hidden;
            text-overflow: ellipsis;
          
        }
        .elem {
          display: none;
        }
     

  
    .question {
      position: relative;
      padding: 10px 0;
    }
    .question:first-of-type {
      padding-top: 0;
    }
    .question:last-of-type {
      padding-bottom: 0;
    }
    .question label {
      transform-origin: left center;
      color: #4E73DF;
      font-weight: 100;
      /*letter-spacing: 0.01em;*/
      font-size: 13px;
      box-sizing: border-box;
      padding: 8px 15px;
      display: block;
      position: absolute;
      margin-top: -40px;
      z-index: 2;
      pointer-events: none;
      font-weight: 400;
    }
    .question small{
      font-size: 13px;
      box-sizing: border-box;
      padding: 8px 15px;
      display: block;
      position: absolute;
      margin-top: -40px;
      margin-left: 80px;
      z-index: 2;
      color:#0c8adf;
      margin-left:200px;
    }
    .question input[type="text"] {
      appearance: none;
      background-color: none;
      border: 1px solid #4E73DF;
      line-height: 0;
      font-size: 15px;
      width: 90%;
      display: block;
      box-sizing: border-box;
      padding: 10px 15px;
      border-radius: 60px;
      color: #4E73DF;
      font-weight: 100;
      letter-spacing: 0.01em;
      position: relative;
      z-index: 1;
       
    }
    .question input[type="text"]:focus {
      outline: none;
         background-image:linear-gradient( 135deg, #66B3FF 10%, #0066CC 100%) !important;
      color: white;
      margin-top: 30px;
    }
    .question input[type="text"]:valid {
      margin-top: 30px;
    }
    .question input[type="text"]:focus ~ label {
      -moz-transform: translate(0, -35px);
      -ms-transform: translate(0, -35px);
      -webkit-transform: translate(0, -35px);
      transform: translate(0, -35px);
    }
    .question input[type="text"]:valid ~ label {
      /*text-transform: uppercase;*/
      /*font-style: italic;*/
     
      -moz-transform: translate(0px, -35px) scale(1);
      -ms-transform: translate(0px, -35px) scale(1);
      -webkit-transform: translate(0px, -35px) scale(1);
      transform: translate(0px, -35px) scale(1);
    }
    
     .sections{
        float:right;
        width:94%; 
        height:600px;
        position: relative;
    
    }
     .section{
        width: 80%;
        height: 550px;
        position: absolute;
    	top: 0;
    	left: 0;
    	right: 0;
    	bottom: 0;
    	margin: auto;
       }
        
    .back{
         /*background-image:linear-gradient( 135deg, #66B3FF 10%, #0066CC 100%) !important;*/
    }
    .diqu{
      border: 1px solid #4E73DF;
      line-height: 0;
      box-sizing: border-box;
      border-radius: 30px;
      color: #4E73DF;
      
    }
    
    .liebiao{
      margin-top:50px;
      border: 1px solid #4E73DF;
      line-height: 0;
      font-size: 15px;
      display: block;
      box-sizing: border-box;
      padding: 10px 15px;
      border-radius: 30px;
      color: #4E73DF;
      font-weight: 100;
    }
         
         
      
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
        }
        .modal-content {
            width: 80%;
            height: 80%;
            margin: auto;
            background: white;
        }
  
    </style>


<div class="panel panel-default panel-intro">
    <?php echo build_heading(); ?>
    <div class="panel-heading" style='background-image:linear-gradient( 135deg, #66B3FF 10%, #0066CC 100%) !important;'>
        <div class="panel-lead" style='color:#0066CC'><em>商品入库</em></div>
    </div>
    <div class="panel-body">

        <form id="myInput" action="scode/index" class="form-horizontal" role="form" data-toggle="validator" method="POST"
             >
            <div class="form-group">
            </div>
            
           <div class="form-group">
                <label class="control-label col-xs-12 col-sm-2"><?php echo __(''); ?></label>
                <div class="col-xs-12 col-sm-8 question">
                    <input id="ordersn"  name="ordersn" type="text" required>
                     <label>输入接货运单号</label>
                </div>
            </div>
             <input type="submit" value="Submit" style="display: none;" />
        </form>
     
         <label class="control-label col-xs-12 col-sm-2"><?php echo __(''); ?></label>
          <div class="col-xs-12 col-sm-8 question">
                                <div class="col-xs-11 liebiao">
                                    <!-- 刷新页面的重点-->
                                  <div id="toolbar" class="toolbar hidden">
                                         <a href="javascript:;" class="btn btn-primary btn-refresh"><i class="fa fa-refresh"></i></a>
                                    </div>
                                     <!-- 刷新页面的重点-->
                                 <table id="table" class="table table-striped table-bordered table-hover table-nowrap"
                           data-operate-edit="<?php echo $auth->check('test/edit'); ?>" 
                           data-operate-del="<?php echo $auth->check('test/del'); ?>" 
                           width="100%">
                    </table>
                                  

                              </div>
                        </div>
                        <div style="margin-bottom:20px"></div>
    </div>

</div>

 <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
 <script src="/assets/libs/fastadmin-layer/src/layer.js"></script>
<script>



$(document).ready(function() {
  $('#myInput').keydown(function(e) {
    if(e.which == 13) { // 检查按键是否是回车键
      e.preventDefault(); // 阻止表单默认提交
      var inputValue = $("#ordersn").val(); // 获取输入值
      var formData = { 'ordersn': inputValue }; // 创建表单数据对象
 
      // 使用Ajax提交数据
      $.ajax({
        url: 'scode/index', // 服务器端点
        type: 'POST',
        data: formData,
        dataType:"JSON",
        success: function(response) {
          // 成功回调函数
        
          layer.msg(response.msg);
          
          setTimeout(function() {
             window.parent.location.reload();
             }, 2500);
        
           
        },
      
      });
    }
  });
});

//光标自动进入input
document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('ordersn');
            input.focus();
            
            // 可选：设置光标位置（如果需要）
            // input.setSelectionRange(0, 0);
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
