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
Route::get('company/{company_name}/job/{id}/courses', 'JobController@Courses');
Route::get('company/{company_name}/job/{id}/books', 'JobController@Books');
Route::get('company/{company_name}/job/{id}/competitions', 'JobController@Competitions');
Route::middleware(['auth:api', 'verify_token'])->get('company/{company_name}/job/{id}/follow', 'JobFollowController@Follow');
Route::middleware(['auth:api', 'verify_token'])->delete('company/{company_name}/job/{id}/follow', 'JobFollowController@CancelFollow');

// 评论
Route::get('company/{company_name}/job/{job_id}/comment', 'CommentController@List');
Route::get('company/{company_name}/job/{job_id}/comment/{comment_id}/reply', 'CommentReplyController@List');
Route::middleware(['auth:api', 'verify_token'])->post('company/{company_name}/job/{job_id}/comment', 'CommentController@Add');
Route::delete('company/{company_name}/job/{job_id}/comment/{comment_id}', 'CommentController@Del');
Route::middleware(['auth:api', 'verify_token'])->post('company/{company_name}/job/{job_id}/comment/{comment_id}/reply', 'CommentReplyController@Add');
Route::delete('company/{company_name}/job/{job_id}/comment/{comment_id}/reply/{reply_id}', 'CommentReplyController@Del');

// 经验问答
Route::get('article', 'ArticleController@List');
Route::get('article/{id}', 'ArticleController@Detail');
Route::middleware(['auth:api', 'verify_token'])->post('article', 'ArticleController@Add');
Route::delete('article/{id}', 'ArticleController@Del');
Route::middleware(['auth:api', 'verify_token'])->get('article/{id}/follow', 'ArticleFollowController@Follow');
Route::middleware(['auth:api', 'verify_token'])->delete('article/{id}/follow', 'ArticleFollowController@CancelFollow');

// 回答
Route::middleware(['auth:api'])->get('article/{article_id}/answer', 'AnswerController@List');
Route::get('article/{article_id}/answer/{answer_id}/reply', 'AnswerReplyController@List');
Route::middleware(['auth:api', 'verify_token'])->post('article/{article_id}/answer', 'AnswerController@Add');
Route::delete('article/{article_id}/answer/{answer_id}', 'AnswerController@Del');
Route::middleware(['auth:api', 'verify_token'])->post('article/{article_id}/answer/{answer_id}/reply', 'AnswerReplyController@Add');
Route::delete('article/{article_id}/answer/{answer_id}/reply/{reply_id}', 'AnswerReplyController@Del');

// 我的
Route::group(['middleware' => 'auth:api'], function(){
	Route::get('myfollow/job', 'JobFollowController@MyFollow');
	Route::get('myfollow/article', 'ArticleFollowController@MyFollow');
	Route::get('myresume', 'ResumeController@MyResume');
	Route::post('myresume', 'ResumeController@Add');
	Route::put('myresume', 'ResumeController@Renew');
	Route::get('myhistory', 'HistoryController@List');
	Route::post('myhistory/{article_id}', 'HistoryController@Add');
	Route::delete('myhistory/{article_id}', 'HistoryController@Del');
	Route::delete('myhistory', 'HistoryController@Del_All');
});

// 其他
Route::get('course', 'CourseController@List');
Route::get('course/{id}', 'CourseController@Detail');
Route::get('teacher', 'TeacherController@List');
Route::get('teacher/{id}', 'TeacherController@Detail');
Route::get('book', 'BookController@List');
Route::get('book/{id}', 'BookController@Detail');
Route::get('competition', 'CompetitionController@List');

