<?php

namespace App\Http\Controllers\Page;

use App\CmsActicle;
use App\CmsArchive;
use App\Http\Controllers\Admin\CmsMenuController;
use App\MenuList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Archive extends Controller
{
    //
    function archivePage($number,Request $request){
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
        //得到当前档案的所有记录
        $obj = new CmsActicle();
        $data = $obj -> where('archive',$number) -> simplePaginate(5);
        $dataListArray = $data -> toArray();
        //得到当前档案的名称
        $archiveObj = new CmsArchive();
        $archiveObj = $archiveObj -> find($number);
        if(!$archiveObj){
            return "您查找的网页不存在";
        }
        $archiveToArray = $archiveObj -> toArray();
        $menuDrive = new CmsMenuController();
        $menuDrive = $menuDrive -> menuDrive();

        //是否已确认目录
        if($menuDrive['drive'] != 'menu'){
            return view(
                '/fanbo/pages/archive',
                [
                    'menuArray' => $menuArray,
                    'menuData' => $menuDrive['drive'],
                    'archive' => $number,
                    'dataList' => $data,
                    'dataListArray' => $dataListArray,
                    'archiveData' => $archiveToArray
                ]
            );
        }else{
//            dump($menuData);
            return view(
                '/fanbo/pages/archive',
                [
                    'menuArray' => $menuArray,
                    'menuData' => $menuDrive['data'],
                    'archive' => $number,
                    'dataList' => $data,
                    'dataListArray' => $dataListArray,
                    'archiveData' => $archiveToArray
                ]
            );
        }
    }
}
