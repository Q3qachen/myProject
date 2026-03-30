<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"C:\achen\phpstudy\WWW\myProject\rixiang\public/../application/index\view\baoguo\index.html";i:1774858886;s:82:"C:\achen\phpstudy\WWW\myProject\rixiang\application\index\view\layout\default.html";i:1774858886;s:79:"C:\achen\phpstudy\WWW\myProject\rixiang\application\index\view\common\meta.html";i:1774858886;s:81:"C:\achen\phpstudy\WWW\myProject\rixiang\application\index\view\common\script.html";i:1774858886;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'') ?? ''); ?> – <?php echo htmlentities($site['name'] ?? ''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<?php if(isset($keywords)): ?>
<meta name="keywords" content="<?php echo htmlentities($keywords ?? ''); ?>">
<?php endif; if(isset($description)): ?>
<meta name="description" content="<?php echo htmlentities($description ?? ''); ?>">
<?php endif; ?>

<link rel="shortcut icon" href="/assets/img/favicon.ico" />

<link href="/assets/css/frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo htmlentities(\think\Config::get('site.version') ?? ''); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config: <?php echo json_encode($config ?? ''); ?>
    };
</script>

        <link href="/assets/css/user.css?v=<?php echo htmlentities(\think\Config::get('site.version') ?? ''); ?>" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-white navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url('/'); ?>"><?php echo htmlentities($site['name'] ?? ''); ?></a>
                </div>
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-right">
                       
                         <li><a href="<?php echo url('/'); ?>"><?php echo __('Home'); ?></a></li>
                        <li class="dropdown">
                            <?php if($user): ?>
                            <a href="<?php echo url('user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="avatar-img"><img src="<?php echo cdnurl(htmlentities($user['avatar'] ?? '') ?? ''); ?>" alt=""></span>
                                <span class="visible-xs-inline-block" style="padding:5px;"><?php echo $user['nickname']; ?> <b class="caret"></b></span>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo url('user/index'); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Member center'); ?> <b class="caret"></b></a>
                            <?php endif; ?>
                            <ul class="dropdown-menu">
                                <?php if($user): ?>
                                <li><a href="<?php echo url('user/index'); ?>"><i class="fa fa-user-circle fa-fw"></i><?php echo __('User center'); ?></a></li>
                                <li><a href="<?php echo url('user/profile'); ?>"><i class="fa fa-user-o fa-fw"></i><?php echo __('Profile'); ?></a></li>
                                <li><a href="<?php echo url('user/changepwd'); ?>"><i class="fa fa-key fa-fw"></i><?php echo __('Change password'); ?></a></li>
                                <li><a href="<?php echo url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i><?php echo __('Sign out'); ?></a></li>
                                <?php else: ?>
                                <li><a href="<?php echo url('user/login'); ?>"><i class="fa fa-sign-in fa-fw"></i> <?php echo __('Sign in'); ?></a></li>
                                <li><a href="<?php echo url('user/register'); ?>"><i class="fa fa-user-o fa-fw"></i> <?php echo __('Sign up'); ?></a></li>
                                <?php endif; ?>

                            </ul>
                        </li>
                         <li><a href="<?php echo url('baoguo/index'); ?>"><i class="fa fa-shopping-bag fa-fw"></i><?php echo __('添加包裹'); ?></a></li>
                         <li><a href="<?php echo url('yunfei/index'); ?>"><i class="fa fa-calculator fa-fw"></i><?php echo __('运费测算'); ?></a></li>
                         <li><a href="<?php echo url('dingdan/index'); ?>"><i class="fa fa-reorder fa-fw"></i><?php echo __('订单列表'); ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="content">
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .panel-post {
        position: relative;
    }

    .btn-post {
        position: absolute;
        right: 0;
        bottom: 10px;
    }

    .img-border {
        border-radius: 3px;
        box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05);
    }

    .embed-responsive img {
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .channel-list li a {
        color: #2c3e50;
    }

    .channel-list li.active a, .channel-list li a:hover {
        color: #3c8dbc;
    }

    .channel-list li.active a {
        font-weight: bold;
    }

    .panel-user h4 {
        font-weight: normal;
        font-size: 14px;
    }

    .pretty-btn {

        background-color: #1a98d5; /* 绿色背景 */
        border: none;
        color: white; /* 白色文本 */
        padding: 6px 100px; /* 内边距 */
        text-align: center; /* 居中文本 */
        text-decoration: none; /* 无文本装饰 */
        display: inline-block; /* 行内块显示 */
        font-size: 14px; /* 字体大小 */
        margin: 4px 2px; /* 外边距 */
        cursor: pointer; /* 手形鼠标光标 */
        border-radius: 15px; /* 边框圆角 */
        transition: box-shadow 0.5s ease; /* 盒子阴影过渡效果 */
    }

    .pretty-btn:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19); /* 悬停时盒子阴影 */
    }
    .ivner input{
        margin: 15px 0;
        border-radius: 15px;
    }
    
     input, button {
        margin: 10px;
        padding: 8px;
    }

    #trackingNumbers {
        margin-top: 20px;
    }
   
   
   .uni-button {

     font-size: 15px;
    text-align: center;
    text-decoration: none;
      line-height: 1.42857143;
    border-radius: 8px;
    -webkit-tap-highlight-color: transparent;
    overflow: hidden;
    color: #000;
    background-color: #f8f8f8;
   
    width: 35px;
   }
   .contrs{
     width: 70%;
    height: 33px;
    font-size: 13px;
   
    color: #555555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
   }
  .contrs:focus {
    border-color: #66afe9; 
   outline: none; /* 去除轮廓 */
}
.listest{
    list-style-type:none;
}
</style>
<div class="container mt-20">
    <div id="content-container">
        <div class="row">
           
            <div class="col-md-9">
                <div class="panel panel-default panel-user">
                    <div class="panel-body">
                        <div class="panel-post">
                            <h2 class="page-header" style="font-size: 18px;">添加包裹</h2>
                        </div>

                            <div class="ivner" style="width:100%">
                                   <textarea  type="text"  id="name" style="
                                     border-radius: 15px; " class="form-control" placeholder="收货信息" name="name"></textarea>
                                     <input  type="text" name="zipcode" id="zipcode" value="" class="form-control"  placeholder="邮编"/>
                                         
                                   <div class="flex">
                                        <input 
                                            type="text" 
                                            id="trackingInput" 
                                            placeholder="输入运单号" 
                                            class="flex-1 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        >
                                        <button 
                                            id="addBtn" 
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg transition duration-200"
                                        >
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                        
                                         <div id="emptyState" class="text-center py-8 text-gray-500">
                                                 <p>暂无运单号，请添加</p>
                                        </div>
                                         <ul id="trackingList"   class="space-y-3 hidden">
                                           
                                        </ul>
                                   

                                    <input  type="text" name="notes" id="notes" value="" class="form-control"  placeholder="商品备注"/>
                                    <div style="margin-bottom: 20px;"></div>
                                    <div style=" display: flex;justify-content: center;align-items: center;"><button onclick="recharge()" class="pretty-btn">提交包裹</button></div>
                            </div>
                          </div>
                            <hr>
                          <div style="font-size: 13px;color: #000000;padding: 10px 10px">
                            <p>说明：</p>
                            <p>1.收货信息、邮编粘贴国外信息</p>
                            <p>2.运单号填写邮往仓库的运单号</p>
                            <p>3.货物到达后会回写发出的运单号</p>
                            <p>4.商品备注为选填项</p>
                        
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
       </div>
       
</div>



<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script>
    

                function recharge(){
                       var items = [];
                    var listItems = document.querySelectorAll('#trackingList li');
                  
                    listItems.forEach(function(item) {
                        items.push(item.textContent); // 或者 item.innerText 根据浏览器兼容性选择使用哪个
                    });
                    let ordersn = items.map(item => item.split(/\s+/).join('')).filter(item => item);
                   
                     
                var name = $("#name").val();
                    if (name == ''){
                        layer.msg('请输入收货人信息');
                        return;
                    }
                var zipcode = $("#zipcode").val();
                    if (zipcode == ''){
                        layer.msg('请输入邮编');
                        return;
                    }
               
               
                if (ordersn == ''){
                layer.msg('请输入运单号');
                return;
                }
      
                
                var notes = $("#notes").val();
                var msg = '确定提交包裹？';
                layer.msg(msg, {
                        btn: ['确定', '取消']
                        ,yes: function(index, layero){
                                $.ajax({
                                type:"POST",
                                url:"baoguo/add",//提交数据接口
                                data:{name:name,ordersn:ordersn,notes:notes,zipcode:zipcode},
                                dataType:"JSON",
                                success:function (res) {
                                  layer.msg(res.msg);
                                },
                                  error: function(ress) {
                                    layer.msg(ress.msg);
                                  }
                              });
                            }
                        ,btn2: function(index, layero){
                        //按钮【按钮二】的回调
                            layer.msg("已取消");
                            return false //开启该代码可禁止点击该按钮关闭
                        }
                     });
                }
         
    
    
 
        document.addEventListener('DOMContentLoaded', function() {
           
            const trackingInput = document.getElementById('trackingInput');
            const addBtn = document.getElementById('addBtn');
            const trackingList = document.getElementById('trackingList');
            const emptyState = document.getElementById('emptyState');
            
            // 从localStorage加载数据
            let trackingNumbers = JSON.parse(localStorage.getItem('trackingNumbers')) || [];
            
            // 渲染列表
            function renderList() {
                trackingList.innerHTML = '';
                
                if (trackingNumbers.length === 0) {
                    trackingList.classList.add('hidden');
                    emptyState.classList.remove('hidden');
                    return;
                }
                
                trackingNumbers.forEach((number, index) => {
                    const li = document.createElement('li');
                    li.className = 'listest bg-gray-50 rounded-lg flex justify-between items-center fade-in';
                    li.innerHTML = `
                        <span class="text-gray-700">${number}</span>
                        <button 
                            class="delete-btn text-red-500 hover:text-red-700 transition duration-200"
                            data-index="${index}"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                    trackingList.appendChild(li);
                });
                
                trackingList.classList.remove('hidden');
                emptyState.classList.add('hidden');
            }
            
            // 添加运单号
            addBtn.addEventListener('click', function() {
                const number = trackingInput.value.trim();
                if(!number){
                     layer.msg('运单号不能为空！');
                     return;
                }
                
                if (!number) {
                    trackingInput.classList.add('shake');
                    setTimeout(() => trackingInput.classList.remove('shake'), 500);
                    return;
                }
                
                if (trackingNumbers.includes(number)) {
                   layer.msg('该运单号已存在！');
                    return;
                }
                
                trackingNumbers.unshift(number);
                localStorage.setItem('trackingNumbers', JSON.stringify(trackingNumbers));
                trackingInput.value = '';
                renderList();
            });
            
            // 回车添加
            trackingInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    addBtn.click();
                }
            });
            
            // 删除运单号
            trackingList.addEventListener('click', function(e) {
                if (e.target.classList.contains('delete-btn') || e.target.closest('.delete-btn')) {
                    const btn = e.target.classList.contains('delete-btn') ? e.target : e.target.closest('.delete-btn');
                    const index = parseInt(btn.dataset.index);
                    
                    trackingNumbers.splice(index, 1);
                    localStorage.setItem('trackingNumbers', JSON.stringify(trackingNumbers));
                    renderList();
                }
            });
            
            // 初始渲染
            renderList();
        });

</script>
        </main>

        <footer class="footer" style="clear:both">
            <p class="copyright">Copyright&nbsp;©&nbsp;<?php echo date("Y"); ?> <?php echo htmlentities($site['name'] ?? ''); ?> All Rights Reserved <a href="https://beian.miit.gov.cn" target="_blank"><?php echo htmlentities($site['beian'] ?? ''); ?></a></p>
        </footer>

        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-frontend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version'] ?? ''); ?>"></script>

    </body>

</html>
