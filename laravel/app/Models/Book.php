<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'pic', 'author', 'press', 'date', 'category_1', 'category_2', 'summary'];
    public $timestamps = false;

    public function list(){
    	$data = Book::paginate(10)->toArray();

    	return $data;
    }

    public function detail($book_id){
    	$data = Book::where('id', $teacher_id)->get()->toArray();

    	return $data;
    }
}
