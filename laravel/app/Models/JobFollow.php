<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobFollow extends Model
{
	protected $fillable = ['user_id', 'job_id'];
    public $timestamps = false;

    public function follow($job_id, $user_id){
        JobFollow::create([
        	'user_id' => $user_id,
            'job_id' => $job_id
        ]);

        return 'OK';
    }

    public function cancelfollow($job_id, $user_id){
    	JobFollow::where('user_id', $user_id)->where('job_id', $job_id)->delete();

        return 'OK';
    }

    public function myfollow($user_id){
        $data = JobFollow::where('job_follows.user_id', $user_id)->leftJoin('jobs', 'job_follows.job_id', 'jobs.id')->selectRaw('job_follows.id, jobs.id as job_id, position, company_name, place, experience, education, salary, content, requirement, ps, email, phone, date')->orderBy('job_follows.id', 'desc')->paginate(10)->toArray();
 
        return $data;
    }
}
