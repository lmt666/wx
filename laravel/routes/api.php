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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::middleware('auth.api')->get('article','ArticleController@Index')->name('article.index');

// 登陆
Route::get('wxxcx/get','UserController@getWxUserInfo')->name('wxxcx.getwxuserinfo');
Route::get('wxxcx/update','UserController@updateWxUserInfo')->name('wxxcx.updatewxuserinfo');

// 文章（经验分享）
Route::middleware('auth.api')->get('article/{id}','ArticleController@Single')->name('article.single');
Route::middleware('auth.api')->post('article/add','ArticleController@Add')->name('article.add');
Route::middleware('auth.api')->post('article/me','ArticleController@Me')->name('article.me');




