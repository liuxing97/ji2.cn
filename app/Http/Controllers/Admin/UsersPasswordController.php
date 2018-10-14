<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersPasswordController extends Controller
{
    //
    function update(Request $request){
        $time = date('Y-m-d H:i:s');
        $data = $request -> only('oldPwd','newPwd');
        $user = $request -> user();
        if(Hash::check($data['oldPwd'],$user -> password)){
            $user -> password = $data['newPwd'];
            $res = $user -> save();
            if($res){
                $data = [
                    'msg' => 'password change success',
                    'time' => $time
                ];
            }else{
                $data = [
                    'msg' => 'password change fail',
                    'time' => $time
                ];
            }
        }else{
            $data = [
                'msg' => 'password is fail',
                'time' => $time
            ];
        }
        return $data;
    }

}
