<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    //新建菜单组
    public function create(Request $request){
        $data['date'] = date('Y-m-d H:i:s');
       //获取参数-名称-标识-是否是主菜单
        $paras = $request -> only('title','key','main');
        //获取对象
        $obj = new Menu();
        //判断标识是否已被使用
        $isUse = $obj -> where('key',$paras['key']) -> first();
        if($isUse){
            $data['msg'] = 'key is used';
            return $data;
        }
        //判断是否为主菜单
        if($paras['main'] == '1'){
            //修改所有菜单为0
            DB::update('update `menus` set `main` = 0');
        }
        //写新的
        $obj -> title = $paras['title'];
        $obj -> key = $paras['key'];
        $obj -> main = $paras['main'];
        $ret = $obj -> save();
        if($ret){
            $data['msg'] = 'create success';
        }else{
            $data['msg'] = 'create fail';
        }
        return $data;
    }

    //根据标识调用菜单组
    function getMenu(){

    }

    //批量删除
    function delList(Request $request){
        DB::beginTransaction();
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $keylist = $request -> input('keylist');
        $obj = new Menu();
        $data = [
            'msg' => 'delete success',
            'time' => $date,
        ];
        foreach ($keylist as $keyItem){
            $objItem = $obj -> where('id',$keyItem) -> first();
            if($objItem){
                $ret = $objItem -> delete();
                if(!$ret){
                    $date = [
                        'msg' => 'delete item has fail',
                        'time' => $date
                    ];
                }
            }else{
                $data = [
                    'msg' => 'delete item not find',
                    'time' => $date
                ];
            }
        }
        //判断是否删除成功
        if($data['msg'] == 'delete success'){
            //事务写入
            DB::commit();
        }else{
            //回滚
            DB::rollBack();
        }
        return $data;
    }

    //更新
    function update(Request $request){
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $data = $request -> only('key','value','id');
        //继续执行
        $obj = new Menu();
        $obj = $obj -> find($data['id']);
        if($obj){
            $obj -> $data['key'] = $data['value'];
            $ret = $obj -> save();
            if($ret){
                $data = [
                    'msg' => 'change success',
                    'time' => $date
                ];
            }else{
                $data = [
                    'msg' => 'change fail',
                    'time' => $date
                ];
            }
        }else {
            $data = [
                'msg' => 'data not find',
                'time' => $date
            ];
        }
        return $data;
    }
}
