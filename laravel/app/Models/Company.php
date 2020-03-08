<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'summary'];
    public $timestamps = false;

    public function list(){
    	$data = Company::paginate(10)->toArray();

    	return $data;
    }

    public function joblist($company_name){
    	$data = Job::where('company_name', $company_name)->orderBy('id', 'desc')->paginate(10)->toArray();

    	return $data;
    }

}
