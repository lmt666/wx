<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curl;
use App\Return;


class Token extends Model
{
    private $gateway_baseURL = 'https://wxapp.hduhelp.com';

    $curl = new Curl();
    $return = new Return();

    public function token($code){

        $url = $this->gateway_baseURL . '/oauth/token?appName=zygh&code=' . $code;

        $request = $curl->get($url);

        if($request !== false){
            $backData = json_decode($request, true);
            $backData = $backData['data'];

            //整理不规范的字段
            $data = array();
            $data['OpenID'] = $backData['openid'];
            $data['AccessToken'] = $backData['accessToken'];
            $data['Expire'] = $backData['expire'];
            $data['UpdateUserInfo'] = $backData['updateUserInfo'];

            $return->success($data, 'OK');

        }else{
            $return->error(500, 50000, 'Sign token error');
        }
    }

    // 查询 Token 信息
    public function info($token){
        $url = $this->gateway_baseURL . '/oauth/token/info?appName=zygh';

        $header = array(
            'Authorization:' . $token
        );

        $request = $curl->get($url, $header);

        if($request !== false){
            $backData = json_decode($request, true);
            $backData = $backData['data'];

            $return->success($backData, 'OK');
            return;
        }else{
            $return->error(401, 40100, 'Unauthorized');
        }
    }

    // 获取用户信息
    public function getUserInfo($token){
        $url = $this->gateway_baseURL . '/user/info?appName=zygh';

        $header = array(
            'Authorization:' . $token
        );

        $request = $curl->get($url, $header);

        if($request !== false){
            // 判断数据是否为空
            if($request === []){
                $return->error(404, 40400, 'not found');
                return;
            }else{
                // 正常 返回用户信息
                $backData = json_decode($request, true);
                $backData = $backData['data'];

                $return->success($backData, 'OK');
            }
        }else{
            $return->error(401, 40100, 'Unauthorized');
        }
    }

    // 更新用户信息
    public function updateUserInfo($token, $userInfo){
        $url = $this->gateway_baseURL . '/user/info';

        $header = array(
            'Authorization:' . $token
        );

        $request = $curl->post($url, $header, $userInfo);

        if($request !== false){
            $return->success('OK', 'OK');
        }else{
            $return->error(401, 40100, 'Unauthorized');
        }
    }

    // ===== 内部 =====

    // Token 是否有效
    public function _info($token){
        $url = $this->gateway_baseURL . '/oauth/token/info?appName=zygh';

        $header = array(
            'Authorization:' . $token
        );

        $request = $curl->get($url, $header);

        if($request !== false){
            $backData = json_decode($request, true);
            $backData = $backData['data'];

            return $backData;
        }else{
            return false;
        }
    }

    // Token 所指向的用户信息
    public function _getUserInfo($token){
        $url = $this->gateway_baseURL . '/user/info?appName=zygh';

        $header = array(
            'Authorization:' . $token
        );

        $request = $curl->get($url, $header);

        if($request !== false){
            // 判断数据是否为空
            if($request === []){
                return false;
            }else{
                // 正常 返回用户信息
                $backData = json_decode($request, true);
                $backData = $backData['data'];

                return $backData;
            }
        }else{
            // 此为 Token 无效，一般不会跳到这一步来
            return false;
        }
    }

    // 根据 Token 获取 OpenID
    public function _getOpenID($token){
        $userInfo = $this->_getUserInfo($token);
        if($userInfo !== false && !empty($userInfo)){
            return $userInfo['OpenID'];
        }

        return false;
    }
}
