<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name', 'college_id', 'position', 'summary'];
    public $timestamps = false;

    public function list(){
    	$data = Teacher::get()->toArray();

    	return $data;
    }

    public function detail($teacher_id){
    	$data = Teacher::where('id', $teacher_id)->get()->toArray();

    	return $data;
    }
}
