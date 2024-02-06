<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function __invoke($name)
    {
        return view('myview',['data'=>$name]);
    }

    function add($n1,$n2){
        return view('myview',[
            'data'=>'world',
            'n1'=>$n1,
            'n2'=>$n2
        ]);
    }
}
