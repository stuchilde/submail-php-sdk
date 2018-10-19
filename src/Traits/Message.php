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
                if($vars) $res['vars'] =   json_encode($method);
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

//    protected function sendxMessage($to,$vars='')
//    {
//        $res['timestamp']   =   $this->get_timestamp();
//        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
//        $res['appid']   =   $this->appid;
//        $res['sign_type']   =   $this->sign_type;
//
//        $res['project']   =   $this->project;
//        $res['to']   =  $to;
//        if($vars) $res['vars'] =   json_encode($vars);
//
//        $res['signature']   =  $this->create_sign($res);
//        return $res;
//    }

//    protected function multisendMessage($data,$content='')
//    {
//        $res['timestamp']   =   $this->get_timestamp();
//        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
//        $res['content'] =   $content;
//        $res['multi']   =   $data;
//        foreach ($data as $k=>$v){
//            $res['multi'][$k][$v['to']] =   $v['to'];
//            unset($v['to']);
//            $res['multi'][$k]['vars'] =   $v;
//        }
//        $res['appid']   =   $this->appid;
//        $res['multi']   =   json_encode($res['multi']);
//        $res['sign_type']   =   $this->sign_type;
//        $res['signature']   =  $this->create_sign($res);
//        return $res;
//    }
//
//    protected function multixsendMessage($data)
//    {
//        $res['timestamp']   =   $this->get_timestamp();
//        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
//        $res['multi']   =   $data;
//        foreach ($data as $k=>$v){
//            $res['multi'][$k][$v['to']] =   $v['to'];
//            unset($v['to']);
//            $res['multi'][$k]['vars'] =   $v;
//        }
//        $res['appid']   =   $this->appid;
//        $res['project']   =   $this->project;
//        $res['multi']   =   json_encode($res['multi']);
//        $res['sign_type']   =   $this->sign_type;
//        $res['signature']   =  $this->create_sign($res);
//        return $res;
//    }
    
    
}