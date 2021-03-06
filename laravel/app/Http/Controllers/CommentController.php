<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\_Return;

class CommentController extends Controller
{
    public function List($company_name, $job_id){
    	$comment = new Comment();
    	$return = new _Return();

    	$data = $comment->list($job_id);

    	return $return->success($data); 	
    }

    public function Add($company_name, $job_id, Request $request){
        $comment = new Comment();
        $return = new _Return();

        $user =Auth::guard('api')->user();

        if(!isset($request['content'])){
            return $return->error(500, 10001);
        }

        if($request['content'] == ''){
            return $return->error(500, 10002);
        }

        $data = $comment->add($user['id'], $job_id, $request);

        return $return->success($data);
    }

    public function Del($company_name, $job_id, $comment_id){
        $comment = new Comment();
        $return = new _Return();

        $data = $comment->del($comment_id);

        return $return->success($data);     
    }
}
