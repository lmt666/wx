<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'job_id', 'audited', 'date'];
    public $timestamps = false;

    public function list($job_id){
    	$data = Comment::where('job_id', $job_id)->where('audited', 1)->leftJoin('users', 'comments.user_id', 'users.id')->selectRaw('comments.id, comments.content, comments.job_id, comments.date, comments.user_id, users.name as user_name, users.avatar as user_avatar')->orderBy('id', 'desc')->paginate(10)->toArray();

    	return $data;
    }

    public function add($user_id, $job_id, $data){
        Comment::create([
            'content' => $data['content'],
            'user_id' => $user_id,
            'job_id' => $job_id,
            'date' => date('Y-m-d')
        ]);

        return 'OK';
    }

    // 判断job是否存在
    public function job_exist($job_id){
        if(Job::where('id', $job_id)->exists()){
            return true;
        }else{
            return false;
        }
    }
}
