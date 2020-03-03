<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\_Return;

class CommentController extends Controller
{
    public function List($job_id){
    	$comment = new Comment();
    	$return = new _Return();

    	$data = $comment->list($job_id);
    	if(empty($data['data'])){
    		return $return->error(404, 50001);
    	}else{
    		return $return->success($data);
    	}
    	
    }

    public function Add($job_id, Request $request){
        $comment = new Comment();
        $return = new _Return();

        //$userinfo = $request->user()->toArray();
        //$user_id = $userinfo['id'];

        if(!isset($request['content'])){
            return $return->error(500, 10004);
        }

        if($request['content'] == ''){
            return $return->error(500, 10002);
        }

        if(!preg_match('/^[1-9][0-9]*$/', $job_id)){
        	return $return->error(500, 10003);
        }

        if(!$comment->job_exist($job_id)){
            return $return->error(500, 10001);
        }

        $data = $comment->add(10, $job_id, $request);

        return $return->success($data);
    }
}
