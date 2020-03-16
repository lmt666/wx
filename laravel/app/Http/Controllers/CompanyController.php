<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\_Return;

class CompanyController extends Controller
{
    public function List(){
    	$company = new Company();
    	$return = new _Return();

        $data = $company->list();

        return $return->success($data); 	
    }

    public function JobList($company_name, Request $request){
    	$company = new Company();
    	$return = new _Return();

        if($request['category'] && empty($request['place'])){
            $data = $company->category($company_name, $request['category']);
        }else if($request['place'] && empty($request['category'])){
            $data = $company->place($company_name, $request['place']);
        }else if($request['category'] && $request['place']){
            $data = $company->category_place($company_name, $request['category'], $request['place']);
        }else{
            $data = $company->joblist($company_name);
        } 	

        return $return->success($data);
    }
}
