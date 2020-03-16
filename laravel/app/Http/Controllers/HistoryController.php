<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use App\Models\_Return;

class HistoryController extends Controller
{
    public function List(){
    	$history = new History();
    	$return = new _Return();

    	$user = Auth::user();

    	$data = $history->list($user['id']);

    	return $return->success($data);
    }

    public function Add($article_id){
    	$history = new History();
    	$return = new _Return();

    	$user = Auth::user();

    	$data = $history->add($article_id, $user['id']);

    	return $return->success($data);
    }

    public function Del($article_id){
    	$history = new History();
    	$return = new _Return();

    	$user = Auth::user();

    	$data = $history->del($article_id, $user['id']);

    	return $return->success($data);
    }

    public function Del_All(){
    	$history = new History();
    	$return = new _Return();

    	$user = Auth::user();

    	$data = $history->del($user['id']);

    	return $return->success($data);
    }
}
