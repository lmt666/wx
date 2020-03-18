<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id', 'name', 'major', 'college_id', 'semester', 'credit', 'summary'];
    public $timestamps = false;

    public function list(){
    	$data = Course::leftJoin('colleges', 'courses.college_id', 'colleges.id')->selectRaw('courses.id, courses.name, courses.major, courses.college_id, colleges.name as college_name, semester, credit, courses.summary')->paginate(10)->toArray();

    	return $data;
    }

    public function detail($course_id){
    	$data = Course::where('courses.id', $course_id)->leftJoin('colleges', 'courses.college_id', 'colleges.id')->selectRaw('courses.id, courses.name, courses.major, courses.college_id, colleges.name as college_name, semester, credit, courses.summary')->get()->toArray();

    	return $data;
    }
}
