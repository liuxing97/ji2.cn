<?php

namespace App\Http\Controllers\Page;

use App\CmsActicle;
use App\MenuList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Acticle extends Controller
{
    //
    function acticlePage($number){
        //得到目录
        $menuObj = new MenuList();
        $menuObj = $menuObj -> where('is_use','true') -> first();
        if($menuObj){
            $menuArray = $menuObj -> toArray();
            $menuArray = json_decode($menuArray['menu']);
            $requestUrl = $_SERVER['REQUEST_URI'];
            //当前请求的路径是urlArray[0];
            $urlArray = explode("?",$requestUrl);
            $time = 0;
            foreach ($menuArray as $menuItem){
                //如果当前请求的路径，在目录字符串中
                $isHas = strstr($menuItem -> href, $urlArray[0]);
                if($isHas){
                    $menuArray[$time] -> isThis = true;
                }else{
                    $menuArray[$time] -> isThis = false;
                }
                $time++;
            }
        }else{
            $menuArray = 'null';
        }

        //获取文章信息
        $acticleObj = new CmsActicle();
        $acticleObj = $acticleObj -> find($number);
        if(!$acticleObj){
            return "没有找到页面";
        }
        $acticleArray = $acticleObj -> toArray();
        return view('/fanbo/pages/article',
            [
                'menuArray' => $menuArray,
                'acticleData' => $acticleArray
            ]);
    }
}
