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
        //这里只记录ip，及访问的路径
        $obj = new Tongji();
        $obj -> logIp();
        return $next($request);
    }
}
