<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});



//**********************************************************************
//****************************** v2.0 **********************************
//**********************************************************************
// 登陆
Route::get('wxxcx/get','UserController@getWxUserInfo');
Route::get('wxxcx/login','UserController@login');
Route::get('wxxcx/failure','UserController@failure')->name('login');

// 公司
Route::get('company','CompanyController@List');
Route::get('company/{name}/job','CompanyController@JobList');

// 岗位
Route::get('job','JobController@List');
Route::get('job/{id}','JobController@Detail');

// 评论
Route::get('job/{job_id}/comment','CommentController@List');
Route::post('job/{job_id}/comment','CommentController@Add');
Route::get('job/{job_id}/comment/{comment_id}/reply','CommentReplyController@List');
Route::post('job/{job_id}/comment/{comment_id}/reply','CommentReplyController@Add');


// 经验问答
Route::get('article','ArticleController@List');
Route::get('article/{id}','ArticleController@Detail');
Route::post('article','ArticleController@Add');

// 回答
Route::get('article/{article_id}/answer','AnswerController@List');
Route::post('article/{article_id}/answer','AnswerController@Add');
Route::get('article/{article_id}/answer/{answer_id}/reply','AnswerReplyController@List');
Route::post('article/{article_id}/answer/{answer_id}/reply','AnswerReplyController@Add');