<?php

namespace App\Http\Controllers\Tool;

use App\VisitLog;
use App\VisitNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Tongji extends Controller
{
    //访问统计，如果没有cookie标识，则uv+1,pv+1，如果有，则仅将pv+1
    //这里进行对访问的情况进行分析，确认是通过浏览器访问的
    //这里是通过ajax加载的，所以没有任何输出
    //通过前端确认是否是本日第一次访问
    function visit(Request $request){
        $time = date('Y-m-d H:i:s');
        //是否是本日第一次访问
        $isfirst = $request -> input('isFirst');
        //访问者详细记录模型
        $visitLogObj = new VisitLog();
        //访问者统计模型
        $visitNumber = new VisitNumber();
        //记录到访问表//查询上一天访问者统计模型，写本日访问
        $log = $visitNumber -> orderBy('time','desc') -> first();
        //如果没有记录
        if(!$log){
            //写入本日开始时间戳
            $visitNumber -> time = mktime(0,0,0,date('m'),date('d'),date('Y'));
            $visitNumber -> uv = 1;
            $visitNumber -> pv = 1;
            $visitNumber -> save();
        }
        else{

            //如果有记录，是否是今天的统计记录
            if($log -> time == mktime(0,0,0,date('m'),date('d'),date('Y'))){
                //判断进行pv还是uv增加操作
                if($isfirst == 'true'){

                }else{
                    $log -> uv = $log -> uv + 1;
                }
                $log -> pv = $log -> pv + 1;
                $log -> save();
            }else{
                //不是今天的统计记录，写入本日开始时间戳
                $visitNumber -> time = mktime(0,0,0,date('m'),date('d'),date('Y'));
                $visitNumber -> uv = 1;
                $visitNumber -> pv = 1;
                $visitNumber -> save();
            }
        }
        //确认该次访问为用户访问
        $visitId = session('visit_id');
        $visitLogObj = $visitLogObj -> find($visitId);
        $visitLogObj -> type = 'visit';
        $visitLogObj -> save();
        return [
            'time' => $time,
            'msg' => 'statistics success',
        ];
    }

    /**
     * 记录ip
     */
    function logIp(){
        $visitLogObj = new VisitLog();
        $ip = $this->getIp();
        $type = 'waiting';
        //记录ip
        $visitLogObj -> ip = $ip;
        $visitLogObj -> type = $type;
        $visitLogObj -> path = $this -> getSiteUrl();
        $visitLogObj -> save();
        //得到写入的该条记录进入id
        session(['visit_id' => $visitLogObj['id']]);
        return true;
    }

    function getSiteUrl() {
        $uri=$_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
        return 'http://'.$_SERVER['HTTP_HOST'].'/'.$uri;
    }

    //获取IP
    public function getIp()
    {
        static $realip = NULL;

        if ($realip !== NULL) {
            return $realip;
        }

        if (getenv( 'HTTP_X_FORWARDED_FOR')) {
            $realip = getenv( 'HTTP_X_FORWARDED_FOR');
        } elseif (getenv( 'HTTP_CLIENT_IP')) {
            $realip = getenv( 'HTTP_CLIENT_IP');
        } else {
            $realip = getenv( 'REMOTE_ADDR');
        }

        preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
        $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';

        return $realip;
    }
}
