<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\_Return;
use App\User;


class ArticleController extends Controller
{
	public function Index(){
		return Article::get()->toArray();

	}

    public function Single($articleID){
    	$article = new Article();
		$return = new _Return();
    	
    	$data = $article->single($articleID);
    	if($data === false){
    		return $return->error(404, 40400, 'Not found');
    	}else{
    		return $return->success($data, 'OK');
    	}
    }

    public function Add(Request $request){
    	$article = new Article();
		$return = new _Return();
        $user = new User();

        $token = substr($request->header('Authorization'), 7);

        $userInfo = $user->where('api_token', $token)->get();
        $userInfo = $userInfo->toArray();

        if(empty($request['title']) || empty($request['content']) || empty($request['isAnonymous'])){
            return $return->error(500, 50001, '缺少必要参数');
        }

        if($request['isAnonymous'] != false && $request['isAnonymous'] != true){
            return $return->error(500, 50000, '信息填写有误');
        }

        if($request['title'] == '' || $request['content'] == ''){
            return $return->error(500, 50001, '你有字段为空，请检查。');
        }

        if(strlen($request['title']) < 5){
            return $return->error(500, 50001, '你的标题太短了，多写点吧~');
        }
        
        $data = $article->add($userInfo[0], $request->only('title','content', 'isAnonymous'));

        return $return->success($data, 'OK');
	}

    public function Me(Request $request){
        $article = new Article();
        $return = new _Return();
        $user = new User();

        $token = substr($request->header('Authorization'), 7);

        $userInfo = $user->where('api_token', $token)->get();
        $userInfo = $userInfo->toArray();

        $data = $article->me($userInfo[0]['OpenID']);

        return $return->success($data, 'OK');
    }
}
	
