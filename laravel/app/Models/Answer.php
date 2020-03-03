<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
	protected $fillable = ['content', 'user_id', 'article_id', 'audited', 'date'];
	public $timestamps = false;

    public function list($article_id){
        $data = Answer::where('article_id', $article_id)->where('audited', 1)->where('answer_id', null)->leftJoin('users', 'answers.user_id', 'users.id')->selectRaw('answers.id, answers.content, answers.article_id, answers.date, answers.user_id, users.name as user_name, users.avatar as user_avatar')->orderBy('id', 'desc')->paginate(10)->toArray();

        return $data;
    }

    public function add($user_id, $article_id, $data){
        Answer::create([
            'content' => $data['content'],
            'user_id' => $user_id,
            'article_id' => $article_id,
            'date' => date('Y-m-d')
        ]);

        return 'OK';
    }

    // 判断article是否存在
    public function article_exist($article_id){
        if(Article::where('id', $article_id)->exists()){
            return true;
        }else{
            return false;
        }
    }

}
