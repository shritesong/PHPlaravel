<?php
// namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormControlle;
use App\Http\Controllers\USerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MyCheck;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use App\Models\House;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/user/{uid}",function($uid){
    $user = UserInfo::where("uid",$uid)->get();
    if(count($user) == 0){
        echo "not found!";
    }else{
        foreach($user[0]->lives as $house){
            foreach($house->own as $phone){
                echo $user[0]->uid . 
                "," . 
                $user[0]->cname  . 
                "," .
                $house->address .
                "," .
                $phone->tel;
                echo "<br>";
            }
        
        }
    }
    // var_dump($user);
    // die();
});

Route::get("/query",function(){
    $users = UserInfo::all();
    foreach($users as $user){
        echo $user->uid . "," . $user->cname . "</br>";
    }
});

Route::get("/insert/{uid}/{cname}/{address}", function($uid,$cname,$address){
    $user = new UserInfo();
    $user->uid = $uid;
    $user->cname = $cname;
    $user->save();

    $house = new House();
    $house->address = $address;
    $user->lives()->save($house);
});

Route::get("/update/{uid}/{cname}",function($uid,$cname){
    $user = UserInfo::find($uid);
    $user->cname = $cname;
    $user->save();
});
Route::get("/delete/{uid}",function($uid){
    $user = UserInfo::find($uid);
    $user->delete();
});

Route::get("/bill/{hid}",function($hid){
    $house = House::find($hid);
    foreach($house->showBills as $bill){
        echo $bill->tel . "," . $bill->fee . "<br>";
    }
});

Route::get("/userinfo",function(){
    $users = UserInfo::all();
    $json = $users->toJson(JSON_UNESCAPED_UNICODE);
    return response($json)
            ->header('content-type','application/json')
            ->header('charset','utf-8');
});
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// // Route::get('/test/{name?}',function($name="Noname"){
// //     return "Hello," . $name;
// // });

// Route::redirect('/home','/HelloLaravel/public'); 
// Route::redirect('/google','https://www.google.com');

// Route::get('/main/{name}',HomeController::class);

// Route::get('/main/add/{n1}/{n2}',[HomeController::class,'add']);

// Route::get('/form',function(){
//     return view('form');
// });

// Route::post('/form',FormControlle::class)
//     ->middleware('check');

// Route::get('/users/{uid?}',[UserController::class,'queryUsers']);

// Route::get("/update/{uid?}/{password?}", [UserController::class,"updatePassword"]);

// Route::get('/test',function(){
//     try{
//     DB::transaction(function(){
//         DB::delete('delete from Live');
//         DB::insert("insert into UserInfo (uid) values ('A01')");
//     });
//     }catch (Throwable $error){
//         die("Database error");
//     }
// });