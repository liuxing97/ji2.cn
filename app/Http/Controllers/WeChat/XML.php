<?php

namespace App\Http\Controllers\WeChat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XML extends Controller
{
    function arrayToXml($data){
        if(!is_array($data) || count($data) <= 0){
            return false;
        }
        $xml = "<xml>";
        foreach ($data as $key=>$val){
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
//                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
                $xml.="<".$key.">".$val."</".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }
}
