<?php

namespace App\Http\Controllers\WeChat;

use App\WechatConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebPage extends Controller
{
    //使用网页授权，获取code，返回get数据code
    //得到网页授权access_token，与微信服务号accessToken不一样
    //在调用时，应传入code
    //调用接口https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
    //参数：appid,secret,code,grant_type:authorization_code

    function getAccessTokenAndOpenid($code){
        //判断是否已存在AccessToken且没有失效
        $timeout = session('wechat_web_access_token_timeout');
//        dump($timeout);
        if($timeout && $timeout-100 > time()){
//            echo "已存在";
            $accessToken = session('wechat_web_access_token');
        }else{
            $wechatObj = new WechatConfig();
            $appid = $wechatObj -> where('key','appid') -> first();
            $appid = $appid -> value;
            $secret = $wechatObj -> where('key','app_secret') -> first();
            $secret = $secret -> value;
            $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code";
            $res = file_get_contents($url);
            $res = json_decode($res);
            //返回格式
            //{ "access_token":"ACCESS_TOKEN",
            //    "expires_in":7200,
            //    "refresh_token":"REFRESH_TOKEN",
            //    "openid":"OPENID",
            //    "scope":"SCOPE" }
            //  access_token	网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同
            //  expires_in	access_token接口调用凭证超时时间，单位（秒）
            //  refresh_token	用户刷新access_token
            //  openid	用户唯一标识，请注意，在未关注公众号时，用户访问公众号的网页，也会产生一个用户和公众号唯一的OpenID
            //  scope	用户授权的作用域，使用逗号（,）分隔

            //将获取的数据放入session
            //设置到session中
            session()->put('wechat_web_access_token',$res->access_token);
            session()->put('wechat_web_openid',$res->access_token);
            //设置过期时间
            session()->put('wechat_web_access_token_timeout',time()+$res->expires_in);
            session()->put('wechat_web_openid_timeout',time()+$res->expires_in);
        }
    }

    //拉取用户信息
    //如果网页授权作用域为snsapi_userinfo
    //https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN
    //需上面获取到的access_token及openid
    function getUserInfo(){
        $access_token = session('wechat_web_access_token');
        $openid = session('wechat_web_openid');
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
        $res = file_get_contents($url);
        $res = json_decode($res);
        //获取到的内容
        //openid	用户的唯一标识
        //nickname	用户昵称
        //sex	用户的性别，值为1时是男性，值为2时是女性，值为0时是未知
        //province	用户个人资料填写的省份
        //city	普通用户个人资料填写的城市
        //country	国家，如中国为CN
        //headimgurl	用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。
        //privilege	用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）
        //unionid	只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。
        return $res;
    }
}
