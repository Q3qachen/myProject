<?php

define("TOKEN", "Yi331zjQZ9IB9fQ3jP9469GwWF88w1Aa");
 
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
} else {
    $wechatObj->response();
}
 
class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
 
        $this->checkSignature($signature, $timestamp, $nonce);
        echo $echoStr;
        exit;
    }
 
    private function checkSignature($signature, $timestamp, $nonce)
    {
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
    // public function response()
    // {
    //     // 处理其他类型的消息和事件，例如文本消息、图片消息等。
    // }
    private function response()
{
    $signature = $_GET["signature"];
    $timestamp = $_GET["timestamp"];
    $nonce = $_GET["nonce"];
	
    $token = TOKEN;
    $tmpArr = array($token, $timestamp, $nonce);
    sort($tmpArr, SORT_STRING);
    $tmpStr = implode( $tmpArr );
    $tmpStr = sha1( $tmpStr );
    
    if( $tmpStr == $signature ){
        return true;
    }else{
        return false;
    }
}
    
  
}
?>