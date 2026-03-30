<?php

namespace app\index\controller;
use app\common\controller\Frontend;
use think\Lang;
use think\Loader;
use think\Response;
use think\db;
/**
 * 我的消费订单
 */
class Baoguo extends Frontend
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
        return $this->view->fetch();
    }
     public function add(){
         $user_id = $this->auth->id;
         $name = $_POST['name'];
     
         $zipcode = $_POST['zipcode'];
         $arrayordersn = $_POST['ordersn'];
         $notes = $_POST['notes'];
         $time = date('Y-m-d H:i:s',time());
         //拆分订单号，看订单号是多个还是单个
       
       $out_trade_no = $this->getordernumber();
        foreach($arrayordersn as $val){
             $results = db::name('orders')->where('ordersn',$val)->find();
             
              if($results){
                 $res = array(
                 'code' => 0,
                 'msg' => '运单号重复，请填写正确运单号',
              );
               echo json_encode($res); return;
             }
             
             db::name('orders')->insert(['userid'=>$user_id,'status'=>0,'name'=>$name,'ordersn'=>$val,'notes'=>$notes,'time'=>$time,'zipcode'=>$zipcode,'out_trade_no'=>$out_trade_no]); 
        }
        
       
         $result = array(
             'code' => 1,
             'msg' => '提交成功',
         );

         echo json_encode($result);

     }
     
     public function getordernumber() {
        $ordernumber = date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
         return $ordernumber;
    }


}