<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name', 'college_id', 'position', 'summary'];
    public $timestamps = false;

    public function list(){
    	$data = Teacher::leftJoin('colleges', 'teachers.college_id', 'colleges.id')->selectRaw('teachers.id, teachers.name, teachers.pic,  teachers.college_id, colleges.name as college_name, teachers.position, teachers.summary')->paginate(10)->toArray();

    	return $data;
    }

    public function detail($teacher_id){
    	$data = Teacher::where('teachers.id', $teacher_id)->leftJoin('colleges', 'teachers.college_id', 'colleges.id')->selectRaw('teachers.id, teachers.name, teachers.pic, teachers.college_id, colleges.name as college_name, teachers.position, teachers.summary')->get()->toArray();

    	return $data;
    }
}
