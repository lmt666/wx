<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AnswerReply;
use App\Models\_Return;

class AnswerReplyController extends Controller
{
    public function List($article_id, $answer_id){
    	$answer_reply = new AnswerReply();
    	$return = new _Return();

    	if(!$answer_reply->answer_exist($answer_id)){
    		return $return->error(500, 10001);
    	}

    	if(!$answer_reply->answer_match_article($article_id, $answer_id)){
    		return $return->error(500, 10001);
    	}

    	$data = $answer_reply->list($answer_id);

    	if(empty($data)){
    		return $return->error(404, 50001);
    	}else{
    		return $return->success($data);
    	}
    }

    public function Add($article_id, $answer_id, Request $request){
    	$answer_reply = new AnswerReply();
    	$return = new _Return();

    	//$userinfo = $request->user()->toArray();
    	//$user_id = $userinfo['id'];
    	
    	if(!isset($request['content'])){
    		return $return->error(500, 10004);
    	}

    	if($request['content'] == ''){
    		return $return->error(500, 10002);
    	}

    	if(!preg_match('/^[1-9][0-9]*$/', $answer_id)){
            return $return->error(500, 10003);
        }

        if($request['reply_id'] != null){
            if(!preg_match('/^[1-9][0-9]*$/', $request['reply_id'])){
                return $return->error(500, 10003);
            }
        }

        if(!$answer_reply->answer_exist($answer_id)){
            return $return->error(500, 10001);
        }

        if(!$answer_reply->answer_match_article($article_id, $answer_id)){
    		return $return->error(500, 10001);
    	}

    	$data = $answer_reply->add(10, $answer_id, $request);

    	return $return->success($data);
    }
}
