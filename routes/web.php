<?php
// namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormControlle;
use App\Http\Controllers\USerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MyCheck;
use Illuminate\Support\Facades\DB;


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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/test/{name?}',function($name="Noname"){
//     return "Hello," . $name;
// });

Route::redirect('/home','/HelloLaravel/public'); 
Route::redirect('/google','https://www.google.com');

Route::get('/main/{name}',HomeController::class);

Route::get('/main/add/{n1}/{n2}',[HomeController::class,'add']);

Route::get('/form',function(){
    return view('form');
});

Route::post('/form',FormControlle::class)
    ->middleware('check');

Route::get('/users/{uid?}',[UserController::class,'queryUsers']);

Route::get("/update/{uid?}/{password?}", [UserController::class,"updatePassword"]);

Route::get('/test',function(){
    try{
    DB::transaction(function(){
        DB::delete('delete from Live');
        DB::insert("insert into UserInfo (uid) values ('A01')");
    });
    }catch (Throwable $error){
        die("Database error");
    }
});