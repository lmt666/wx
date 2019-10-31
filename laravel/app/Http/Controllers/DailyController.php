<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daily;
use App\_Return;

class DailyController extends Controller
{
    public function Add(Request $request){
    	$daily = new Daily();
    	$return = new _Return();

    	if($request == NULL){
    		return $return->error(500, 50000, 'Payload error');
    	}

    	if(empty($request['name']) || empty($request['urgency']) || empty($request['openID'])){
            return $return->error(500, 50001, '有字段为空');
        }

        $data = $daily->add($openID, $request->only('name', 'urgency'));

        return $return->success($data, 'OK');
    }

    //获取今天的列表
    public function Today(){
    	$daily = new Daily();
    	$return = new _Return();

    	$data = $daily->list_today($openID);

    	return $return->success($data, 'OK');
    }

    //获取历史的列表
    public function History(){
    	$daily = new Daily();
    	$return = new _Return();

    	$page = $_GET['page'] ?? 1;
        if(!is_numeric($page)){
            $page = 1;
        }

        $data = $daily->list_history($openID, $page);

        return $return->success($data, 'OK');
    }

    //完成任务
    public function Finish(Request $request){
    	$daily = new Daily();
    	$return = new _Return();

    	$id = $request['ID'];

        if($request == NULL){
            return $return->error(500, 50000, 'Payload error');
        }

        if(!empty($request['ID'])){
            if($daily->finish($openID, $id)){
                return $return->success('OK', 'OK');
            }else{
                return $return->error(403, 40300, '无权操作');
            }
        }else{
            return $return->error(500, 50000, 'Payload error');
        }
    }
}
