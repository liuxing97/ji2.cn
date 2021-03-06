<?php

namespace App\Http\Controllers\Admin;

use App\CmsArticle;
use App\CmsArchive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CmsArchiveController extends Controller
{

    function create(Request $request){
        $data['time'] = date('Y-m-d H:i:s');
        $paras = $request -> only('title','alias','describe','running');
        $obj = new CmsArchive();
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
        $obj = new CmsArchive();
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
            //删除后删除所有此分类的文章
            $acticleObj = new CmsArticle();
            $acticleObj -> where('archive',$keyItem) -> delete();
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
        $obj = new CmsArchive();
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
