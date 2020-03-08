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

    
}
	
