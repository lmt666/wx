<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\_Return;

class CompetitionController extends Controller
{
    public function List(){
    	$competition = new Competition();
    	$return = new _Return();

    	$data = $competition->list();

    	return $return->success($data);
    }
}
