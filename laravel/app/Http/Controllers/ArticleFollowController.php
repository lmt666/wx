<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ArticleFollow;
use App\Models\_Return;

class ArticleFollowController extends Controller
{
    public function Follow($article_id){
    	$article_follow = new ArticleFollow();
        $return = new _Return();

        $user = Auth::guard('api')->user();

        $data = $article_follow->follow($article_id, $user['id']);

        return $return->success($data);
    }

    public function CancelFollow($article_id){
        $article_follow = new ArticleFollow();
        $return = new _Return();

        $user = Auth::guard('api')->user();

        $data = $article_follow->cancelfollow($article_id, $user['id']);

        return $return->success($data);
    }

    public function MyFollow(){
        $article_follow = new ArticleFollow();
        $return = new _Return();

        $user = Auth::guard('api')->user();

        $data = $article_follow->myfollow($user['id']);
 
        return $return->success($data);
    }
}
