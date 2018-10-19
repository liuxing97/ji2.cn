<?php

namespace App\Http\Middleware;

use App\VisitLog;
use App\VisitNumber;
use Closure;
use Illuminate\Support\Facades\Cookie;

class ClientVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //访问者详细记录模型
        $visitLogObj = new VisitLog();
        //访问者统计模型
        $visitNumber = new VisitNumber();
        $ip = $this -> getIp();
        //如果是爬虫
        if($this->isCrawler()){
            $type = 'spider';
            //记录到爬虫表
        }else{
            $type = 'visit';
            //记录到访问表//查询上一天访问者统计模型，写本日访问
            $log = $visitNumber -> orderBy('time','desc') -> first();
            //如果没有记录
            if(!$log){
                //写入本日开始时间戳
                $visitNumber -> time = mktime(0,0,0,date('m'),date('d'),date('Y'));
                $visitNumber -> uv = 1;
                $visitNumber -> pv = 1;
                $visitNumber -> save();
            }else{
                //如果有记录，判断是否是当日
                if($log -> time == mktime(0,0,0,date('m'),date('d'),date('Y'))){
                    //判断进行pv还是uv增加操作
                    if(!isset($_COOKIE['uv'])){
                        $log -> uv = $log -> uv + 1;
                    }
                    $log -> pv = $log -> pv + 1;
                    $log -> save();
                }else{
                    //写入本日开始时间戳
                    $visitNumber -> time = mktime(0,0,0,date('m'),date('d'),date('Y'));
                    $visitNumber -> uv = 1;
                    $visitNumber -> pv = 1;
                    $visitNumber -> save();
                }
            }
        }
//        dump($ip);
        //记录ip
        $visitLogObj -> ip = $ip;
        $visitLogObj -> type = $type;
        $visitLogObj -> save();
        setcookie("uv", "isset", time()+3600*6,'/');
        return $next($request);
    }

    /**
     * 判断是否是爬虫
     */
    function isCrawler() {
//        echo $agent= strtolower($_SERVER['HTTP_USER_AGENT']);
        if (!empty($agent)) {
            $spiderSite= array(
                "TencentTraveler",
                "Baiduspider+",
                "BaiduGame",
                "Googlebot",
                "msnbot",
                "Sosospider+",
                "Sogou web spider",
                "ia_archiver",
                "Yahoo! Slurp",
                "YoudaoBot",
                "Yahoo Slurp",
                "MSNBot",
                "Java (Often spam bot)",
                "BaiDuSpider",
                "Voila",
                "Yandex bot",
                "BSpider",
                "twiceler",
                "Sogou Spider",
                "Speedy Spider",
                "Google AdSense",
                "Heritrix",
                "Python-urllib",
                "Alexa (IA Archiver)",
                "Ask",
                "Exabot",
                "Custo",
                "OutfoxBot/YodaoBot",
                "yacy",
                "SurveyBot",
                "legs",
                "lwp-trivial",
                "Nutch",
                "StackRambler",
                "The web archive (IA Archiver)",
                "Perl tool",
                "MJ12bot",
                "Netcraft",
                "MSIECrawler",
                "WGet tools",
                "larbin",
                "Fish search",
            );
            foreach($spiderSite as $val) {
                $str = strtolower($val);
                if (strpos($agent, $str) !== false) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

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
