<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['content', 'user_id', 'comment_id', 'reply_id', 'audited', 'date'];
    public $timestamps = false;

    public function list($comment_id){
    	// 查找直接回复评论的回复
    	$data1 = CommentReply::where('comment_id', $comment_id)->where('reply_id', null)->where('comment_replies.audited', 1)->leftJoin('users as users1', 'comment_replies.user_id', 'users1.id')->selectRaw('comment_replies.id, comment_replies.content, comment_replies.comment_id, comment_replies.reply_id, comment_replies.audited, comment_replies.date, comment_replies.user_id, users1.name as user_name, users1.avatar as user_avatar')->
	    	leftJoin('comments', 'comment_replies.comment_id', 'comments.id')->
	    	leftJoin('users as users2', 'comments.user_id', 'users2.id')->
	    	selectRaw('comments.user_id as aim_user_id ,users2.name as aim_user_name, users2.avatar as aim_user_avatar');

	    // 查找回复回复的回复
	    $data2 = CommentReply::where('comment_replies.comment_id', $comment_id)->where('comment_replies.reply_id', '!=', null)->where('comment_replies.audited', 1)->leftJoin('users as users1', 'comment_replies.user_id', 'users1.id')->selectRaw('comment_replies.id, comment_replies.content, comment_replies.comment_id, comment_replies.reply_id, comment_replies.audited, comment_replies.date, comment_replies.user_id, users1.name as user_name, users1.avatar as user_avatar')->
	    	leftJoin('comment_replies as replies', 'comment_replies.reply_id', 'replies.id')->
	    	leftJoin('users as users2', 'replies.user_id', 'users2.id')->
	    	selectRaw('replies.user_id as aim_user_id , users2.name as aim_user_name, users2.avatar as aim_user_avatar');

	    // 结果合并
    	$data = $data1->union($data2)->orderBy('id', 'desc')->get()->toArray();

    	return $data;
    }

    public function add($user_id, $comment_id, $data){
    	CommentReply::create([
    		'content' => $data['content'],
    		'user_id' => $user_id,
    		'comment_id' => $comment_id,
    		'reply_id' => $data['reply_id'],
    		'date' => date('Y-m-d')
    	]);

    	return '回复成功!';
    }

    public function del($reply_id){
        CommentReply::where('id', $reply_id)->delete();

        return '删除成功!';
    }

}
