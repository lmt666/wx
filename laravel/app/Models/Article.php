<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'content', 'type', 'user_id', 'audited', 'date'];
	public $timestamps = false;

	public function answers(){
		return $this->hasMany(Answer::class);
	}

	public function article_follows(){
		return $this->hasMany(ArticleFollow::class);
	}
	
    public function list(){
    	$data = Article::where('audited', 1)->withCount(['answers', 'article_follows'])->leftJoin('users', 'articles.user_id', 'users.id')->selectRaw('users.name as user_name, users.avatar as user_avatar')->orderBy('id', 'desc')->paginate(10)->toArray();

    	return $data;
    }

    public function detail($article_id){
    	$data = Article::where('articles.id', $article_id)->where('audited', 1)->withCount(['answers', 'article_follows'])->leftJoin('users', 'articles.user_id', 'users.id')->selectRaw('users.name as user_name, users.avatar as user_avatar')->get()->toArray();

    	return $data;
    }
	
	public function add($user_id, $data){
		Article::create([
			'title' => $data['title'],
			'content' => $data['content'],
			'type' => $data['type'],
			'user_id' => $user_id,
			'date' => date('Y-m-d')
		]);

		return 'OK';
	}

}
