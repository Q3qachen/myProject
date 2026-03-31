<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\db;
/**
 * 订单管理
 *
 * @icon fa fa-circle-o
 */
class Orders extends Backend
{

    /**
     * Orders模型对象
     * @var \app\admin\model\Orders
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Orders;
        $status =$this->model->getStatusList();
        $array = array();
        foreach ($status as $key=>$val){
            $orders =$this->model->where('status',$key)->count();
            $array[$key] = ['a'=>$val,'b'=>$orders];
        }
          $this->view->assign("statusList", $array);
      // $this->view->assign("statusList", $this->model->getStatusList());
      
    }



    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */


    /**
     * 查看
     */
    public function index()
    {
      
       
        //当前是否为关联查询
        $this->relationSearch = true;
        //设置过滤方法
        $this->request->filter(['strip_tags', 'trim']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();

            $list = $this->model
                    ->with(['user'])
                    ->where($where)
                    ->order($sort, $order)
                    ->paginate($limit);

            foreach ($list as $row) {
                
                $row->getRelation('user')->visible(['nickname']);
            }

            $result = array("total" => $list->total(), "rows" => $list->items());

            return json($result);
        }
        return $this->view->fetch();
    }
    
    
    //商品入库
      public function indexs()
    {
        //当前是否为关联查询
      
        //设置过滤方法
        $this->request->filter(['strip_tags', 'trim']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();

            $list = $this->model
                    ->where('status',1)
                    ->where($where)
                    ->order($sort, $order)
                    ->paginate($limit);

       

            $result = array("total" => $list->total(), "rows" => $list->items());

            return json($result);
        }
        return $this->view->fetch();
    }
    
        /**
     * 编辑
     *
     * @param $ids
     * @return string
     * @throws DbException
     * @throws \think\Exception
     */
    public function edit($ids = null)
    {
        $row = $this->model->get($ids);
        if (!$row) {
            $this->error(__('No Results were found'));
        }
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds) && !in_array($row[$this->dataLimitField], $adminIds)) {
            $this->error(__('You have no permission'));
        }
        if (false === $this->request->isPost()) {
            $this->view->assign('row', $row);
            return $this->view->fetch();
        }
        $params = $this->request->post('row/a');
        if (empty($params)) {
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $params = $this->preExcludeFields($params);
        $result = false;
        Db::startTrans();
        try {
            //是否采用模型验证
            if ($this->modelValidate) {
                $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : $name) : $this->modelValidate;
                $row->validateFailException()->validate($validate);
            }
            $result = $row->allowField(true)->save($params);
            $mables = $params['mables'];
           
           //查询出体积重量的金额
            $var1 = $params['weight'];
            $var2 = $params['volume'];
             
            if ($var1 > $var2) {
               $weight =$var1;
            } elseif ($var1 < $var2) {
                $weight =$var2;
            } else {
                $weight =$var2;
            }
            
         if ($weight > 0&&$weight <= 0.5) {
               $datas = 90;
               $cost = 72;
         }elseif ($weight > 0.5&&$weight <= 1) {
              $datas = 110;
               $cost = 88;
         }elseif ($weight > 1&&$weight <= 1.5) {
               $datas = 130;
               $cost = 104;
         }elseif ($weight > 1.5&&$weight <= 2) {
               $datas = 150;
               $cost = 120;
         }elseif ($weight > 2&&$weight <= 2.5) {
             $datas = 170;
               $cost = 102;
         }elseif ($weight > 2.5&&$weight <= 3) {
             $datas = 190;
               $cost = 114;
         }elseif ($weight > 3&&$weight <= 3.5) {
             $datas = 210;
              $cost = 126;
         }elseif ($weight > 3.5&&$weight <= 4) {
            $datas = 230;
               $cost = 138;
         }elseif ($weight > 4&&$weight <= 4.5) {
               $datas = 250;
               $cost = 150;
         }elseif ($weight > 4.5&&$weight <= 5) {
             $datas = 270;
               $cost = 162;
         }elseif ($weight > 5&&$weight <= 5.5) {
             $datas = 290;
               $cost = 174;
         }elseif ($weight > 5.5&&$weight <= 6) {
             $datas = 310;
              $cost = 186;
         }elseif ($weight > 6&&$weight <= 6.5) {
            $datas = 330;
               $cost = 198;
         }elseif ($weight > 6.5&&$weight <= 7) {
             $datas = 350;
               $cost = 210;
         }elseif ($weight > 7&&$weight <= 7.5) {
            $datas = 370;
               $cost = 222;
         }elseif ($weight > 7.5&&$weight <= 8) {
             $datas = 390;
               $cost = 234;
         }elseif ($weight > 8&&$weight <= 8.5) {
             $datas = 410;
             $cost = 246;
         }elseif ($weight > 8.5&&$weight <= 9) {
             $datas = 430;
               $cost = 258;
         }elseif ($weight > 9&&$weight <= 9.5) {
            $datas = 450;
               $cost = 270;
         }elseif ($weight > 9.5&&$weight <= 10) {
            $datas = 470;
               $cost = 282;
         }elseif ($weight > 10&&$weight <= 11) {
            $datas = 198;
               $cost = 137.5;
         }elseif ($weight > 11&&$weight <= 12) {
             $datas = 216;
               $cost = 150;
         }elseif ($weight > 12&&$weight <= 13) {
            $datas = 234;
               $cost = 162.5;
         }elseif ($weight > 13&&$weight <= 14) {
             $datas = 252;
               $cost = 175;
         }elseif ($weight > 14&&$weight <= 15) {
             $datas = 270;
               $cost = 187.5;
         }elseif ($weight > 15&&$weight <= 16) {
            $datas = 288;
               $cost = 200;
         }elseif ($weight > 16&&$weight <= 17) {
             $datas = 306;
               $cost = 212.5;
         }elseif ($weight > 17&&$weight <= 18) {
             $datas = 324;
               $cost = 225;
         }elseif ($weight > 18&&$weight <= 19) {
             $datas = 342;
               $cost = 237.5;
         }elseif ($weight > 19&&$weight <= 20) {
             $datas = 360;
               $cost = 250;
         }elseif ($weight > 20&&$weight <= 21) {
            $datas = 336;
               $cost = 252;
         }elseif ($weight > 21&&$weight <= 22) {
             $datas = 352;
               $cost = 264;
         }elseif ($weight > 22&&$weight <= 23) {
            $datas = 368;
               $cost = 276;
         }elseif ($weight > 23&&$weight <= 24) {
            $datas = 384;
               $cost = 288;
         }elseif ($weight > 24&&$weight <= 25) {
             $datas = 400;
               $cost = 300;
         }elseif ($weight > 25&&$weight <= 26) {
            $datas = 416;
               $cost = 312;
         }elseif ($weight > 26&&$weight <= 27) {
            $datas = 432;
               $cost = 324;
         }elseif ($weight > 27&&$weight <= 28) {
             $datas = 448;
               $cost = 336;
         }elseif ($weight > 28&&$weight <= 29) {
            $datas = 464;
               $cost = 348;
         }elseif ($weight > 29&&$weight <= 30) {
               $datas = 480;
               $cost = 360;
         }else {
                $datas = ceil($weight)*16;
                $cost = ceil($weight)*12;
         }
            $moeny=0;
            $costmoeny=0;
           //用重量的金额加耗材金额=最终订单金额
           if($weight){
                $moeny = (float)$mables + $datas; //支付金额
                $costmoeny  = (float)$mables + $cost; //成本
            }
            
             $list =  db::name('orders')->where('id',$ids)->find();
             $user = db::name('user')->where('id',$list['userid'])->find();
             if($params['money']==0){
                 
                 
                    db::name('orders')->where('out_trade_no',$list['out_trade_no'])->update(['money'=>$moeny,'weight'=>$params['weight'],'wnumber'=>$params['wnumber'],'volume'=>$params['volume'],'mables'=>$params['mables'],'cimage'=>$params['cimage'],'cost_price'=>$costmoeny]);
                  
             }else{
                 db::name('orders')->where('out_trade_no',$list['out_trade_no'])->update(['money'=>$params['money'],'weight'=>$params['weight'],'wnumber'=>$params['wnumber'],'volume'=>$params['volume'],'mables'=>$params['mables'],'cimage'=>$params['cimage'],'cost_price'=>$costmoeny]);  
             }
             
             if(($params['status']==2) or ($params['status']==3)){
                  db::name('orders')->where('out_trade_no',$list['out_trade_no'])->update(['status'=>$params['status']]);
             }
             //付款通知
             if($params['status']==2){
               
                $templateId = 'YWuLwHgw8be5cSdAO5N4cu6Yo4jTbGw2pkYngXUvlSA'; // 你的模板ID
                $openid = $user['openid']; // 用户的OpenID
                $url = 'http://cons.lncbe.com/index/dingdan'; // 点击跳转的URL（可选）
                $data = [
                   
                    "character_string6" => ["value" => $list['out_trade_no']],
                    "amount3" => ["value" => $list['money']]
                   
                ];
                 
                $accessToken = $this->getAccessToken('wx12a0a1b2ba3d4c8f', 'c9bf3f30d56bcdf16ef83ffa724c911a'); // 获取Access Token
                $result = $this->sendTemplateMessage($accessToken, $templateId, $openid, $url, $data); // 发送模板消息
                // print_r($result);
             }  
             //发货通知
            if($params['status']==3){
//                $templateId = 'Vlj5D40rN2Vp85YtsBvg_QfOjtatoR-LshHXnCeBAtM'; // 你的模板ID
//                $openid = $user['openid']; // 用户的OpenID
//                $url = 'http://cons.lncbe.com/index/dingdan'; // 点击跳转的URL（可选）
//                $data = [
//
//                    "character_string1" => ["value" => $list['out_trade_no']],
//                    "character_string8" => ["value" => $list['wnumber']],
//                    "time3" => ["value" => date('Y-m-d H:i:s',time())]
//
//                ];
//
//                $accessToken = $this->getAccessToken('wx12a0a1b2ba3d4c8f', 'c9bf3f30d56bcdf16ef83ffa724c911a'); // 获取Access Token
//                $result = $this->sendTemplateMessage($accessToken, $templateId, $openid, $url, $data); // 发送模板消息
                //  print_r($result);
            }
            
            Db::commit();
        } catch (ValidateException|PDOException|Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
        }
        if (false === $result) {
            $this->error(__('No rows were updated'));
        }
        $this->success();
    }
    
    
       /**
     * 编辑
     *
     * @param $ids
     * @return string
     * @throws DbException
     * @throws \think\Exception
     */
    public function edits($ids = null)
    {
        $row = $this->model->get($ids);
        if (!$row) {
            $this->error(__('No Results were found'));
        }
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds) && !in_array($row[$this->dataLimitField], $adminIds)) {
            $this->error(__('You have no permission'));
        }
        if (false === $this->request->isPost()) {
            $this->view->assign('row', $row);
            return $this->view->fetch();
        }
        $params = $this->request->post('row/a');
        if (empty($params)) {
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $params = $this->preExcludeFields($params);
        $result = false;
        Db::startTrans();
        try {
            //是否采用模型验证
            if ($this->modelValidate) {
                $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : $name) : $this->modelValidate;
                $row->validateFailException()->validate($validate);
            }
            $result = $row->allowField(true)->save($params);
            Db::commit();
        } catch (ValidateException|PDOException|Exception $e) {
            Db::rollback();
            $this->error($e->getMessage());
        }
        if (false === $result) {
            $this->error(__('No rows were updated'));
        }
        $this->success();
    }
    
    
    //拆分订单
    public function splitting($ids = null){
      
        if($ids){
            $where['id'] = array('in',$ids);
        }else{
             returnApi('0','至少选择一项');
        }
        $out_trade_no = $this->getordernumber();

        $this->model->where($where)->update(['out_trade_no' => $out_trade_no]);
        returnApi('1','操作完成');
    }

    
     public function getordernumber() {
        $ordernumber = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
         return $ordernumber;
    }
    
    
    
    
    
    
    
    
    
   //获取token 
    
function getAccessToken($appId, $appSecret) {
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
    $response = file_get_contents($url);
    $json = json_decode($response, true);
   
    return $json['access_token'];
}

    //发送消息
function sendTemplateMessage($accessToken, $templateId, $openid, $url, $data) {
    $postData = [
        'touser' => $openid,
        'template_id' => $templateId,
        'url' => $url,
        'data' => $data,

    ];
 
    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$accessToken}";
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($postData)
        ]
    ];
    
   
    $context = stream_context_create($options);
  
    $result = file_get_contents($url, false, $context);
    return json_decode($result, true);
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
