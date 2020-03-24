<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    // 按工作类别筛选
    public function category($company_name, $category){
        $data = Job::where('company_name', $company_name)->whereIn('category', $category)->orderBy('id', 'desc')->paginate(10)->toArray();

        return $data;
    }
    // 按工作地点筛选
    public function place($company_name, $place){     
        $i = 0;
        foreach ($place as $place) {
            $query[$i] = DB::table('jobs')->where('company_name', $company_name)->where('place', 'like', '%' . $place . '%');
            $i++;
        }
        
        $data = $query[0];
        for($i = 0; isset(($query[$i+1])); $i++){
            $data = $data->union($query[$i+1]);
        }
        $query = $data->toSql();
        $data = DB::table(DB::raw("($query) as a"))->mergeBindings($data)->orderBy('id','desc')->paginate(10)->toArray(); 
    
        return $data;
    }
    // 按工作类别和工作地点筛选
    public function category_place($company_name, $category, $place){
        $i = 0;
        foreach ($place as $place) {
            $query[$i] = DB::table('jobs')->where('company_name', $company_name)->whereIn('category', $category)->where('place', 'like', '%' . $place . '%');
            $i++;
        }
        
        $data = $query[0];
        for($i = 0; isset(($query[$i+1])); $i++){
            $data = $data->union($query[$i+1]);
        }
        $query = $data->toSql();
        $data = DB::table(DB::raw("($query) as a"))->mergeBindings($data)->orderBy('id','desc')->paginate(10)->toArray(); 
    
        return $data;
    }
}
