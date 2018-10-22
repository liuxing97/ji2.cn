<?php

namespace App\Http\Controllers\Admin;

use App\CmsPhotoArchive;
use App\CmsPhotoItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CmsPhotoArchiveController extends Controller
{
    function create(Request $request){
        $data['time'] = date('Y-m-d H:i:s');
        $paras = $request -> only('title','alias','describe','running');
        $obj = new CmsPhotoArchive();
        $obj -> title = $paras['title'];
        $obj -> alias = $paras['alias'];
        $obj -> describe = $paras['describe'];
        $obj -> running = $paras['running'];
        $res = $obj -> save();
        if($res){
            $data['msg'] = 'create success';
        }else{
            $data['msg'] = 'create fail';
        }
        return $data;
    }

    function delList(Request $request){
        DB::beginTransaction();
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $keylist = $request -> input('keylist');
        $obj = new CmsPhotoArchive();
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
            //删除后删除所有此分类的图片
            $photoItemObj = new CmsPhotoItem();
            //得到该分类所有图片记录
            $photoItemObj = $photoItemObj -> where('archive',$keyItem) -> get();
            //遍历并删除
            foreach ($photoItemObj as $photoItem){
                //得到路径
                $path = substr($photoItem -> path,1);
                //删除记录
                $photoItem -> delete();
                //删除图片
                unlink($path);
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

    function update(Request $request){
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $data = $request -> only('key','value','id');
        //继续执行
        $obj = new CmsPhotoArchive();
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
