<?php

namespace App\Http\Controllers\Admin;

use App\CmsArticle;
use App\CmsArchive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CmsArticleController extends Controller
{
    function create(Request $request){
        $data['time'] = date('Y-m-d H:i:s');
        $paras = $request -> only('archive','title','describe','content','state');
        $obj = new CmsArticle();
        $obj -> archive = $paras['archive'];
        $obj -> title = $paras['title'];
        $obj -> describe = $paras['describe'];
        $obj -> content = $paras['content'];
        $obj -> state = $paras['state'];
        $obj -> publisher = $request -> user()->id;
        $obj -> publisherName = $request -> user()->name;
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
        $obj = new CmsArticle();
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

    function update(Request $request){
        $date = date('Y-m-d H:i:s');
        //得到传递的数据
        $data = $request -> only('key','value','id');
        //继续执行
        $obj = new CmsArticle();
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

    //编辑
    function edit(Request $request){
        $data['time'] = date('Y-m-d H:i:s');
        $article = $request -> input('article');
        $title = $request -> input('title');
        $archive = $request -> input('archive');
        $icon = $request -> input('icon');
        $describe = $request -> input('describe');
        $content = $request -> input('content');
        $obj = new CmsArticle();
        $obj =$obj -> find($article);
        $obj -> title = $title;
        $obj -> archive = $archive;
        $obj -> icon = $icon;
        $obj -> describe = $describe;
        $obj -> content = $content;
        $res = $obj -> save();
        if($res){
            $data['msg'] = 'edit success';
        }else{
            $data['msg'] = 'edit fail';
        }
        return $data;
    }
}
