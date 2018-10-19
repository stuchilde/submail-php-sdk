<?php
/**
 * Created by PhpStorm.
 * User: submail
 * Date: 2018/10/18
 * Time: 11:06 AM
 */

namespace Eckoo\SDK;
use Eckoo\SDK\Traits\HttpRequest;
use Eckoo\SDK\Traits\Message;
use Eckoo\SDK\Traits\Mail;

class Submail   extends SubmailCore
{
    use HttpRequest;
    use Message;
    use Mail;
    public function messageSend($to,$content,$sign_type='')
    {
        $this->send_type    =   'send';
        $to =   (string)trim($to);
        $content    =  (string)trim($content);
        $data   = $this->sendMessage($to,$content);
        return $this->send($data);
    }

    public function messageXsend($to,$vars='')
    {
        $this->send_type    =   'xsend';
        $to =   (string)trim($to);
        $data   = $this->sendxMessage($to,$vars);
        return $this->send($data);
    }

    public function messageMultisend($data,$content)
    {
        $this->send_type    =   'multisend';
        $content    =   trim($content);
        $data   = $this->multisendMessage($data,$content);
        return $this->send($data);
    }

    public function messageMultixsend($data)
    {
        $this->send_type    =   'multixsend';
        $data   = $this->multixsendMessage($data);
        return $this->send($data);
    }

    
}
