<?php

namespace App\Http\Controllers\Admin;

use App\MenuList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CmsMenuController extends Controller
{
    //
    function createPage(){
        return view('admin/pageMenu/createMenu');
    }

    function listPage(){
        $obj = new MenuList();
        $all = $obj -> all();
        $all = $all -> toArray();
        return view('/admin/pageMenu/menuList',[
            'dataList' => $all
        ]);
    }

    //目录驱动
    function menuDrive(){
        //http://localhost:86/archive/type-9?page=1//在该情况下，确认菜单情况，并传入数据库//如果存在于现有菜单，显示菜单//如果不存在于现有菜单，不显示菜单
        $drive = 'archive';
        //查询正在使用的菜单
        $menuObj = new MenuList();
        $menuObj = $menuObj -> where('is_use','true') -> first();
        //如果有使用中的菜单（且url在该菜单中，以菜单形式显示）
        if($menuObj){
            $url = explode('?',$_SERVER['REQUEST_URI']);
            $ishas = strstr($menuObj->menu,$url[0]);
            if($ishas){
                    //遍历菜单，顺便解决链接other.site/a/b/c非本地包含的bug
                    $menuArray = json_decode($menuObj -> menu);
                    $Arrangement = [];
                    $menuData['list']= [];
                    foreach ($menuArray as $item){
                        //不考虑域名的状况下判断
                        if($item->href == $url[0]){
                            //将域名整理到菜单中
                            $menuData['now'] = $item;
                            $drive = 'menuAgain';
                        }else{
                            //保护，考虑域名状况下的判断，包含路径，但前后不完全一样
                            //解决方法：给短地址加入域名
                            $httpUrl = "http://".$_SERVER['HTTP_HOST'].$url[0];
                            $httpsUrl = "https://".$_SERVER['HTTP_HOST'].$url[0];
                            if($item -> href == $httpsUrl || $item -> href == $httpUrl){
                                //将域名整理到菜单中
                                $menuData['now'] = $item;
                                $drive = 'menuAgain';
                            }else{
                                //将域名整理到菜单中
                                array_push($menuData['list'],$item);
                            }
                        }
                    }
            }else{
                $data = [
                    'drive' => 'none'
                ];
            }
        }else{
            $data = [
                'drive' => 'none'
            ];
        }
        if($drive == 'menuAgain'){
            $data = [
                'drive' => 'menu',
                'data' => $menuData
            ];
        }else{
            $data = [
                'drive' => 'none'
            ];
        }
        return $data;

    }

    /**
     * 立即生效的新建菜单
     * @param Request $request
     * @return array
     */
    function createAct(Request $request){
        $time = date('Y-m-d H:i:s');
        $array = $request -> input('list');
//        dump($array);
        $menuObj = new MenuList();
        //将其他菜单无效
        try{
            DB::table('menu_lists')->update([
                'is_use'=>'false'
            ]);
        }catch (\Exception $e){
            return $data = [
                'msg' => 'create fail',
                'error' => $e->getMessage(),
                'time' => $time
            ];
        }
        $menuObj -> menu = $array;
        $menuObj -> is_use = 'true';
        $ret = $menuObj -> save();
        if($ret){
            $data = [
                'msg' => 'create success',
                'time' => $time
            ];
        }else{
            $data = [
                'msg' => 'create fail',
                'time' => $time
            ];
        }
        return $data;
    }

    function delAct(){

    }

    function changeAct(){

    }

}
