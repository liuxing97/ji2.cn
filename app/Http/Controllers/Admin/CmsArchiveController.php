<?php

namespace App\Http\Controllers\Admin;

use App\CmsArchive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsArchiveController extends Controller
{
    //
    function createPage(){
        return view("/admin/archive/create");
    }
    function createAct(Request $request){
        $data = $request -> only('archiveName','archiveDescribe');
        //查询分类是否已存在
        $obj = new CmsArchive();
        $isHasObj = $obj -> where('archive',$data['archiveName']) -> first();
        if($isHasObj){
            $data = [
                'msg' => 'created',
                'time' => date('Y-m-d H:i:s')
            ];
        }else{
            $obj -> archive = $data['archiveName'];
            $obj -> describe = $data['archiveDescribe'];
            $ret = $obj -> save();
            if($ret){
                $data = [
                    'msg' => 'create success',
                    'time' => date('Y-m-d H:i:s')
                ];
            }else{
                $data = [
                    'msg' => 'create fail',
                    'time' => date('Y-m-d H:i:s')
                ];
            }
        }
        return $data;
    }
    function listPage() {
        //得到所有分类
        $obj = new CmsArchive();
        $obj = $obj -> all();
        $obj = $obj -> toArray();
//        dump($obj);
        return view("/admin/archive/list",[
            'listArray' => $obj
        ]);
    }
    function deleteAct(Request $request){
        $time = date('Y-m-d H:i:s');
        $archiveId = $request -> input('archiveId');
        //查询该记录
        $obj = new CmsArchive();
        $obj = $obj ->find($archiveId);
        if($obj){
            $ret = $obj -> delete();
            if($ret){
                $data = [
                    'msg' => 'delete success',
                    'time' => $time
                ];
            }else{
                $data = [
                    'msg' => 'delete fail',
                    'time' => $time
                ];
            }
        }
        else{
            $data = [
                'msg' => 'havnt log',
                'time' => $time
            ];
        }
        return $data;
    }
    function changePage($number){
        $obj = new CmsArchive();
        $obj = $obj -> find($number);
        if($obj){
            $dataArray = $obj -> toArray();
            return view('/admin/archive/change',[
                'data' => $dataArray
            ]);
        }else{
            return "无记录";
        }
    }
    function change(Request $request){
        $time = date('Y-m-d H:i:s');
        $archiveId = $request -> segment(5);
        $data = $request -> only('archive','describe');
        //查询记录
        $obj = new CmsArchive();
        $obj = $obj -> find($archiveId);
        if($obj){
            $pushData = null;
            if($data['archive'] != null && $data['archive'] != $obj -> archive){
                $pushData['archive'] = $data['archive'];
            }
            if($data['describe'] != null && $data['describe'] != $obj -> describe){
                $pushData['describe'] = $data['describe'];
            }
            if($pushData != null){
                $ret = $obj -> where('id',$archiveId) -> update($pushData);
                if($ret){
                    $data = [
                        'msg' => 'change success',
                        'time' => $time
                    ];
                }else{
                    $data = [
                        'msg' => 'change fail',
                        'time' => $time
                    ];
                }
            }else{
                $data = [
                    'msg' => 'havnt change',
                    'time' => $time
                ];
            }
        }else{
            $data = [
                'msg' => 'log havnt',
                'time' => $time
            ];
        }
        return $data;
    }
}
