<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerReply extends Model
{
    protected $fillable = ['content', 'user_id', 'answer_id', 'reply_id', 'audited', 'date'];
    public $timestamps = false;

    public function list($answer_id){
    	// 查找直接回复评论的回复
    	$data1 = AnswerReply::where('answer_id', $answer_id)->where('reply_id', null)->where('answer_replies.audited', 1)->leftJoin('users as users1', 'answer_replies.user_id', 'users1.id')->selectRaw('answer_replies.id, answer_replies.content, answer_replies.answer_id, answer_replies.reply_id, answer_replies.audited, answer_replies.date, answer_replies.user_id, users1.name as user_name, users1.avatar as user_avatar')->
	    	leftJoin('answers', 'answer_replies.answer_id', 'answers.id')->
	    	leftJoin('users as users2', 'answers.user_id', 'users2.id')->
	    	selectRaw('answers.user_id as aim_user_id ,users2.name as aim_user_name, users2.avatar as aim_user_avatar');

	    // 查找回复回复的回复
	    $data2 = AnswerReply::where('answer_replies.answer_id', $answer_id)->where('answer_replies.reply_id', '!=', null)->where('answer_replies.audited', 1)->leftJoin('users as users1', 'answer_replies.user_id', 'users1.id')->selectRaw('answer_replies.id, answer_replies.content, answer_replies.answer_id, answer_replies.reply_id, answer_replies.audited, answer_replies.date, answer_replies.user_id, users1.name as user_name, users1.avatar as user_avatar')->
	    	leftJoin('answer_replies as replies', 'answer_replies.reply_id', 'replies.id')->
	    	leftJoin('users as users2', 'replies.user_id', 'users2.id')->
	    	selectRaw('replies.user_id as aim_user_id , users2.name as aim_user_name, users2.avatar as aim_user_avatar');

	    // 结果合并
    	$data = $data1->union($data2)->orderBy('id', 'desc')->get()->toArray();

    	return $data;
    }

    public function add($user_id, $answer_id, $data){
    	AnswerReply::create([
    		'content' => $data['content'],
    		'user_id' => $user_id,
    		'answer_id' => $answer_id,
    		'reply_id' => $data['reply_id'],
    		'date' => date('Y-m-d')
    	]);

    	return 'OK';
    }

    // 判断answer和article是否正确匹配
    public function answer_match_article($article_id, $answer_id){
    	$data = Answer::where('id', $answer_id)->get()->toArray();

    	if($article_id == $data[0]['article_id']){
            return true;
        }else{
            return false;
        }
    }

    // 判断reply和answer是否正确匹配
    public function reply_match_answer($answer_id, $reply_id){
        $data = AnswerReply::where('id', $reply_id)->get()->toArray();

        if($answer_id == $data[0]['answer_id']){
            return true;
        }else{
            return false;
        }
    }
}
