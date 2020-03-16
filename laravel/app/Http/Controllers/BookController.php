<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\_Return;

class BookController extends Controller
{
    public function List(){
    	$book = new Book();
    	$return = new _Return();

    	$data = $book->list();

    	return $return->success($data);
    }

    public function Detail($book_id){
    	$book = new Book();
    	$return = new _Return();

    	$data = $book->detail($book_id);

    	return $return->success($data);
    }
}
