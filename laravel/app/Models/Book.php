<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pic', 'author', 'translator', 'press'];
    public $timestamps = false;

    public function list(){
    	$data = Book::get()->toArray();

    	return $data;
    }

    public function detail($book_id){
    	$data = Book::where('id', $teacher_id)->get()->toArray();

    	return $data;
    }
}
