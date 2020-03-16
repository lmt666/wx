<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
	protected $fillable = ['user_id', 'name', 'birth', 'sex', 'major', 'university', 'self-description', 'experience'];
    public $timestamps = false;

    public function add($user_id, $data){
    	Resume::create([
    		'user_id' => $user_id,
    		'name' => $data['name'],
    		'birth' => $data['birth'],
    		'sex' => $data['sex'],
    		'major' => $data['major'],
    		'university' => $data['university'],
    		'self-description' => $data['self-description'],
    		'experience' => $data['experience']
    	]);

    	return '新建成功!';
    }

    public function renew($user_id, $data){
    	Resume::where('user_id', $user_id)->update([
    		'name' => $data['name'],
    		'birth' => $data['birth'],
    		'sex' => $data['sex'],
    		'major' => $data['major'],
    		'university' => $data['university'],
    		'self-description' => $data['self-description'],
    		'experience' => $data['experience']
    	]);

    	return '更新成功!';
    }

    public function myresume($user_id){
    	$data = Resume::where('user_id', $user_id)->get()->toArray();

    	return $data;
    }
}
