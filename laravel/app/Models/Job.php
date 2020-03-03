<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['position', 'company_name', 'place', 'experience', 'education', 'salary', 'content', 'requirement', 'ps', 'email', 'phone', 'date'];
    public $timestamps = false;

    public function list(){
    	$data = Job::orderBy('id', 'desc')->paginate(10)->toArray();

    	return $data;
    }

    public function detail($job_id){
    	$data = Job::where('id', $job_id)->get()->toArray();

    	return $data;
    }
}