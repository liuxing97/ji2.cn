<?php

namespace App\Http\Controllers\Admin;

use App\CmsActicle;
use App\CmsArchive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsActicleController extends Controller
{
    //
    function creatPage(Request $request){
//        dump($request -> user()->name);
        //得到所有文章类别
        $obj = new CmsArchive();
        $obj = $obj -> all();
        $dataArray = $obj -> toArray();
//        dump($dataArray);
        return view('/admin/acticle/create',[
            'archiveList' => $dataArray
        ]);
    }
    function creatAct(Request $request){
        $time = date('Y-m-d');
//        $data = $request -> input('title','icon','describe','content');
        $data = $request -> only('title','describe','content','archive');
        $obj = new CmsActicle();
        $obj -> title = $data['title'];
        $obj -> icon = null;
        $obj -> content = $data['content'];
        $obj -> describe = $data['describe'];
        $obj -> publisher = $request -> user() -> id;
        $obj -> publisherName = $request -> user() -> name;
        $obj -> archive = $data['archive'];
        $ret = $obj -> save();
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
}
