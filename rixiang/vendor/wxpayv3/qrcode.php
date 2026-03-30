<?php
require_once "jssdk.php";
/**
 * Description of qrcode
 *生成临时带参数的二维码 
 * @author pqfom
 */
class qrcode {
     private $accesstoken ;
    
    public function __construct() {
        $jssdk = new JSSDK();
       $this->accesstoken  =  $jssdk->getAccessToken();
      
    }
    
    
    public function create_qr($id_user){
         $url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.  $this->accesstoken;
         $request_ticket_data = array(
               'expire_seconds' => 2592000, //过期时间30天
//                'expire_seconds' => 120, //过期时间30天
                'action_name' => 'QR_SCENE', 
                'action_info' => array('scene' => array('scene_id' => $id_user))
            );
            return $this->httpPost($url, json_encode($request_ticket_data));
    }
    
    
    
    

  
  
     //curl post请求
   private function httpPost($url,$jsonobj) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonobj);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
  }
}
