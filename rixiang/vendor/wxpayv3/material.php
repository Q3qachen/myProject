<?php
require_once "jssdk.php";
/**
 * Description of material
 *素材管理
 * @author pqfom
 */
class material {
    private $accesstoken ;
    
    public function __construct() {
        $jssdk = new JSSDK();
       $this->accesstoken  =  $jssdk->getAccessToken();
      
    }
    //获取总数目
    public function gettotalcount(){
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=".$this->accesstoken;
        return $this->httpGet($url);
    }
    
    //获取列表
    
    public function materiallist($type,$offset,$count){
        $arr['type'] = $type;
        $arr['offset'] = $offset;
        $arr['count'] = $count;
      $jsonobj =   json_encode($arr);
        $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$this->accesstoken;
        return $this->httpPost($url,$jsonobj);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    //curl get请求
   private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
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
