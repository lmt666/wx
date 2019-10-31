<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Login extends Model
{
    public function login($data){
        $str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        $token = substr(str_shuffle($str),mt_rand(0,strlen($str)-11),10);

        $user = new User([
            'OpenID' => $data['openID'],
            'Name' => $data['nickName'],
            'Avatar' => $data['avatarUrl'],
            'api_token' => $token
        ]);
        $user->save();

        return $token;
    }
}
