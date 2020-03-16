<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleFollow extends Model
{
	protected $fillable = ['user_id', 'article_id'];
    public $timestamps = false;

    public function follow($article_id, $user_id){
        ArticleFollow::create([
        	'user_id' => $user_id,
            'article_id' => $article_id
        ]);

        return '收藏成功!';
    }

    public function cancelfollow($article_id, $user_id){
    	ArticleFollow::where('user_id', $user_id)->where('article_id', $article_id)->delete();

        return '取消成功!';
    }

    public function myfollow($user_id){
        $data = ArticleFollow::where('article_follows.user_id', $user_id)->
        leftJoin('articles', 'article_follows.article_id', 'articles.id')->
        selectRaw('article_follows.id, articles.id as article_id, title, content, type, articles.user_id, audited, date')->
        leftJoin('users', 'articles.user_id', 'users.id')->
        selectRaw('users.name as publisher_name, users.avatar as publisher_avatar')->orderBy('article_follows.id', 'desc')->paginate(10)->toArray();
 
        return $data;
    }
}
