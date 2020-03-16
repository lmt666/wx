<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['article_id', 'user_id'];
    public $timestamps = false;

    public function list($user_id){
    	$data = History::where('histories.user_id', $user_id)->leftJoin('articles', 'histories.article_id', 'articles.id')->selectRaw('histories.id, articles.id as article_id, title, content, type, audited, date, articles.user_id')->leftJoin('users', 'articles.user_id', 'users.id')->selectRaw('users.name as user_name, users.avatar as user_avatar')->orderBy('id', 'desc')->paginate(10);

    	return $data;
    }

    public function add($article_id, $user_id){
    	History::create([
    		'article_id' => $article_id,
    		'user_id' => $user_id
    	]);

    	return 'OK';
    }

    public function del($article_id, $user_id){
    	History::where('user_id', $user_id)->where('article_id', $article_id)->delete();

    	return '删除成功!';
    }

    public function del_all($user_id){
    	History::where('user_id', $user_id)->delete();

    	return '删除成功!';
    }

}
