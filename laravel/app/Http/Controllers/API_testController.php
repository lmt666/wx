<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use Request;
use App\Http\Controllers\Controller;
use App\Test;

class API_testController extends Controller
{
    public function Index(){
    	$test = new Test();

        return view('index')->with('data',$test->index());
    }
    public function Single($id){
    	$test = new Test();

        return view('show')->with('data',$test->single($id));
    }
    public function Add(){
        return view('add');
    }
    public function Store(Request $request){
        $test = new Test();
        $test->store($request->only('title','body'));

    }
    public function Origin($id){
        $test = new Test();
        
        return view('update')->with('data',$test->single($id));
    }
    public function Renew(Request $request){
        $test = new Test();
        $test->renew($request->only('id','title','body'));

    }
    public function Del($id){
        $test = new Test();
        $test->del($id);
    }
    
}
