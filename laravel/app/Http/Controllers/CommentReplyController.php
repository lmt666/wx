<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentReply;
use App\Models\_Return;

class CommentReplyController extends Controller
{
    public function List($company_name, $job_id, $comment_id){
    	$comment_reply = new CommentReply();
    	$return = new _Return();

    	$data = $comment_reply->list($comment_id);

    	return $return->success($data);
    }

    public function Add($company_name, $job_id, $comment_id, Request $request){
    	$comment_reply = new CommentReply();
    	$return = new _Return();

    	$user = Auth::guard('api')->user();

    	if(!isset($request['content'])){
    		return $return->error(500, 10001);
    	}

    	if($request['content'] == ''){
    		return $return->error(500, 10002);
    	}

    	$data = $comment_reply->add($user['id'], $comment_id, $request);

    	return $return->success($data);
    }

    public function Del($company_name, $job_id, $comment_id, $reply_id){
        $comment_reply = new CommentReply();
        $return = new _Return();

        $data = $comment_reply->del($reply_id);

        return $return->success($data);
    }
}
