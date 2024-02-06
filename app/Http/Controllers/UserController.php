<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MyModel;

class UserController extends Controller
{
    function queryUsers($uid=1){
        $users = MyModel::queryUsers($uid);
    // $users = DB::select('select * from UserInfo where uid = ?',[$uid]);
    // $users = DB::select('select * from UserInfo where uid = ? or ? ',[$uid,$uid]);
    // $userall = DB::select('select * from UserInfo ');
    // if($users == true){
    //     foreach($users as $user){
    //         echo $user->cname . '<br>';
    //     }
    // }else{
    //     foreach($userall as $user){
    //         echo $user -> cname . '<br>';
    //     }
    // }
    return view('users')->with('users',$users);
    }

    function updatePassword($uid, $password){
        MyModel::updatePassword($uid, $password);
        return "OK";
    }
}
