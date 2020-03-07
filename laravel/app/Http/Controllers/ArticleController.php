<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\_Return;



class ArticleController extends Controller
{
    
    public function List(){
    	$article = new Article();
		$return = new _Return();
    	
    	$data = $article->list();

        return $return->success($data);  
    }

    public function Detail($article_id){
        $article = new Article();
        $return = new _Return();

        $data = $article->detail($article_id);
        if(empty($data)){
            return $return->error(404, 40001);
        }

        return $return->success($data);
    }

    public function Add(Request $request){
        $article = new Article();
        $return = new _Return();

        $user = auth::guard()->user();

        if(!isset($request['title']) || !isset($request['content']) || !isset($request['type'])){
            return $return->error(500, 10001);
        }

        if($request['title'] == '' || $request['content'] == '' || $request['type'] == ''){
            return $return->error(500, 10002);
        }

        if(strlen($request['title']) < 5){
            return $return->error(500, 10003);
        }

        if($request['type'] != '经验' && $request['type'] != '问题'){
            return $return->error(500, 10004);
        }

        $data = $article->add($user['id'], $request);

        return $return->success($data);
    }

    public function Follow($article_id){
        $article = new Article();
        $return = new _Return();

        $user = auth::guard()->user();

        if(empty($article->detail($article_id))){
            return $return->error(404, 40001);
        }

        DB::table('article_follows')->insert([
            'user_id' => $user['id'],
            'article_id' => $article_id
        ]);

        return $return->success('OK');
    }

    public function CancelFollow($article_id){
        $article = new Article();
        $return = new _Return();

        $user = auth::guard()->user();

        if(empty($article->detail($article_id))){
            return $return->error(404, 40001);
        }

        DB::table('article_follows')->where('user_id', $user['id'])->where('article_id', $article_id)-delete();

        return $return->success('OK');
    }

    public function MyFollow(){
        $return = new _Return();

        $user = auth::guard()->user();

        $data = DB::table('article_follows')->where('article_follows.user_id', $user['id'])->
        leftJoin('articles', 'article_follows.article_id', 'articles.id')->
        selectRaw('article_follows.id, articles.id as article_id, articles.title, articles.content, articles.type, articles.user_id, articles.audited, articles.date')->
        leftJoin('users', 'articles.user_id', 'users.id')->
        selectRaw('users.name as publisher_name, users.avatar as publisher_avatar')->orderBy('article_follows.id', 'desc')->paginate(10)->toArray();
 
        return $return->success($data);
    }
}
	
