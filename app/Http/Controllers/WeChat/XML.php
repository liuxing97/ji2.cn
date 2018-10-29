<?php

namespace App\Http\Controllers\WeChat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XML extends Controller
{
    //
    public static function arr2xml($data, $root = true){
        $str="";
        if($root)$str .= "<xml>";
        foreach($data as $key => $val){
            if(is_array($val)){
                $child = arr2xml($val, false);
                $str .= "<$key>$child</$key>";
            }else{
                $str.= "<$key><![CDATA[$val]]></$key>";
            }
        }
        if($root)$str .= "</xml>";
        return $str;
    }
}
