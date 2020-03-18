<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VerifyTokenExpire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user('api')){
            // 获取当前用户
            $user = Auth::guard('api')->user();
            if(Carbon::now() > $request->user('api')->token()->expires_at){ // 判断token是否过期
                DB::table('oauth_access_tokens')->where('user_id', $user->id)->delete(); //删除旧token

                // 生成新token
                $token = $user->createToken('token'); 
                $token->token->expires_at = Carbon::now()->addMinutes(60);
                $token->token->save();
                $token = $token->accessToken;

                $data['access_token'] = $token;

                $return = array(
                    'success' => false,
                    'code' => 20002,
                    'data' => $data,
                    'msg' => 'token已过期'
                );

                $return = json_encode($return, JSON_UNESCAPED_UNICODE);
                return response($return, 401);
            }            
        }  

        return $next($request);
    }
}
