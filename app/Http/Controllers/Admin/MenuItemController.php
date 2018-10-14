<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuItemController extends Controller
{
    //新建菜单项
    function create(Request $request){
        $data['time'] = date('Y-m-d H:i:s');
        $obj = new MenuItem();
        $paras = $request -> only('title','href','group','parent','running','target');
        $obj -> title = $paras['title'];
        $obj -> href = $paras['href'];
        $obj -> parent = $paras['parent'];
        $obj -> group = $paras['group'];
        $obj -> target = $paras['target'];
        $obj -> running = $paras['running'];
        $res = $obj -> save();
        if($res){
            $data['msg'] = 'create success';
        }else{
            $data['msg'] = 'create fail';
        }
        return $data;
    }
    function update(Request $request){
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $data = $request -> only('key','value','id');
        //继续执行
        $obj = new MenuItem();
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

    function delList(Request $request){
        DB::beginTransaction();
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $keylist = $request -> input('keylist');
        $obj = new MenuItem();
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
}
