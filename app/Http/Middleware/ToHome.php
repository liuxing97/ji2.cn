<?php

namespace App\Http\Middleware;

use App\Menu;
use App\MenuItem;
use Closure;

class ToHome
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
        //找首页，以主菜单组的第一个菜单为首页
        $menuObj = new Menu();
        $menuData = $menuObj -> where('main',1) -> first();
        //如果没有找到主菜单,中止并提示
        if(!$menuData){
            echo "没有找到主菜单,请先设置主菜单，我们将以主菜单的第一个菜单为首页";
            exit;
        }else{
            //如果找到了主菜单
            $menuItemObj = new MenuItem();
            $menuItemArray = $menuItemObj -> where('group',$menuData->id) -> get() -> toArray();
            if($menuItemArray){
                //待下面进行跳转
            }else{
                //如果没有找到主菜单中存在菜单项，中止
                echo "我们找到了主菜单，但是主菜单里面没有任何项，请先创建一个菜单项";
                exit;
            }
        }
        return redirect($menuItemArray[0]['href']);
    }
}
