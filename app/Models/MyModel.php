<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MyModel extends Model
{
    use HasFactory;

    function add(Request $request){
        $a = $request->a;
        $b = $request->b;

        return $a + $b;
    }

    static function queryUsers($uid=null){
        // $users = DB::select('select * from UserInfo where uid = ? or ? ',[$uid,$uid]);
        // return $users;
        if ($uid){
        // return DB::table('UserInfo')
        //         ->join('live','userInfo.uid','=','live.uid')
        //         ->join('house','live.hid','=','house.hid')
        //         ->where('UserInfo.uid',$uid)
        //         ->get();
                return UserInfo::where('uid',$uid)->get();
            }else{
                // return DB::table('UserInfo')
                // ->join('live','userInfo.uid','=','live.uid')
                // ->join('house','live.hid','=','house.hid')
                // // ->where('UserInfo.uid',$uid)
                // ->get();
                return UserInfo::all();
            }
    }
    static function updatePassword($uid, $password){
        DB::update("update UserInfo set pwd = ? where uid = ?",
        [$password, $uid]);
    }
}
