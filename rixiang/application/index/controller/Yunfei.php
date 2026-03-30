<?php

namespace app\index\controller;
use app\common\controller\Frontend;
use think\db;

/**
 * 运费测算
 */
class Yunfei extends Frontend
{
    protected $layout = 'default';
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 运费测算
     */
    public function index()
    {
        $user_id = $this->auth->id; //获取uid

        return $this->view->fetch();
    }
   
        
     //运费测算    
     public function calculation(){
         $user_id = $this->auth->id;
         $lang = $_POST['lang'];
         $weights = $_POST['weight'];
         $chang = $_POST['chang'];
         $kuan = $_POST['kuan'];
         $gao = $_POST['gao'];
        
         $shu =(float)$chang*(float)$kuan*(float)$gao/6000;
         
         if($weights>$shu){
             $weight=number_format($weights, 2);
         }else{
             $weight=number_format($shu, 2);
         }
         if($weight==0.00&&($weights>0||$shu>0)){
                $weight=0.01;
         }
        // $run = 4;
         //$lang 1日本 2俄罗斯
       if($lang==1){
           
        if ($weight > 0&&$weight <= 1) {
               $datas = 80;
         }elseif ($weight > 1&&$weight <= 2) {
              $datas = 110;
         }elseif ($weight > 2&&$weight <= 3) {
               $datas = 140;
         }elseif ($weight > 3&&$weight <= 4) {
               $datas = 170;
         }elseif ($weight > 4&&$weight <= 5) {
             $datas = 200;
         }elseif ($weight > 5&&$weight <= 6) {
             $datas = 230;
         }elseif ($weight > 6&&$weight <= 7) {
             $datas = 260;
         }elseif ($weight > 7&&$weight <= 8) {
            $datas = 290;
         }elseif ($weight > 8&&$weight <= 9) {
            $datas = 320;
         }elseif ($weight > 9&&$weight <= 10) {
               $datas = 350;
         }elseif ($weight > 10&&$weight <= 11) {
            $datas = 330;
         }elseif ($weight > 11&&$weight <= 12) {
             $datas = 355;
         }elseif ($weight > 12&&$weight <= 13) {
            $datas = 380;
         }elseif ($weight > 13&&$weight <= 14) {
             $datas = 405;
         }elseif ($weight > 14&&$weight <= 15) {
             $datas = 430;
         }elseif ($weight > 15&&$weight <= 16) {
            $datas = 455;
         }elseif ($weight > 16&&$weight <= 17) {
             $datas = 480;
         }elseif ($weight > 17&&$weight <= 18) {
             $datas = 505;
         }elseif ($weight > 18&&$weight <= 19) {
             $datas = 530;
         }elseif ($weight > 19&&$weight <= 20) {
             $datas = 555;
         }elseif ($weight > 20&&$weight <= 21) {
            $datas = 480;
         }elseif ($weight > 21&&$weight <= 22) {
             $datas = 500;
         }elseif ($weight > 22&&$weight <= 23) {
            $datas = 520;
         }elseif ($weight > 23&&$weight <= 24) {
            $datas = 540;
         }elseif ($weight > 24&&$weight <= 25) {
             $datas = 560;
         }elseif ($weight > 25&&$weight <= 26) {
            $datas = 580;
         }elseif ($weight > 26&&$weight <= 27) {
            $datas = 600;
         }elseif ($weight > 27&&$weight <= 28) {
             $datas = 620;
         }elseif ($weight > 28&&$weight <= 29) {
            $datas = 640;
         }elseif ($weight > 29&&$weight <= 30) {
               $datas = 660;
         }else {
           $datas = ceil($weight)*16;
         }
       }else{
        if ($weight <= 0.5) {
               $datas = 20;
         }elseif ($weight > 0.5&&$weight <= 1) {
              $datas = 40;
         }elseif ($weight > 1&&$weight <= 1.5) {
             $datas = 43.5;
         }elseif ($weight > 1.5&&$weight <= 2) {
             $datas = 58;
         }elseif ($weight > 2&&$weight <= 2.5) {
             $datas = 70;
         }elseif ($weight > 2.5&&$weight <= 3) {
             $datas = 84;
         }elseif ($weight > 3&&$weight <= 3.5) {
             $datas = 98;
         }elseif ($weight > 3.5&&$weight <= 4) {
             $datas = 112;
         }elseif ($weight > 4&&$weight <= 4.5) {
             $datas = 126;
         }elseif ($weight > 4.5&&$weight <= 5) {
             $datas = 140;
         }elseif ($weight > 5&&$weight <= 5.5) {
             $datas = 154;
         }elseif ($weight > 5.5&&$weight <= 6) {
             $datas = 168;
         }elseif ($weight > 6&&$weight <= 6.5) {
             $datas = 182;
         }elseif ($weight > 6.5&&$weight <= 7) {
             $datas = 196;
         }elseif ($weight > 7&&$weight <= 7.5) {
             $datas = 210;
         }elseif ($weight > 7.5&&$weight <= 8) {
             $datas = 232;
         }elseif ($weight > 8&&$weight <= 8.5) {
             $datas = 238;
         }elseif ($weight > 8.5&&$weight <= 9) {
             $datas = 252;
         }elseif ($weight > 9&&$weight <= 9.5) {
             $datas = 266;
         }elseif ($weight > 9.5&&$weight <= 10) {
             $datas = 260;
         }elseif ($weight > 10&&$weight <= 10.5) {
             $datas = 273;
         }elseif ($weight > 10.5&&$weight <= 11) {
             $datas = 286;
         }elseif ($weight > 11&&$weight <= 11.5) {
             $datas = 299;
         }elseif ($weight > 11.5&&$weight <= 12) {
             $datas = 312;
         }elseif ($weight > 12&&$weight <= 12.5) {
             $datas = 325;
         }elseif ($weight > 12.5&&$weight <= 13) {
             $datas = 338;
         }elseif ($weight > 13&&$weight <= 13.5) {
             $datas = 351;
         }elseif ($weight > 13.5&&$weight <= 14) {
             $datas = 364;
         }elseif ($weight > 14&&$weight <= 14.5) {
             $datas = 377;
         }elseif ($weight > 14.5&&$weight <= 15) {
             $datas = 390;
         }elseif ($weight > 15&&$weight <= 15.5) {
             $datas = 403;
         }elseif ($weight > 15.5&&$weight <= 16) {
             $datas = 416;
         }elseif ($weight > 16&&$weight <= 16.5) {
             $datas = 429;
         }elseif ($weight > 16.5&&$weight <= 17) {
             $datas = 442;
         }elseif ($weight > 17&&$weight <= 17.5) {
             $datas = 455;
         }elseif ($weight > 17.5&&$weight <= 18) {
             $datas = 468;
         }elseif ($weight > 18&&$weight <= 18.5) {
             $datas = 481;
         }elseif ($weight > 18.5&&$weight <= 19) {
             $datas = 494;
         }elseif ($weight > 19&&$weight <= 19.5) {
             $datas = 507;
         }else {
             $datas = 520;
         }
           
       }



         $result = array(
             'weight'=> $weight,
             'datas' => '￥'.($datas),
         );

         echo json_encode($result);
     }

}