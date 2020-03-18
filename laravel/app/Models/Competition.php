<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['name', 'link'];
    public $timestamps = false;

    public function list(){
    	$data = Competition::paginate(10)->toArray();

    	return $data;
    }
}
