<?php
namespace Eckoo\SDK;
/**
 * Core 
 * @todo 
 */
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Eckoo\SDK\Traits\HttpRequest;
use Eckoo\SDK\Traits\Message;
use Eckoo\SDK\Traits\Mail;

abstract class SubmailCore
{
    use HttpRequest;
    use Message;
    use Mail;

    protected   $category;
    protected   $configs;
    protected   $http;
    protected   $appid;
    protected   $appkey;
    protected   $project;
    protected   $sign_type;

    public function __construct($configs)
    {
        $this->configs  =   $configs;
        $this->http =   new Client([
            'base_url'  =>    $configs['submail']['base_url']
        ]);
    }

    public function set_category($category)
    {
        if($category){
            $this->category =  strtolower($category);
            $this->appid    =   $this->configs['submail'][$this->category]['appid'];
            $this->appkey   =   $this->configs['submail'][$this->category]['appkey'];
            $this->project  =   $this->configs['submail'][$this->category]['project'];
            $this->sign_type    =   $this->configs['submail'][$this->category]['sign_type'];
            unset($this->configs);
        }
    }
    
    public function send($data)
    {

    }

    public function xsend($category='message',$data)
    {

    }

    public function multisend($category='message',$data)
    {

    }

    public function multixsend($category='message',$data)
    {
        
    }

    public function create_sign()
    {
        # code...
    }
}
