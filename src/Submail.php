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

    /**
     * @param $to
     * @param $content
     * @param string $sign_type
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function messageSend($to,$content,$sign_type='')
    {
        $this->send_type    =   'send';
        $to =   (string)trim($to);
        $content    =  (string)trim($content);
        $data   = $this->sendMessage($to,$content);
        return $this->send($data);
    }

    /**
     * @param $to
     * @param $vars
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function messageXsend($to,$vars)
    {
        $this->send_type    =   'xsend';
        $to =   (string)trim($to);
        $data   = $this->sendMessage($to,$vars);
        return $this->send($data);
    }

    /**
     * @param $data
     * @param $content
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function messageMultisend($data,$content)
    {
        $this->send_type    =   'multisend';
        $data   = $this->sendMessage($data,$content);
        return $this->send($data);
    }

    /**
     * @param $data
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function messageMultixsend($data)
    {
        $this->send_type    =   'multixsend';
        $data   = $this->sendMessage($data);
        return $this->send($data);
    }

    /**
     * @return array
     */
    public function getSmsCredits()
    {
        $this->send_type    =   'get_sms_credits';
        $response   =  $this->http->post('balance/sms',[
            'form_params'=>$this->get_credits()
        ]);
        return $this->processResponse($response);
    }

    /**
     * @param string $recipient
     * @param string $project
     * @param string $result_status
     * @param string $start_date
     * @param string $end_date
     * @param string $order_by
     * @param string $rows
     * @param string $offset
     * @return array
     */
    public function getSmsLog($recipient='',$project='',$result_status='',$start_date='',$end_date='',$order_by='',$rows='',$offset='')
    {
        $response   =  $this->http->post('log/message',[
            'form_params'=>$this->get_sms_log($recipient,$project,$result_status,$start_date,$end_date,$order_by,$rows,$offset)
        ]);
        return $this->processResponse($response);
    }

}
