<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\HttpStatus;

class _Return extends Model
{
	

    public function success($data){ 
        $return = array(
            'success' => true,
            'code' => 200,
            'data' => $data,
            'msg' => 'OK'
        );

        $return = json_encode($return, JSON_UNESCAPED_UNICODE);

        return response($return, 200);
    }

    public function error($statuscode, $code){
        $status = new StatusCode();
        $msg = $status->status($code);
        $return = array(
            'success' => false,
            'code' => $code,
            'data' => 'error',
            'msg' => $msg
        );

        $return = json_encode($return, JSON_UNESCAPED_UNICODE);

        return response($return, $statuscode);
    }
}
