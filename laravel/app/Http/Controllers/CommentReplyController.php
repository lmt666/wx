<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CommentReply;
use App\Models\_Return;

class CommentReplyController extends Controller
{
    public function List($job_id, $comment_id){
    	$comment_reply = new CommentReply();
    	$return = new _Return();

    	if(!$comment_reply->comment_exist($comment_id)){
    		return $return->error(500, 10001);
    	}

    	if(!$comment_reply->comment_match_job($job_id, $comment_id)){
    		return $return->error(500, 10001);
    	}

    	$data = $comment_reply->list($comment_id);

    	if(empty($data)){
    		return $return->error(404, 50001);
    	}else{
    		return $return->success($data);
    	}
    }

    public function Add($job_id, $comment_id, Request $request){
    	$comment_reply = new CommentReply();
    	$return = new _Return();

    	//$userinfo = $request->user()->toArray();
    	//$user_id = $userinfo['id'];
    	
    	if(!isset($request['content'])){
    		return $return->error(500, 10004);
    	}

    	if($request['content'] == ''){
    		return $return->error(500, 10002);
    	}

    	if(!preg_match('/^[1-9][0-9]*$/', $comment_id)){
            return $return->error(500, 10003);
        }

        if($request['reply_id'] != null){
            if(!preg_match('/^[1-9][0-9]*$/', $request['reply_id'])){
                return $return->error(500, 10003);
            }
        }

        if(!$comment_reply->comment_exist($comment_id)){
            return $return->error(500, 10001);
        }

        if(!$comment_reply->comment_match_job($job_id, $comment_id)){
    		return $return->error(500, 10001);
    	}

    	$data = $comment_reply->add(10, $comment_id, $request);

    	return $return->success($data);
    }
}
