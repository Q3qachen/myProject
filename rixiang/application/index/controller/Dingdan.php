<?php

namespace app\index\controller;
use app\common\controller\Frontend;
use think\db;

/**
 * 我的消费订单
 */
class Dingdan extends Frontend
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
      $user = db::name('user')->where('id',$user_id)->find();
//      if(!$user['openid']){
//         require_once VENDOR_PATH . 'wxpayv3/Wx.Auth1.php';
//          $jsapipay = new \WxAuth1();
//          $data = $jsapipay->GetInfo();
//          $results  = db::name('user')->where('id',$user_id)->update(['openid'=>$data]);
//      }
        // $orderList  = db::name('orders')->where('userid', $user_id)->where('status','<>','-1')->order('out_trade_no', 'desc')->paginate(10, null);
           $orderList  = db::name('orders')->where('userid', $user_id)->where('status','<>','-1')->order('time', 'desc')->select();
       
        $statusall  = db::name('orders')->where('userid', $user_id)->where('status','<>','-1')->count();
        $status0 = db::name('orders')->where('userid',$user_id)->where('status',0)->count();
        $status1 = db::name('orders')->where('userid',$user_id)->where('status',1)->count();
        $status2 = db::name('orders')->where('userid',$user_id)->where('status',2)->count();
        $status3 = db::name('orders')->where('userid',$user_id)->where('status',3)->count();
        $status4 = db::name('orders')->where('userid',$user_id)->where('status',4)->count();
        $this->view->assign('statusall', $statusall);
         $this->view->assign('status0', $status0);
         $this->view->assign('status1', $status1);
         $this->view->assign('status2', $status2);
         $this->view->assign('status3', $status3);
         $this->view->assign('status4', $status4);
         $this->view->assign('orderList', json_encode($orderList));
          
        return $this->view->fetch();
    }


    public function list()
    {
        $user_id = $this->auth->id; //获取uid
        if($_POST){
            $status = $_POST['status'];
        }else{
            $status = true;
        }
        if($status=='all'){
             $orderList  = db::name('orders')->where('userid', $user_id)->where('status','<>','-1')->order('out_trade_no', 'desc')->paginate(10, null);
        }else{
           $orderList  = db::name('orders')->where('userid', $user_id)->where('status', $status)->order('out_trade_no', 'desc')->paginate(10, null);  
        }
       

        return $orderList;
    }




    //添加包裹
    public function add(){
         $user_id = $this->auth->id;
         $id = $_POST['id']; //订单号
        
         $list = db::name('orders')->where('id',$id)->find();
          if(!$list){
               $res = array(
                 'code' => 0,
                 'msg' => '未获取到正确订单号，请稍后尝试',
                 );
                 echo json_encode($res); return;
          }
       
         $ordersn = $_POST['ordersn']; //运单号
      
         $time = date('Y-m-d H:i:s',time());
         
        
     
        foreach($ordersn as $val){
             $results = db::name('orders')->where('ordersn',$val)->find();
             
              if($results){
                 $res = array(
                 'code' => 0,
                 'msg' => '运单号重复，请填写正确运单号',
              );
               echo json_encode($res); return;
             }
             
             db::name('orders')->insert(['userid'=>$user_id,'status'=>0,'name'=>$list['name'],'ordersn'=>$val,'notes'=>$list['notes'],'time'=>$time,'zipcode'=>$list['zipcode'],'out_trade_no'=>$list['out_trade_no']]); 
        }
        
       
         $result = array(
             'code' => 1,
             'msg' => '提交成功',
         );

         echo json_encode($result);

     }
    //发货
     public function send(){
         $user_id = $this->auth->id; //获取uid
         $orderid = $_POST['orderid'];
         $order = db::name('orders')->where('id',$orderid)->find();
         db::name('orders')->where('out_trade_no',$order['out_trade_no'])->update(['fcode'=>time(),'stime'=>date('Y-m-d H:i:s',time())]);
      
          $result = array(
             'code' => 1,
             'msg' => '申请成功，等待工作人员审核',
         );
         echo json_encode($result);
        
     }
     
     
     
      public function getordernumber() {
        $ordernumber = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
         return $ordernumber;
    }
 
   
     
     
     
     
     
     
     
     

}