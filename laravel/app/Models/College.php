<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = ['name', 'major', 'summary'];
    public $timestamps = false;

    public function list(){
    	$data = College::paginate(10)->toArray();

    	return $data;
    }

    public function detail($college_id){
    	$data = College::where('id', $college_id)->get()->toArray();

    	return $data;
    }

    public function courses($college_id){
    	$data = Course::where('college_id', $college_id)->paginate(10)->toArray();

    	return $data;
    }
    
    public function teachers($college_id){
    	$data = Teacher::where('college_id', $college_id)->paginate(10)->toArray();

    	return $data;
    }

}
