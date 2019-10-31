<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['Title','Content','PublishDate','OpenID','PublisherName','PublisherAvatar','isAudited','isAnonymous'];
	public $timestamps = false;

	
    public function single($articleID){
    	$article = new Article();

    	// 获取文章内容
    	$query = $article->where('ID', $articleID)->get();
    	$query->toArray();

    	// 查询不到内容或文章没过审
    	if(empty($query) || $query[0]['isAudited'] == 0){
    		return false;
    	}else{
    		// 设置匿名发布的信息
    		if($query[0]['isAnonymous'] == 1){
    			$query[0]['PublisherName'] = '匿名用户';
    			$query[0]['PublisherAvatar'] = ''; // 匿名头像为空
    		}

    		return $query[0];
    	}
    }

	public function add($userInfo, $data){
	 	$article = new Article([
	 		'Title' => $data['title'],
		 	'Content' => $data['content'],
		 	'PublishDate' => date('Y-m-d'),
		 	'OpenID' => $userInfo['OpenID'],
		 	'PublisherName' => $userInfo['Name'],
		 	'PublisherAvatar' => $userInfo['Avatar'],
		 	'isAudited' => 0,
		 	'isAnonymous' => $data['isAnonymous']
	 	]);
	 	$article->save();

	 	return 'OK';
	}

	function me($openID){
		$data = Article::where('OpenID',$openID)->get();
		
		return $data->toArray();
	}
}
