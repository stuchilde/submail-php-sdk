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
    protected function  sendMessage()
    {
        $this->get_status();
    }

    protected function sendxMessage($conf)
    {
        
    }

    protected function multisendMessage($conf)
    {
        # code...
    }

    protected function multixsendMessage($conf)
    {
        # code...
    }
    
    
}   