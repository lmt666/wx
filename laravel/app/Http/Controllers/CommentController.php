<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\_Return;

class CommentController extends Controller
{
    public function List($job_id){
    	$comment = new Comment();
    	$return = new _Return();

        if(!$comment->job_exist($job_id)){
            return $return->error(404, 40002);
        }

    	$data = $comment->list($job_id);

    	return $return->success($data); 	
    }

    public function Add($job_id, Request $request){
        $comment = new Comment();
        $return = new _Return();

        $user = auth::guard()->user();

        if(!isset($request['content'])){
            return $return->error(500, 10001);
        }

        if($request['content'] == ''){
            return $return->error(500, 10002);
        }

        if(!$comment->job_exist($job_id)){
            return $return->error(404, 40002);
        }

        $data = $comment->add($user['id'], $job_id, $request);

        return $return->success($data);
    }
}
