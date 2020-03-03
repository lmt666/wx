<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Models\_Return;


class ArticleController extends Controller
{
    
    public function List(){
    	$article = new Article();
		$return = new _Return();
    	
    	$data = $article->list();
        if(empty($data['data'])){
            return $return->error(404, 50001);
        }else{  
            return $return->success($data);
        }
        
    }

    public function Detail($article_id){
        $article = new Article();
        $return = new _Return();
        
        $data = $article->detail($article_id);
        if(empty($data)){
            return $return->error(404, 50001);
        }else{
            return $return->success($data);
        }

    }

    public function Add(Request $request){
        $article = new Article();
        $return = new _Return();

        //$userinfo = $request->user()->toArray();
        //$user_id = $userinfo['id'];

        if(!isset($request['title']) || !isset($request['content']) || !isset($request['type'])){
            return $return->error(500, 10004);
        }

        if($request['title'] == '' || $request['content'] == '' || $request['type'] == ''){
            return $return->error(500, 10002);
        }

        if(strlen($request['title']) < 5){
            return $return->error(500, 10001);
        }

        if($request['type'] != '经验' && $request['type'] != '问题'){
            return $return->error(500, 10001);
        }

        $data = $article->add(10, $request);

        return $return->success($data);
    }
}
	
