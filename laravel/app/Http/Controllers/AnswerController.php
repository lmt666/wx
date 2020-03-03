<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Answer;
use App\Models\_Return;

class AnswerController extends Controller
{
    public function List($article_id){
        $answer = new Answer();
        $return = new _Return();

        $data = $answer->list($article_id);

        if(empty($data['data'])){
            return $return->error(404, 50001);
        }else{
            return $return->success($data);
        }
    }

    public function Add($article_id, Request $request){
        $answer = new Answer();
        $return = new _Return();

        //$userinfo = $request->user()->toArray();
        //$user_id = $userinfo['id'];

        if(!isset($request['content'])){
            return $return->error(500, 10004);
        }

        if($request['content'] == ''){
            return $return->error(500, 10002);
        }

        if(!preg_match('/^[1-9][0-9]*$/', $article_id)){
            return $return->error(500, 10003);
        }

        if(!$answer->article_exist($article_id)){
            return $return->error(500, 10001);
        }

        $data = $answer->add(10, $article_id, $request);

        return $return->success($data);
    }
    
}
