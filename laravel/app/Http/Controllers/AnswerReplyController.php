<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AnswerReply;
use App\Models\_Return;


class AnswerReplyController extends Controller
{
    public function List($article_id, $answer_id){
    	$answer_reply = new AnswerReply();
    	$return = new _Return();

    	if(!$answer_reply->answer_match_article($article_id, $answer_id)){
    		return $return->error(404, 40003);
    	}

    	$data = $answer_reply->list($answer_id);

    	return $return->success($data);
    }

    public function Add($article_id, $answer_id, Request $request){
    	$answer_reply = new AnswerReply();
    	$return = new _Return();

    	$user = auth::guard()->user();
    	
    	if(!isset($request['content'])){
    		return $return->error(500, 10001);
    	}

    	if($request['content'] == ''){
    		return $return->error(500, 10002);
    	}

        if(!$answer_reply->answer_match_article($article_id, $answer_id)){
            return $return->error(404, 40003);
        }

        if($request['reply_id'] != null){
            if(!$answer_reply->reply_match_answer($answer_id, $reply_id)){
                return $return->error(404, 40005);
            }
        }

    	$data = $answer_reply->add($user['id'], $answer_id, $request);

    	return $return->success($data);
    }
}
