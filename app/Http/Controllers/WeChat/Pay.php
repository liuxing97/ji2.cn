<?php

namespace App\Http\Controllers\WeChat;

use App\WechatConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Pay extends Controller
{
    //现金付款至指定账户
    //mch_appid商户appid
    //mchid商户号
    //nonce_str随机字符串
    //partner_trade_no商户订单号
    //openid用户openid
    //amount金额
    //desc备注
    //spbill_create_ip/ip
    //sign签名
    function payToUser($openid){
        $appid = WechatConfig::where('key','appid')->first();
        $mch_appid = $appid ->value;
        $mchid = '1501833891';
        $nonce_str = md5(rand(0,999999999));
        $partner_trade_no = time();
        $check_name = 'NO_CHECK';
        $amount = 0.36;
        $desc = "测试";
        $spbill_create_ip = '111.230.231.164';
        $sign =
            "&mch_appid=".$mch_appid.
                "&mchid=".$mchid.
            "&nonce_str=".$nonce_str.
            "&partner_trade_no=".$partner_trade_no.
            "&openid=".$openid.
            "&check_name=".$check_name.
            "&amount=".$amount.


                "&desc=".$desc.
                "&spbill_create_ip=".$spbill_create_ip;
        //拼接,key为商户平台设置的密钥key
        $sign = $sign."&key=qOj0ITUBCqZMojVBuAE7UeVkDhvMytF7";
        $sign = md5($sign);
        $sign = strtoupper($sign);
        $data=[
            'mch_appid'=>$mch_appid,
            'mchild'=>$mchid,
            'nonce_str'=>$nonce_str,
            'partner_trade_no'=>$partner_trade_no,
            'openid' => $openid,




            'check_name'=>$check_name,
            'amount'=>$amount,
            'desc'=>$desc,
            'spbill_create_ip'=>$spbill_create_ip,
            'sign'=>$sign,
        ];
        $url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';
        $xml = XML::ToXml($data);
        dump($xml);
        $ch = curl_init();
        $second=30;
        curl_setopt($ch,CURLOPT_TIMEOUT,$second);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
//        curl_setopt($ch,CURLOPT_SSLCERT,"/home/lizi/addons/grow/template/mobile/cash/apiclient_cert.pem");
//        curl_setopt($ch,CURLOPT_SSLKEY,"/home/lizi/addons/grow/template/mobile/cash/apiclient_key.pem");
        $str = '/web/ji2.cn/app/';//证书必须使用绝对路径,否则报错,错误貌似是52什么的
        $config['apiclient_cert'] = 'apiclient_cert.pem';
        $config['apiclient_key'] = 'apiclient_key.pem';
        curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
        curl_setopt($ch,CURLOPT_SSLCERT,$str.trim($config['apiclient_cert'],'.'));
        curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
        curl_setopt($ch,CURLOPT_SSLKEY,$str.trim($config['apiclient_key'],'.'));
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$xml);
        $data = curl_exec($ch);
        if($data){
            curl_close($ch);
            dump($data);
            return $data;
        }else{
            $error = curl_errno($ch);
            echo "call faild, errorCode:$error\n";
            curl_close($ch);
            return false;
        }
//        $sign = hash_hmac('sha256',$sign,'qOj0ITUBCqZMojVBuAE7UeVkDhvMytF7');

        //https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers接口地址


    }
}
