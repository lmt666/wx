<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\_Return;

class TeacherController extends Controller
{
    public function List(){
    	$teacher = new Teacher();
    	$return = new _Return();

    	$data = $teacher->list();

    	return $return->success($data);
    }

    public function Detail($course_id){
    	$teacher = new Teacher();
    	$return = new _Return();

    	$data = $teacher->detail($course_id);

    	return $return->success($data);
    }
}
