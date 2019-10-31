<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Iwanli\Wxxcx\Wxxcx;

use App\User;
use App\_Return;

class UserController extends Controller
{
    protected $wxxcx;

    function __construct(Wxxcx $wxxcx)
    {
        $this->wxxcx = $wxxcx;
    }

    /**
     * 小程序登录获取用户信息
     * @author
     * @return            
     */
    public function getWxUserInfo()
    {
        $user = new User();
        $return = new _Return();
        //code 在小程序端使用 wx.login 获取
        $code = request('code', '');
        //encryptedData 和 iv 在小程序端使用 wx.getUserInfo 获取
        $encryptedData = request('encryptedData', '');
        $iv = request('iv', '');

        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);

        //获取解密后的用户信息
        $data = $this->wxxcx->getUserInfo($encryptedData, $iv);
        $data = json_decode($data, true);

        //获取token
        $token = $user->add($data);
        
        return $return->success($token, 'OK');
    }

    public function updateWxUserInfo(){
        $user = new User();
        $return = new _Return();
        //code 在小程序端使用 wx.login 获取
        $code = request('code', '');
        //encryptedData 和 iv 在小程序端使用 wx.getUserInfo 获取
        $encryptedData = request('encryptedData', '');
        $iv = request('iv', '');

        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);

        //获取解密后的用户信息
        $data = $this->wxxcx->getUserInfo($encryptedData, $iv);
        $data = json_decode($data, true);

        //获取token
        $token = $user->renew($data['openId']);
        
        return $return->success($token, 'OK');
    }
}
