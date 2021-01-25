<?php
/**
 * Created by PhpStorm.
 * User: submail
 * Date: 2018/10/18
 * Time: 10:44 AM
 */

namespace Eckoo\SDK\Traits;

trait Message
{
    /**
     * @param $params
     * @param string $method
     * @return mixed
     */
    protected function  sendMessage($params,$method='')
    {
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['appid']   =   $this->appid;
        $res['sign_type']   =   $this->sign_type;

        switch ($this->send_type){
            case 'send':
                $res['content'] =   $method;
                $res['to']   =  $params;
                break;
            case 'xsend':
                $res['project']   =   $this->project;
                $res['to']   =  $params;
                if($method) $res['vars'] =   json_encode($method);
                break;
            case 'multisend':
                $res['content'] =   $params;
                $res['multi']   =   $method;
                foreach ($method as $k=>$v){
                    $res['multi'][$k][$v['to']] =   $v['to'];
                    unset($v['to']);
                    $res['multi'][$k]['vars'] =   $v;
                }
                $res['multi']   =   json_encode($res['multi']);
                break;
            case 'multixsend':
                $res['multi']   =   $method;
                foreach ($method as $k=>$v){
                    $res['multi'][$k][$v['to']] =   $v['to'];
                    unset($v['to']);
                    $res['multi'][$k]['vars'] =   $v;
                }
                $res['multi']   =   json_encode($res['multi']);
                $res['project']   =   $this->project;
                break;
        }

        $res['signature']   =  $this->create_sign($res);
        return $res;
    }

    /**
     * @param $recipient
     * @param $project
     * @param $result_status
     * @param $start_date
     * @param $end_date
     * @param $order_by
     * @param $rows
     * @param $offset
     * @return array
     */
    public function get_sms_log($recipient,$project,$result_status,$start_date,$end_date,$order_by,$rows,$offset)
    {
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['appid']   =   $this->appid;
        $res['sign_type']   =   $this->sign_type;

        if($recipient){
            $res['recipient']   =   $recipient;
        }
        if($project){
            $res['project']   =   $project;
        }
        if($result_status){
            $res['result_status']   =   $result_status;
        }
        if($start_date){
            $res['start_date']   =   $start_date;
        }
        if($end_date){
            $res['end_date']   =   $end_date;
        }
        if($order_by) {
            $res['order_by'] = $order_by;
        }
        if($rows){
            $res['rows'] = $rows;
        }
        if($offset){
            $res['offset'] = $offset;
        }
        $res['signature']   =  $this->create_sign($res);
        return $res;
    }
    
    
}