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
        if(empty($data['data'])){
            return $return->error(404, 50001);
        }else{
            return $return->success($data);
        }
    	
    }

    public function JobList($company_name){
    	$company = new Company();
    	$return = new _Return();

    	$data = $company->joblist($company_name);
        if(empty($data['data'])){
            return $return->error(404, 50001);
        }else{
            return $return->success($data);
        }
    	
    }
}
