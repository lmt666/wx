<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['title','body'];
    public $timestamps = false;

    public function index(){
    	$query = Test::get();

    	return $query;
    }

    public function single($id){
    	$query = Test::where('id',$id)->get();

    	return $query;
    }

    public function store($data){
    	$test = new Test([
    		'title' => $data['title'],
    		'body' => $data['body']
    	]);
    	$test->save();
    }

    public function renew($data){
        $test = Test::find($data['id']);
        $test->update($data);
    }

    public function del($id){
        $test = Test::find($id);
        $test->delete();
    }
}
