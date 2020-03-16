<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\_Return;


class JobController extends Controller
{
    public function List(Request $request){
    	$job = new Job();
    	$return = new _Return();

        if($request['category'] && empty($request['place'])){
            $data = $job->category($request['category']);
        }else if($request['place'] && empty($request['category'])){
            $data = $job->place($request['place']);
        }else if($request['category'] && $request['place']){
            $data = $job->category_place($request['category'], $request['place']);
        }else{
            $data = $job->list();
        }

        return $return->success($data);
    }

    public function Detail($company_name, $job_id){
    	$job = new Job();
    	$return = new _Return();

    	$data = $job->detail($job_id);

        return $return->success($data);
    }

    public function Courses($company_name, $job_id){
        $job = new Job();
        $return = new _Return();

        $data = $job->courses($job_id);

        return $return->success($data);
    }

    public function Books($company_name, $job_id){
        $job = new Job();
        $return = new _Return();

        $data = $job->books($job_id);

        return $return->success($data);
    }

    public function Competitions($company_name, $job_id){
        $job = new Job();
        $return = new _Return();

        $data = $job->competitions($job_id);

        return $return->success($data);
    }

}
