<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentReply;
use App\Models\_Return;

class CommentReplyController extends Controller
{
    public function List($job_id, $comment_id){
    	$comment_reply = new CommentReply();
    	$return = new _Return();

    	if(!$comment_reply->comment_match_job($job_id, $comment_id)){
    		return $return->error(500, 10001);
    	}

    	$data = $comment_reply->list($comment_id);

    	return $return->success($data);
    }

    public function Add($job_id, $comment_id, Request $request){
    	$comment_reply = new CommentReply();
    	$return = new _Return();

    	$user = auth::guard()->user();
    	
    	if(!isset($request['content'])){
    		return $return->error(500, 10001);
    	}

    	if($request['content'] == ''){
    		return $return->error(500, 10002);
    	}

        if($request['reply_id'] != null){
            if(!$comment_reply->reply_match_comment($comment_id, $reply_id)){
                return $return->error(404, 40005);
            }
        }

        if(!$comment_reply->comment_match_job($job_id, $comment_id)){
    		return $return->error(404, 40004);
    	}

    	$data = $comment_reply->add($user['id'], $comment_id, $request);

    	return $return->success($data);
    }
}
