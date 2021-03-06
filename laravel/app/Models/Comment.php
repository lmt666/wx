<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'job_id', 'audited', 'date'];
    public $timestamps = false;

    public function comment_replies(){
        return $this->hasMany(CommentReply::class);
    }

    public function list($job_id){
    	$data = Comment::where('job_id', $job_id)->where('audited', 1)->withCount(['comment_replies'])->leftJoin('users', 'comments.user_id', 'users.id')->selectRaw('users.name as user_name, users.avatar as user_avatar')->orderBy('id', 'desc')->paginate(10)->toArray();

    	return $data;
    }

    public function add($user_id, $job_id, $data){
        Comment::create([
            'content' => $data['content'],
            'user_id' => $user_id,
            'job_id' => $job_id,
            'date' => date('Y-m-d')
        ]);

        return '评论成功!';
    }

    public function del($comment_id){
        Comment::where('id', $comment_id)->delete();

        return '删除成功!';
    }
    
}
