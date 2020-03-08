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

    	$data = $job->detail($job_id);

        return $return->success($data);
    }

}
