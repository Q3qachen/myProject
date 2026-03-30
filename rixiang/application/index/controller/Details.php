<?php

namespace app\index\controller;
use app\common\controller\Frontend;
use think\db;

/**
 * 消费订单详情
 */
class Details extends Frontend
{
    protected $layout = 'default';
    protected $noNeedLogin = [];
    protected $noNeedRight = ['*'];

    /**
     * 我的消费订单
     */
    public function index()
    {
        $user_id = $this->auth->id; //获取uid
         $input = input();
      
         $out_trade_no = $input['out_trade_no'];
        
       
              $result=db::name('orders')->where('out_trade_no',$out_trade_no)->select(); 
              $set = db::name('orders')->where('out_trade_no',$out_trade_no)->find();
              $weight = $set['weight'];
              $volume = $set['volume'];
              $time = $set['time'];
             
         
        
         switch ($set['status']) {
                     case 0:
                      $status= '未入库';
                        break;
                    case 1:
                      $status=  '待打包';
                        break;
                    case 2:
                      $status=  '待付款';
                        break;
                         case 4:
                      $status=  '已支付';
                        break;
                  default:
                      $status= '已发货';
            }
         
        $this->view->assign('wnumber', $set['wnumber']); //发货单号
         $this->view->assign('out_trade_no', $set['out_trade_no']); //支付订单号
         $this->view->assign('status', $status);
        $this->view->assign('weight', $weight);
        $this->view->assign('volume', $volume);
        $this->view->assign('times', $time);
        $this->view->assign('count', count($result));
        $this->view->assign('money', $set['money']);
          
        $this->view->assign('result', $result);
        return $this->view->fetch();
    }


//调起支付
  public function wx(){
        $money =  (float)$_POST['money'];
        $out_trade_no = $_POST['out_trade_no'];
        $list = db::name('orders')->where('out_trade_no',$out_trade_no)->where('status',2)->find();
        $moneys = $list['money'];
     if($money==$moneys){
                $jsApiParameters = $this->pay('订单付款', $out_trade_no,$moneys, 'http://rucons.lncbe.com/index/ptnotify/ptnotify');
                $jsApiParam = json_decode($jsApiParameters,true);
               if(!isset($jsApiParam['paySign'])){
                    $this->response(400, $jsApiParam);
               }else{
                $result_data['jsApiParameters'] = $jsApiParameters;
                $result_data['order_no'] =  $out_trade_no;
                   $this->response(200,'成功',$result_data);
               }
               
             
        }else{
              $this->response(400, '操作失败.金额有误');  
        }
           
         
     }




    //取消订单
     public function cancel(){
         $user_id = $this->auth->id;
         $input = input();
         $list = db::name('orders')->where('id',$input['id'])->find();
       if($list['status']==0){
            db::name('orders')->where('id',$input['id'])->update(['status'=> -1]);
            $this->success(__('取消成功'));
            
       }else{
            $this->error(__('取消订单失败，请联系客服取消'));
       }
         
     }
     
     
     //微信支付
     
     
     
     
     /**
     * 
     * @param type $body 商品描述
     * @param type $trade_no 商户订单号
     * @param type $total_fee  总金额
     * @param type $notifyurl 支付回调路径
     * @return type
     */
    public function pay($body, $trade_no, $total_fee, $notifyurl) {
      
         require_once VENDOR_PATH . "wxpayv3/WxPay.JsApiPay.php";
      
       $user_id = $this->auth->id; //获取uid
   
       $user = db::name('user')->where('id',$user_id)->find();
       
       if(!$user['openid']){
             $this->redirect('dingdan/index');
        }
    
        $tools = new \JsApiPay();
        
        $openId = $user['openid'];
//②、统一下单
        $input = new \WxPayUnifiedOrder();
        $input->SetBody($body);
        //  $input->SetAttach("test");
        $input->SetOut_trade_no($trade_no);
        $input->SetTotal_fee($total_fee * 100);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
//      $input->SetGoods_tag("test");
        $input->SetNotify_url($notifyurl);
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);

       // $this->printf_info($order);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        
        return $jsApiParameters;
    }
    
    
      public function response($code,$str,$arr = array()) {
        $array = array('code'=>$code,'str'=>$str,'data'=>$arr);
       $json =  json_encode($array);
       echo $json;
       exit();
    }

   
     
     
     
     
     
     
   

}