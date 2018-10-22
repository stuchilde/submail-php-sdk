<?php
/**
 * Created by PhpStorm.
 * User: submail
 * Date: 2018/10/22
 * Time: 2:27 PM
 */

namespace Eckoo\SDK\Traits;


trait InternationalSms
{
    protected function  sendInternationalSms($params,$method='')
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
}