<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\HttpStatus;


class _Return extends Model
{
	

    public function success($data, $msg){ 
        header('Content-type: application/json; charset=UTF-8');
        //data 这里传入数组即可
        $return = array(
            'error' => 0,
            'data' => $data,
            'msg' => $msg
        );

        $return = json_encode($return,JSON_UNESCAPED_UNICODE);

        header('HTTP/1.1 200 OK');
        echo($return);
    }

    public function error($statusCode, $code, $msg){
        $httpstatus = new HttpStatus();
        $httpstatus->http_status_safe($statusCode);

        $return = array(
            'error' => $code,
            'msg' => $msg
        );

         $return = json_encode($return,JSON_UNESCAPED_UNICODE);

        echo($return);
    }
}
