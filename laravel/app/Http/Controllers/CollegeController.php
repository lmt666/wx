<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\_Return;

class CollegeController extends Controller
{
    public function List(){
    	$college = new College();
    	$return = new _Return();

    	$data = $college->list();

    	return $return->success($data);
    }

    public function Detail($college_id){
    	$college = new College();
    	$return = new _Return();

    	$data = $college->detail($college_id);

    	return $return->success($data);
    }

    public function Courses($college_id){
    	$college = new College();
    	$return = new _Return();

    	$data = $college->courses($college_id);

    	return $return->success($data);
    }

    public function Teachers($college_id){
    	$college = new College();
    	$return = new _Return();

    	$data = $college->teachers($college_id);

    	return $return->success($data);
    }
}
