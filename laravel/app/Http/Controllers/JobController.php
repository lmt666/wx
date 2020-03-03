<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\_Return;


class JobController extends Controller
{
    public function List(){
    	$job = new Job();
    	$return = new _Return();

    	$data = $job->list();
        if(empty($data['data'])){
            return $return->error(404, 50001);
        }else{
            return $return->success($data);
        }
    	
    }

    public function Detail($job_id){
    	$job = new Job();
    	$return = new _Return();

    	$data = $job->detail($job_id);
        if(empty($data)){
            return $return->error(404, 50001);
        }else{
            return $return->success($data);
        }
    	
    }
}
