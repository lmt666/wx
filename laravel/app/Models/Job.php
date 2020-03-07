<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['position', 'company_name', 'place', 'experience', 'education', 'salary', 'content', 'requirement', 'ps', 'email', 'phone', 'date'];
    public $timestamps = false;

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function list(){
    	$data = Job::orderBy('id', 'desc')->paginate(10)->toArray();

    	return $data;
    }

    public function detail($job_id){
    	$data = Job::where('id', $job_id)->withCount(['comments'])->get()->toArray();

    	return $data;
    }

    // 判断job与company是否正确匹配
    public function job_match_company($company_name, $job_id){
        $data = Job::where('id', $job_id)->get()->toArray();

        if($company_name == $data[0]['company_name']){
            return true;
        }else{
            return false;
        }
    }
   
}
