<?php

namespace App\Http\Middleware;

use App\Menu;
use App\MenuItem;
use Closure;
use Illuminate\Support\Facades\View;

class UICheckData
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
        //查询菜单
        $menuObj = new Menu();
        $menuData = $menuObj -> orderBy('main','desc')-> get() -> first();
//        dump($menuData);
        if(!$menuData){
            echo "没有找到默认菜单";
            exit;
        }else{
            $menuItemObj = new MenuItem();
            $menuItemData = $menuItemObj -> where('group',$menuData->id) -> get();
//            dump($menuItemData);
            if($menuItemData){
                $menuArray = $menuItemData -> toArray();
                //遍历判断是否是当前地址
//                $menuArray = $menuObj -> toArray();
//                $menuArray = json_decode($menuArray['menu']);
                $requestUrl = $_SERVER['REQUEST_URI'];
                //当前请求的路径是urlArray[0];
                $urlArray = explode("?",$requestUrl);
                $time = 0;
                foreach ($menuArray as $menuItem){
                    if($menuArray[$time]['target']== '0'){
                        $menuArray[$time]['target'] = '_self';
                    }else{
                        $menuArray[$time]['target'] = '_blank';
                    }
                    //如果当前请求的路径，在目录字符串中
                    $isHas = strstr($menuItem['href'], $urlArray[0]);
                    if($isHas){
                        $menuArray[$time]['isThis'] = true;
                    }else{
                        $menuArray[$time]['isThis'] = false;
                    }
                    $time++;
                }
//                dump($menuItemArray);
            }else{
                $menuArray = null;
            }
        }
        view()->share('menuArray',$menuArray);
        return $next($request);
    }
}
