<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resume;
use App\Models\_Return;


class ResumeController extends Controller
{
    public function Add(Request $request){
    	$resume = new Resume();
    	$return = new _Return();

    	$user = Auth::guard('api')->user();

    	if(!isset($request['name']) || !isset($request['birth']) || !isset($request['sex']) || !isset($request['major']) || !isset($request['university']) || !isset($request['self-description'])){
    		return $return->error(500, 10001);
    	}

    	if(empty($request['name']) || empty($request['birth']) || empty($request['sex']) || empty($request['major']) || empty($request['university']) || empty($request['self-description'])){
    		return $return->error(500, 10002);
    	}

    	$data = $resume->add($user['id'], $request);

    	return $return->success($data);
    }

    public function Renew(Request $request){
    	$resume = new Resume();
    	$return = new _Return();

    	$user = Auth::guard('api')->user();

    	if(!isset($request['name']) || !isset($request['birth']) || !isset($request['sex']) || !isset($request['major']) || !isset($request['university']) || !isset($request['self-description'])){
    		return $return->error(500, 10001);
    	}

    	if(empty($request['name']) || empty($request['birth']) || empty($request['sex']) || empty($request['major']) || empty($request['university']) || empty($request['self-description'])){
    		return $return->error(500, 10002);
    	}

    	$data = $resume->renew($user['id'], $request);

    	return $return->success($data);
    }

    public function MyResume(){
    	$resume = new Resume();
    	$return = new _Return();

    	$user = Auth::guard('api')->user();

    	$data = $resume->myresume($user['id']);

    	return $return->success($data);
    }
}
