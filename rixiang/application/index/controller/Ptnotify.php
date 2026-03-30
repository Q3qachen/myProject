<?php
namespace app\index\controller;
use app\common\controller\Frontend;
use think\Db;


/**
 * 支付回调
 */
class Ptnotify extends Frontend
{
    protected $layout = 'default';
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];
    
  
     public function ptnotify() {
       
        //接收正确回调数据
        $notify_arr = $this->signverify();
        $order_pt_data = Db::name('orders')->where('out_trade_no', $notify_arr['out_trade_no'])->select();
        if ($order_pt_data) {
            $mdata['status'] = 4;
            $mdata['transact'] = $notify_arr['transaction_id'];
            $result = Db::name('orders')->where('out_trade_no', $notify_arr['out_trade_no'])->update($mdata);
            if ($result === false) {
                exit();
            } else {
                $this->sentxml();
            }
        } else {
            $this->sentxml();
        }
    }


    function printf_info($data) {
        foreach ($data as $key => $value) {
            echo "<font color='#00ff55;'>$key</font> : $value <br/>";
        }
    }

    /**
     * 1支付回调信息xml转php数组,存入数据库
     * 2判断result_code是否为SUCCESS
     * 3签名验证
     * 4return  （array） 完整数据
     */
    public function signverify() {
        $xml = file_get_contents('php://input');
        
        $notify_obj = simplexml_load_string($xml);
        
        
        
        if (is_object($notify_obj)) {
            
            $notify_arr = array();
            foreach ($notify_obj as $key => $value) {
                $notify_arr[$key] = strval($value);
            }
       $path = 'HFCZ_' . date("Ymd", time());
       if (!is_dir('notify_log/' . $path)) {
            mkdir('notify_log/' . $path, 0777, true);
        }
        file_put_contents("notify_log/" . $path . "/" . $path . ".txt", "--" . json_encode($notify_arr) . "--" . PHP_EOL, FILE_APPEND);
            //如果result_code为SUCCESS 进行签名验证
            if ($notify_arr['result_code'] == 'SUCCESS') {
                if ($this->sign($notify_arr)) {
                    return $notify_arr;
                } else {

                  $this->response(101,'签名错误');
                }
            } else {
               $this->response(102,'回调失败');
            }
        } else {
            exit();
        }
    }

    //签名验证
    private function sign($notify_arr) {
        ksort($notify_arr);
        $weixin_sign = $notify_arr['sign'];
        unset($notify_arr['sign']);
       	$dai_str = $this->ToUrlParams($notify_arr);
        $key = '&key=qBlTLTPvcfH135bFi94nUu8tAsTKUotK';
        $dai_str .= $key;
        $sign = strtoupper(md5($dai_str));
      
        if ($sign == $weixin_sign) {
            return true;
        } else {
            return false;
        }
    }
    
    public function ToUrlParams($notify_arr)
	{
		$buff = "";
		foreach ($notify_arr as $k => $v)
		{
			if($k != "sign" && $v != "" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
    
 
    
    
    
    

    //处理支付回调信息后向微信发送成功通知
    private function sentxml() {
        echo '<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';
    }

 
    public function response($code,$str,$arr = array()) {
        $array = array('code'=>$code,'str'=>$str,'data'=>$arr);
       $json =  json_encode($array);
       echo $json;
       exit();
    }
    
    
    
    
    
    
    

}