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
    public function sendSMS($to='',$content='')
    {
        $this->send_type='send';
        $this->sendMessage();
    }

    public function sendxSMS()
    {
        $this->send_type='xsend';
        $this->send($data);
    }
    public function multisendSMS()
    {
        $this->send_type='multisend';
        $this->send($data);
    }

    public function multisendxSMS()
    {
        $this->send_type='multixsend';
        $this->send(4,$data);     
    }
}
