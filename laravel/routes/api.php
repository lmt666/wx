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
Route::middleware(['auth:api', 'verify_token'])->get('company/{company_name}/job/{id}/follow', 'JobFollowController@Follow');
Route::middleware(['auth:api', 'verify_token'])->get('company/{company_name}/job/{id}/cancelfollow', 'JobFollowController@CancelFollow');


// 评论
Route::get('company/{company_name}/job/{job_id}/comment', 'CommentController@List');
Route::get('company/{company_name}/job/{job_id}/comment/{comment_id}/reply', 'CommentReplyController@List');
Route::middleware(['auth:api', 'verify_token'])->post('company/{company_name}/job/{job_id}/comment', 'CommentController@Add');
Route::middleware(['auth:api', 'verify_token'])->post('company/{company_name}/job/{job_id}/comment/{comment_id}/reply', 'CommentReplyController@Add');


// 经验问答
Route::get('article', 'ArticleController@List');
Route::get('article/{id}', 'ArticleController@Detail');
Route::middleware(['auth:api', 'verify_token'])->post('article', 'ArticleController@Add');
Route::middleware(['auth:api', 'verify_token'])->get('article/{id}/follow', 'ArticleFollowController@Follow');
Route::middleware(['auth:api', 'verify_token'])->get('article/{id}/cancelfollow', 'ArticleFollowController@CancelFollow');


// 回答
Route::get('article/{article_id}/answer', 'AnswerController@List');
Route::get('article/{article_id}/answer/{answer_id}/reply', 'AnswerReplyController@List');
Route::middleware(['auth:api', 'verify_token'])->post('article/{article_id}/answer', 'AnswerController@Add');
Route::middleware(['auth:api', 'verify_token'])->post('article/{article_id}/answer/{answer_id}/reply', 'AnswerReplyController@Add');

// 我的
Route::middleware(['auth:api', 'verify_token'])->get('myfollow/job', 'JobFollowController@MyFollow');
Route::middleware(['auth:api', 'verify_token'])->get('myfollow/article', 'ArticleFollowController@MyFollow');