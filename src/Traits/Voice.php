<?php
/**
 * Created by PhpStorm.
 * User: submail
 * Date: 2018/10/22
 * Time: 9:51 AM
 */

namespace Submail\SDK\Traits;


trait Voice
{
    /**
     * @param $params
     * @param string $method
     * @return array
     */
    protected  function sendVoice($params,$method='')
    {
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['appid']   =   $this->appid;
        $res['sign_type']   =   $this->sign_type;

        switch ($this->send_type) {
            case 'send':
                $res['content'] = $method;
                $res['to'] = $params;
                break;
            case 'xsend':

                $res['project']   =   $this->project;
                $res['to']   =  $params;
                if($method) $res['vars'] =   json_encode($method);
                break;
            case 'multixsend':
                $res['multi']   =   $params;
                foreach ($params as $k=>$v){
                    $res['multi'][$k][$v['to']] =   $v['to'];
                    unset($v['to']);
                    $res['multi'][$k]['vars'] =   $v;
                }
                $res['multi']   =   json_encode($res['multi']);
                $res['project']   =   $this->project;

        }
        $res['signature']   =  $this->create_sign($res);
        return $res;
    }
}