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

    // 判断company是否存在
    public function company_exist($company_name){
        if(Company::where('name', $company_name)->exists()){
            return true;
        }else{
            return false;
        }
    }
}
