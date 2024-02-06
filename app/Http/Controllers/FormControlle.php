<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MyModel;

class FormControlle extends Controller
{
    private $mymodel;

    function __construct()
    {
        $this->mymodel = new MyModel();
    }
    function __invoke(Request $request)
    {

        $answer = $this->mymodel->add($request);

        return view('form')
            ->with('a',$request->a)
            ->with('b',$request->b)
            ->with('answer',$answer);
    }
}
