<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\_Return;

class CourseController extends Controller
{
    public function List(){
    	$course = new Course();
    	$return = new _Return();

    	$data = $course->list();

    	return $return->success($data);
    }

    public function Detail($course_id){
    	$course = new Course();
    	$return = new _Return();

    	$data = $course->detail($course_id);

    	return $return->success($data);
    }
}
