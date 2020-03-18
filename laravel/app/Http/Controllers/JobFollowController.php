<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobFollow;
use App\Models\_Return;

class JobFollowController extends Controller
{
    public function Follow($company_name, $job_id){
    	$job_follow = new JobFollow();
        $return = new _Return();

        $user = Auth::guard('api')->user();

        $data = $job_follow->follow($job_id, $user['id']);

        return $return->success($data);
    }

    public function CancelFollow($company_name, $job_id){
        $job_follow = new JobFollow();
        $return = new _Return();

        $user = Auth::guard('api')->user();

        $data = $job_follow->cancelfollow($job_id, $user['id']);

        return $return->success($data);
    }

    public function MyFollow(){
        $job_follow = new JobFollow();
        $return = new _Return();

        $user = Auth::guard('api')->user();

        $data = $job_follow->myfollow($user['id']);
 
        return $return->success($data);
    }
}
