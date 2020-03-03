<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'content', 'type', 'user_id', 'audited', 'date'];
	public $timestamps = false;
	
    public function list(){
    	$data = Article::where('audited', 1)->leftJoin('users', 'articles.user_id', 'users.id')->selectRaw('articles.id, articles.title, articles.content, articles.type, articles.date, articles.user_id, users.name as user_name, users.avatar as user_avatar')->orderBy('id', 'desc')->paginate(10)->toArray();

    	return $data;
    }

    public function detail($article_id){
    	$data = Article::where('id', $article_id)->where('audited', 1)->leftJoin('users', 'user_id', 'id')->selectRaw('articles.id, articles.title, articles.content, articles.type, articles.date, articles.user_id, users.name as user_name, users.avatar as user_avatar')->get()->toArray();

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
