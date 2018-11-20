<?php
namespace Eckoo\SDK;
/**
 * Core 
 * @todo 
 * @param array   ENCRYPT 默认目前的三种加密方式
 * @param string  $category  message,email,voice and international_message 必须
 * @param string  $appid  APPID,必须
 * @param string $appkey  APPKEY,必须
 * @param string $send_type 发送方式，如send,xsend等
 * @param string $sign_type 加密方式，用户选择的加密方式
 */

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Eckoo\SDK\Exceptions;

abstract class SubmailCore
{

    protected   $configs=array();
    protected   $http;
    protected   $appid='';
    protected   $appkey='';
    protected   $project='';
    protected   $category='';
    protected   $sign_type='';
    protected   $send_type  ='';
    protected   $timestamp  =   '';
    const ENCRYPT   =   ['normal','md5','sha1'];
    const API_URL   =   'https://api.mysubmail.com/';

    public function __construct($configs)
    {
        if(isset($configs)){
            $this->configs  =   $configs;
        }else{
            try {
                $path= dirname(dirname(__FILE__));
                $this->configs = require($path.'/config/config.php');
            } catch (\SubmailException $th) {
                throw $th->getMessage();
            }
        }
        $url =   isset(trim($this->configs['submail']['base_url']))    ?   trim($this->configs['submail']['base_url']): self::API_URL;
        $this->http =   new Client([
            'base_uri'  =>    $url,
            'timeout'  => 2.0
        ]);
    }


    /**
     * @param $category
     */
    public function set_category($category)
    {
        if($category){
            $this->category =  strtolower($category);
            $this->appid    =   trim($this->configs['submail'][$this->category]['appid']);
            $this->appkey   =   trim($this->configs['submail'][$this->category]['appkey']);
            if(isset($this->configs['submail'][$this->category]['project'])){
                $this->project  =   trim($this->configs['submail'][$this->category]['project']);
            }
            if(isset($this->configs['submail'][$this->category]['sign_type'])){
                $sign   =   trim($this->configs['submail'][$this->category]['sign_type']);
                 $this->sign_type    =  in_array($sign,self::ENCRYPT)?   $sign:'normal';
                 unset($sign);
            }
            unset($this->configs);
        }
    }

    /**
     * @param $data
     * @param string $method
     * @return array|ResponseInterface
     */
    protected function send($data,$method='')
    {
        $path   =   $this->category.'/'.$this->send_type;
        $method =    strtolower($method);
        if($method=='get'){
            $response=$this->http->get($path,[
                'query'=>$data
            ]);
        }else{
            $response=$this->http->post($path,[
                'form_params'=>$data
            ]);
        }
        $response=$this->processResponse($response);
        return $response;
    }

    /**
     * @param $request
     * @return string
     */
    protected   function create_sign($request)
    {
             ksort($request);
             reset($request);
             $str   =   '';
             foreach ($request as $key => $value) {
                if (strpos($key,"attachments")===false){
                    $arg.=$key."=".$val."&";
                }
             }
             $str =  substr($str,0,count($str)-2);
             if(get_magic_quotes_gpc()){
                 $str = stripslashes($str);
             }
             switch ($request['sign_type']) {
                 case 'md5':
                     $r =   md5($this->appid.$this->appkey.$str.$this->appid.$this->appkey);
                     break;
                 case 'sha1':
                     $r =   sha1($this->appid.$this->appkey.$str.$this->appid.$this->appkey);
                     break;
                 default:
                     $r =   $this->appkey;
                     break;
             }
             return $r;
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get_timestamp()
    {
        $res    =   $this->http->request('GET', '/service/timestamp');
        return $this->processResponse($res);
    }

    public function get_status()
    {
         $res    =   $this->http->request('GET', '/service/status');
         return $this->processResponse($res);
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function get_credits(){
        $res['timestamp']   =   $this->get_timestamp();
        $res['timestamp']   =   $res['timestamp']['data']['timestamp'];
        $res['appid']   =   $this->appid;
        $res['sign_type']   =   $this->sign_type;
        $res['signature']   =  $this->create_sign($res);
        return $res;
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    protected function processResponse(ResponseInterface $response){
        $body   =  $response->getBody();
        $contents    =   $body->getContents();
        $contents =    json_decode($contents,true);
        return ['code'=>$response->getStatusCode(),'status'=>$response->getReasonPhrase(),'data'=>$contents];
    }
}
