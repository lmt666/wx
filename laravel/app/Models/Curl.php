<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curl extends Model
{
    public function get($url, $header = []){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $backData = curl_exec($ch);

        $backCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);     //获取错误码
        curl_close($ch);

        if($backCode === 200){
            return $backData;
        }else if($backCode === 404){
            // 数据为空
            return [];
        }else{
            return false;
        }
    }

    public function post($url, $header = [], $payload = ''){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $backData = curl_exec($ch);

        $backCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);     //获取错误码
        curl_close($ch);

        if($backCode === 200){
            return $backData;
        }else{
            return false;
        }
    }

    public function getHeaderToken(){

        if(isset($_SERVER['HTTP_AUTHORIZATION'])){
            return $_SERVER['HTTP_AUTHORIZATION'];
        }

        return false;
    }

}
