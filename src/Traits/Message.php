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
    protected function  sendMessage($to,$content)
    {
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['content'] =   $content;
        $res['appid']   =   $this->appid;
        $res['sign_type']   =   $this->sign_type;
        $res['to']   =  $to;
        $res['signature']   =  $this->create_sign($res);
        return $res;
    }

    protected function sendxMessage($to,$vars='')
    {
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['appid']   =   $this->appid;
        $res['sign_type']   =   $this->sign_type;
        $res['project']   =   $this->project;
        $res['to']   =  $to;
        if($vars) $res['vars'] =   json_encode($vars);
        $res['signature']   =  $this->create_sign($res);
        return $res;
    }

    protected function multisendMessage($data,$content)
    {
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['content'] =   $content;
        $res['multi']   =   $data;
        foreach ($data as $k=>$v){
            $res['multi'][$k][$v['to']] =   $v['to'];
            unset($v['to']);
            $res['multi'][$k]['vars'] =   $v;
        }
        $res['appid']   =   $this->appid;
        $res['multi']   =   json_encode($res['multi']);
        $res['sign_type']   =   $this->sign_type;
        $res['signature']   =  $this->create_sign($res);
        return $res;
    }

    protected function multixsendMessage($data)
    {
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['multi']   =   $data;
        foreach ($data as $k=>$v){
            $res['multi'][$k][$v['to']] =   $v['to'];
            unset($v['to']);
            $res['multi'][$k]['vars'] =   $v;
        }
        $res['appid']   =   $this->appid;
        $res['project']   =   $this->project;
        $res['multi']   =   json_encode($res['multi']);
        $res['sign_type']   =   $this->sign_type;
        $res['signature']   =  $this->create_sign($res);
        return $res;
    }
    
    
}

| 方法名 | 功能 | 示例| 返回值 |
| :------| ------: | :------: |:------: |
| messageSend | 自定义短信内容 | ``` $to =    '130*******';$content    =   "【SUBMAIL】您的短信验证码：4438，请在10分钟内输入。";$res    =   $obj->messageSend($to,$content); ```
| messagexSend | 使用模版 | 号码,变量
| messageMultisend | 自定义短信内容群发
| messageMultixsend | 使用模版群发