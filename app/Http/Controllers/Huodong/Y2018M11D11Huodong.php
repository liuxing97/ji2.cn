<?php

namespace App\Http\Controllers\Huodong;

use App\WechatConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Y2018M11D11Huodong extends Controller
{
    //
    function xiangqing(Request $request){








        //------------------------ 必要性判断1 ----------------------------------------
        //如果不存在openid，则重定向至活动介绍页面
        $openid = $request -> input('openid');
        if(!$openid){
            return redirect('/huodong/wechat/2018/11/11');
        }









        //----------------------  参数初始化  ----------------------
        //参数初始化1    ·微信appid
        $appid = new WechatConfig();
        $appid = $appid ->where('key','appid')->first();
        $appid = $appid -> value;
        //参数初始化2    ·授权地址,跳转到本页面
        $thisUrl = "http://www.ji2.cn/huodong/wechat/2018/11/11/action?openid=".$openid;
        $applyShouquanUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri=".$thisUrl."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        //参数初始化3    ·活动介绍页地址
        $huodongUrl = "http://www.ji2.cn/huodong/wechat/2018/11/11";
        //参数舒适化4    ·CODE
        $code = $request -> input('code');
        //参数舒适化5    ·助力者列表
        $helpListArray = [];
        //参数舒适化6    ·助力者数量
        $helperNum = 0;
        //参数舒适化7    ·访问记录模型
        $visitLogObj = new \App\Huodong20181111Log();
        //参数初始化8    ·默认身份
        $userIdentity = 'visitor';
        //参数初始化8    ·发起人数据
        $originatorData = [];
        //参数初始化9    ·当前登录用户，不一定授权过，但是申请抢红包的用户，是一定授权过的
        $weUserInfo = session('wechat_web_userinfor');















        //------------------------ 必要性判断2 ----------------------------------------
        //如果活动不存在
        $originatorObj = $visitLogObj -> where('openid',$openid) -> where('originator','true') -> first();
        if(!$originatorObj){
            //如果有授权过，则可能是申请活动授权的情况
            if($weUserInfo){
                if($openid == $weUserInfo -> openid){
                    $this -> wechatClientWrite($openid,$weUserInfo,'true');
                }
                //如果授权过，访问的活动又不存在，我们认为其是非法访问
                else{
                    return redirect('/huodong/wechat/2018/11/11');
                }
            }
            //如果没有授权过，则认为其是非法访问
            else{
                return redirect('/huodong/wechat/2018/11/11');
            }
        }
        //初始化参数     ·发起人数据      ·前方已排除活动不存在的情况
        $originatorData = $visitLogObj -> where('openid',$openid) -> where('originator','true') -> first() -> toArray();












        //---------------------------------继续初始化参数，因前方已排除活动不存在的情况----------------
        //初始化参数     ·助力人员数据
        $helpListArray = $this -> helperListData($openid);
        echo "以下为助力人名单：<br>";
        dump($helpListArray);
        //初始化参数     ·助力人员人数
        $helperNum = sizeof($helpListArray,0);
        echo "助力人数：$helperNum<br>";















        //--------------------------这是有CODE刚刚进行授权的情况---------------------------------
        if($code){
            echo "这是有CODE刚刚进行授权的情况<br>";

            //------------获取用户资料
            echo "获取用户资料<br>";
            $webPageObj = new \App\Http\Controllers\WeChat\WebPage();
            $webPageObj -> getAccessTokenAndOpenid($code);
            $weUserInfo = $webPageObj -> getUserInfo();
            //------------发起抢红包活动----身份为发起人--------但不一定是第一次访问
            if($openid == $weUserInfo->openid){
                $userIdentity= 'self';
                echo "------------发起抢红包活动----身份为发起人--------但不一定是第一次访问<br>";
                echo "将显示的数据包含-发起人信息-好友助力列表-访问身份<br>";
            }
            //------------助力发起人抢红包------身份为助力者，其已经点了助力
            else{
                echo "是参与者访问<br>";
                //判断助力者是否已助力过
                $visitLog = $visitLogObj-> where('openid',$weUserInfo -> openid) -> where('visit',$openid) -> first();
                //没有助力的情况,进行助力，并刷新助力名单，助力人数数据
                if(!$visitLog){
                    $this -> wechatClientWrite($openid,$weUserInfo,'false');
                    //得到所有该助力的数目
                    $helpList = $visitLogObj -> where('visit',$openid) -> get();
                    $helpListArray = $helpList -> toArray();
                    echo "以下为刷新后的助力人名单：<br>";
                    dump($helpListArray);
                    $helperNum = sizeof($helpListArray,0);
                    echo "助力人数为:$helperNum<br>";
                    //测试助力人数两人时，发放红包
                    if($helperNum == 2){
                        //测试发送红包
                        $payObj = new \App\Http\Controllers\WeChat\Pay();
                        $payObj -> payToUser($openid,'36');
                        echo "助力成功，人数达标，您的好友抢到红包啦！<br>";
                    }else{
                        echo "助力人数仅为{$helperNum}人,凑够两人发放红包<br>";
                    }
                }
            }
        }
        //-----------------------------------这是没有code的情况----------------------------------------------
        else{
            echo "这是没有code的情况<br>";
            //这是还没有进行授权的情况，即用户第一次进入页面为他人助力
            if(!$weUserInfo){
            }
            //这是已经授权的情况
            else{
                //判断是否发起人openid与访问者openid是否一样
                if($openid== $weUserInfo->openid){
                    $userIdentity= 'self';
                    echo "是发起者访问<br>";
                }else{
                    echo "是参与者访问<br>";
                    $visitLog = $visitLogObj-> where('openid',$weUserInfo -> openid) -> where('visit',$openid) -> first();
                    //如果已记录助力，直接进入
                    if($visitLog){
                        echo "已记录助力，直接进入<br>";
                    }else{
                        //--------------------------------直接使用上面的助力代码(START)-----------
                        $this -> wechatClientWrite($openid,$weUserInfo,'false');
                        //得到所有该助力的数目
                        $helpList = $visitLogObj -> where('visit',$openid) -> get();
                        $helpListArray = $helpList -> toArray();
                        echo "以下为刷新后的助力人名单：<br>";
                        dump($helpListArray);
                        $helperNum = sizeof($helpListArray,0);
                        echo "助力人数为:$helperNum<br>";
                        //测试助力人数两人时，发放红包
                        if($helperNum == 2){
                            //测试发送红包
                            $payObj = new \App\Http\Controllers\WeChat\Pay();
                            $payObj -> payToUser($openid,'36');
                            echo "助力成功，人数达标，您的好友抢到红包啦！<br>";
                        }else{
                            echo "助力人数仅为{$helperNum}人,凑够两人发放红包<br>";
                        }
                        //--------------------------------直接使用上面的助力代码(END)-----------
                    }
                }
            }
        }
        //最后载入页面
        return view('/fanbo/huodong/2018-11-11-action',[
            'userIdentity' => $userIdentity,
            'applyShouquanUrl' => $applyShouquanUrl,
            'huodongUrl' => $huodongUrl,
            'helpListArray' => $helpListArray,
            'helperNum' => $helperNum,
            'originatorData' => $originatorData
        ]);
    }
















    //得到所有该助力的名单
    function helperListData($openid){
        $visitLogObj = new \App\Huodong20181111Log();
        $helpList = $visitLogObj -> where('visit',$openid) -> get() -> toArray();
        return $helpList;
    }















    //记录微信访问数据
    function wechatClientWrite($openid,$weUserInfo,$isSelf){
        $visitLogObj = new \App\Huodong20181111Log();
        $visitLogObj -> openid = $weUserInfo -> openid;
        $visitLogObj -> originator = $isSelf;
        $visitLogObj -> visit = $openid;
        $visitLogObj -> nickname = $weUserInfo -> nickname;
        $visitLogObj -> sex = $weUserInfo -> sex;
        $visitLogObj -> city = $weUserInfo -> city;
        $visitLogObj -> province = $weUserInfo -> province;
        $visitLogObj -> country = $weUserInfo -> country;
        $visitLogObj -> headimgurl = $weUserInfo -> headimgurl;
        $ret = $visitLogObj -> save();
        echo "保存发起人信息后的返回结果为：<br>";
        dump($ret);
        echo "<br>";
    }
}
