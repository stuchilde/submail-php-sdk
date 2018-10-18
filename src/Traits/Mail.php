<?php
/**
 * Created by PhpStorm.
 * User: submail
 * Date: 2018/10/18
 * Time: 10:44 AM
 */

namespace Eckoo\SDK\Traits;

trait Mail
{
    protected function  sendMail($conf)   
    {
        if($env){
            $this->conf ? $this->conf:$conf;
        }

        return $response;
    }

    protected function sendxMail($conf)
    {
        
    }

    protected function multisendMail($conf)
    {
        # code...
    }

    protected function multixsendMail($conf)
    {
        # code...
    }
    
    
}   