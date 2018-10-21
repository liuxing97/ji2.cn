<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Tool\Tongji;
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
        dump(time());
        $obj = new Tongji();
        $obj -> logIp();
        //写入头部，声明已访问一次
        setcookie("visited", "isset", time()+3600*6,'/');
        return $next($request);
    }
}
