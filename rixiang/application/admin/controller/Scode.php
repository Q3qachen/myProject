<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use fast\Form;
use think\db;

/**
 * 扫码
 *
 * @icon fa fa-circle-o
 */
class Scode extends Backend
{


    /**
     * 查看
     */
    public function index()
    {
        if ($this->request->isPost()) {
            $params = $this->request->post();
            $ordersn = $params['ordersn'];
            $relus = db::name('orders')->where('ordersn', $ordersn)->where('status', 0)->find();
            if ($relus) {
//               $templateId = 'pbofWM8gwm10znqfZxkqSSRZHad5s5U6PNqvPPIA9l0'; // 你的模板ID
//                $openid = $user['openid']; // 用户的OpenID
//                $url = 'http://cons.lncbe.com/index/dingdan'; // 点击跳转的URL（可选）
//                $data = [
//
//                    "character_string1" => ["value" => $relus['out_trade_no']],
//                    "time6" => ["value" => date('Y-m-d H:i:s',time())]
//
//                ];
//
//                $accessToken = $this->getAccessToken('wx12a0a1b2ba3d4c8f', 'c9bf3f30d56bcdf16ef83ffa724c911a'); // 获取Access Token
//                $result = $this->sendTemplateMessage($accessToken, $templateId, $openid, $url, $data); // 发送模板消息
//                // print_r($result);die;
                db::name('orders')->where('ordersn', $ordersn)->update(['status' => 1]);
                return $this->returnApiError('入库成功', 1);
            } else {
                return $this->returnApiError('该运单号不存在或不是未入库状态', 0);
            }
        }
        $order = db::name('orders')->where('status', 1)->order('id desc')->limit(15)->select();
        $this->view->assign('order', $order);
        return $this->view->fetch();
    }

    function returnApiError($msg = null, $code = 0)
    {
        $result = array(
            'code' => $code,
            'msg' => $msg
        );

        print json_encode($result);
    }




    //获取token

//function getAccessToken($appId, $appSecret) {
//    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
//    $response = file_get_contents($url);
//    $json = json_decode($response, true);
//
//    return $json['access_token'];
//}

    //发送消息
//function sendTemplateMessage($accessToken, $templateId, $openid, $url, $data) {
//    $postData = [
//        'touser' => $openid,
//        'template_id' => $templateId,
//        'url' => $url,
//        'data' => $data,
//
//    ];
//
//    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$accessToken}";
//    $options = [
//        'http' => [
//            'method' => 'POST',
//            'header' => 'Content-Type: application/json',
//            'content' => json_encode($postData)
//        ]
//    ];
//
//
//    $context = stream_context_create($options);
//
//    $result = file_get_contents($url, false, $context);
//    return json_decode($result, true);
//}


}
