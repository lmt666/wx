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
// 注册登陆
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::middleware(['auth:api', 'verify_token'])->get('logout', 'Auth\LoginController@logout');

// 公司
Route::get('company', 'CompanyController@List');
Route::get('company/{name}/job', 'CompanyController@JobList');

// 岗位
Route::get('job', 'JobController@List');
Route::get('company/{company_name}/job/{id}', 'JobController@Detail');
Route::middleware(['auth:api', 'verify_token'])->get('myfollow/job', 'JobController@MyFollow');

// 评论
Route::get('job/{job_id}/comment', 'CommentController@List');
Route::middleware(['auth:api', 'verify_token'])->post('job/{job_id}/comment', 'CommentController@Add');
Route::get('job/{job_id}/comment/{comment_id}/reply', 'CommentReplyController@List');
Route::middleware(['auth:api', 'verify_token'])->post('job/{job_id}/comment/{comment_id}/reply', 'CommentReplyController@Add');


// 经验问答
Route::get('article', 'ArticleController@List');
Route::get('article/{id}', 'ArticleController@Detail');
Route::middleware(['auth:api', 'verify_token'])->post('article', 'ArticleController@Add');
Route::middleware(['auth:api', 'verify_token'])->get('myfollow/article', 'ArticleController@MyFollow');

// 回答
Route::get('article/{article_id}/answer', 'AnswerController@List');
Route::middleware(['auth:api', 'verify_token'])->post('article/{article_id}/answer', 'AnswerController@Add');
Route::get('article/{article_id}/answer/{answer_id}/reply', 'AnswerReplyController@List');
Route::middleware(['auth:api', 'verify_token'])->post('article/{article_id}/answer/{answer_id}/reply', 'AnswerReplyController@Add');