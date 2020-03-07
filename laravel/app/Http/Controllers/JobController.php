<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\_Return;


class JobController extends Controller
{
    public function List(){
    	$job = new Job();
    	$return = new _Return();

    	$data = $job->list();

        return $return->success($data);
    }

    public function Detail($company_name, $job_id){
    	$job = new Job();
    	$return = new _Return();

        if($job->job_match_company($company_name, $job_id) === false){
            return $return->error(404, 40007);
        }

    	$data = $job->detail($job_id);
        if(empty($data)){
            return $return->error(404, 40002);
        }

        return $return->success($data);
    }

    public function Follow($job_id){
        $job = new Job();
        $return = new _Return();

        $user = auth::guard()->user();

        if(empty($job->detail($job_id))){
            return $return->error(404, 40002);
        }

        DB::table('job_follows')->insert([
            'user_id' => $user['id'],
            'job_id' => $job_id
        ]);

        return $return->success('OK');
    }

    public function CancelFollow($job_id){
        $job = new Job();
        $return = new _Return();

        $user = auth::guard()->user();

        if(empty($job->detail($job_id))){
            return $return->error(404, 40002);
        }

        DB::table('job_follows')->where('user_id', $user['id'])->where('job_id', $job_id)-delete();

        return $return->success('OK');
    }

    public function MyFollow(){
        $return = new _Return();

        $user = auth::guard()->user();

        $data = DB::table('job_follows')->where('job_follows.user_id', $user['id'])->
        leftJoin('jobs', 'job_follows.job_id', 'jobs.id')->
        selectRaw('job_follows.id, jobs.id as job_id, position, company_name, place, experience, education, salary, content, requirement, ps, email, phone, date')->orderBy('job_follows.id', 'desc')->paginate(10)->toArray();
 
        return $return->success($data);
    }
}
