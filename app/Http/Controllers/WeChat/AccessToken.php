<?php

namespace App\Http\Controllers\WeChat;

use App\WechatConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AccessToken extends Controller
{
    //请求获取
    //接口调用请求说明
    //https请求方式: GET
    //https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET
    //使用前公众号配置当前ip请加白名单
    private function getAccessToken (){
        //判断是否已存在AccessToken且没有失效
        $timeout = session('wechat_access_token_timeout');
//        dump($timeout);
        if($timeout && $timeout-100 > time()){
//            echo "已存在";
            $accessToken = session('wechat_access_token');
        }else{
            //得到配置
            $obj = new WechatConfig();
            $appid = $obj -> where('key','appid') -> first();
            $appid = $appid -> value;
            $app_secret = $obj -> where('key','app_secret') -> first();
            $app_secret = $app_secret -> value;
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$app_secret;
//            dump($url);
            //请求
            $res = file_get_contents($url);
            $res = json_decode($res);
            //设置到session中
            session()->put('wechat_access_token',$res->access_token);
            //设置过期时间
            session()->put('wechat_access_token_timeout',time()+$res->expires_in);
            $accessToken = $res -> access_token;
        }
        return $accessToken;
    }
    //对外接口
    public function get(){
        $ret = $this -> getAccessToken();
        return $ret;
    }
}
