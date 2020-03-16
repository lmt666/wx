<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id', 'name', 'major', 'college_id', 'semester', 'credit', 'summary'];
    public $timestamps = false;

    public function list(){
    	$data = Course::get()->toArray();

    	return $data;
    }

    public function detail($course_id){
    	$data = Course::where('id', $course_id)->get()->toArray();

    	return $data;
    }
}
