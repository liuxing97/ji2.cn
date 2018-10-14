<?php

namespace App\Http\Controllers\Admin;

use App\Sitedata;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SiteDataController extends Controller
{
    //更新网站设置情况
    //1-500的记录，受保护的，不允许更改key
    public function update(Request $request){
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $data = $request -> only('key','value','id');
//        dump($data);
//        exit();
        //保护区
        if($data['id'] < 501){
            //如果要更改的关键字是key,不允许更改key字段
            if($data['key'] == 'key' or $data['key'] == 'describe'){
                return $data = [
                    'msg' => 'protected item',
                    'time' => $date
                ];
            }
        }
        //继续执行
        $obj = new Sitedata();
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
    //新建网站配置
    public function create(Request $request){
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $data = $request -> only('key','describe','value');
        $obj = new Sitedata();
        //查询是否已存在同样的key
        $res = $obj -> where('key',$data['key']) -> first();
        if($res){
            $data = [
                'msg' => 'key has created',
                'time' => $date
            ];
        }else{
            $obj -> key = $data['key'];
            $obj -> describe = $data['describe'];
            $obj -> value = $data['value'];
            $res = $obj -> save();
            if($res){
                $data = [
                    'msg' => 'create success',
                    'time' => $date
                ];
            }else{
                $data = [
                    'msg' => 'create fail',
                    'time' => $date
                ];
            }
        }
        return $data;
    }
    //批量删除
    //id，1-500位为保留字段，不允许删除
    public function delList(Request $request){
        DB::beginTransaction();
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $keylist = $request -> input('keylist');
        $obj = new Sitedata();
        $data = [
            'msg' => 'delete success',
            'time' => $date,
        ];
        foreach ($keylist as $keyItem){
            if($keyItem < 501){
                $data = [
                    'msg' => 'protected item'
                ];
            }
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
