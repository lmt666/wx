<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    public function add($openID, $data){
    	$daily = new Daily([
    		'Name' => $data['name'],
            'PublishDate' => date('Y-m-d'),
            'OpenID' => '', //$openID,
            'Urgency' => $data['urgency'],
            'isFinish' => 0
    	]);
    	$daily->save();

    	return 'OK';
    }

    //获取今日计划
    public function list_today($openID){
        $daily = new Daily();

        $today = substr(date('Y-m-d', time()));
        $data = $daily->where('OpenID', $openID)->where('isFinished', 0)->where('PublishDate', $today)->get();
        $data->toArray();

        return $data;
    }

    //获取历史计划(分页)
    public function list_history($openID, $page){
        $daily = new Daily();

        $today = substr(date('Y-m-d', time()));
        $per = 7; // 每页的数据
        $beginIndex = ($page - 1) * 7;
        $data = $daily->where('OpenID', $openID)->whereNotIn('PublishDate', $today)->orWhere('isFinished', 1)->orderBy('ID', 'desc')->get();
        $data->toArray();

        return $data;
    }

    //标记计划已完成
    public function finish($openID, $id){
        $daily = new Daily();

        $data = $daily->where('OpenID', $openID)->where('ID', $id)->get();
        $data->toArray();
        if(empty($data)){
            return false;
        }else{
            $daily->where('ID', $id)->update('isFinished', 1);
        }

        return true;
    }
}
