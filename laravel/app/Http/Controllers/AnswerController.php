<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;
use App\Models\_Return;


class AnswerController extends Controller
{
    public function List($article_id){
        $answer = new Answer();
        $return = new _Return();

        $data = $answer->list($article_id);

        return $return->success($data);
    }

    public function Add($article_id, Request $request){
        $answer = new Answer();
        $return = new _Return();

        $user = Auth::guard('api')->user();

        if(!isset($request['content'])){
            return $return->error(500, 10001);
        }

        if($request['content'] == ''){
            return $return->error(500, 10002);
        }

        $data = $answer->add($user['id'], $article_id, $request);

        return $return->success($data);
    }

    public function Del($article_id, $answer_id){
        $answer = new Answer();
        $return = new _Return();

        $data = $answer->del($answer_id);

        return $return->success($data);
    }
    
}
