<?php
namespace Eckoo\SDK;
/**
 * Core 
 * @todo 
 * @param array   ENCRYPT 默认目前的三种加密方式
 * @param string  $category  message,email,voice and insmsg 必须
 * @param string  $appid  APPID,必须
 * @param string $appkey  APPKEY,必须
 * @param string $send_type 发送方式，如send,xsend等
 * @param string $sign_type 加密方式，用户选择的加密方式
 * @param array $response  响应结果对象
 */

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class SubmailCore
{

    protected   $category='';
    protected   $configs=array();
    protected   $http;
    protected   $appid='';
    protected   $appkey='';
    protected   $project='';
    protected   $sign_type='';
    protected   $send_type  ='';
    protected   $timestamp  =   '';
    protected   $response   =   null;
    const ENCRYPT   =   array('normal','md5','sha1');   

    public function __construct($configs)
    {
        $this->configs  =   $configs;
        $this->http =   new Client([
            'base_uri'  =>    trim($configs['submail']['base_url']),
            'timeout'  => 2.0
        ]);

        $this->response =   new \stdClass();
        $this->response->reasonPhrase='Error';
        $this->response->statusCode='404';
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
        $path   =   $this->category.'/'.$this->send_type;
        $method=strtolower($method);
        if($method=='get'){
            $response=$this->client->get($path,[
                'query'=>$params
            ]);
        }else{
            $response=$this->client->post($path,[
                'form_params'=>$params
            ]);
        }

        $response=$this->processResponse($response);
        return $response;
    }

    protected   function create_sign() 
    { 
        return 1;
        // $configs=$this->configs[$category];
        // $r='';
        // if($request['sign_type']!=='normal'){
        //     ksort($request);
        //     reset($request);
        //     foreach ($request as $key => $value) {
        //         $str .=$key."=".$value."&";
        //     }
        //     $str =  substr($str,0,count($str)-2);

        //     if(get_magic_quotes_gpc()){
        //         $str = stripslashes($str);
        //     }

        //     switch ($request['sign_type']) {
        //         case 'md5':
        //             $r=md5($configs['appid'].$configs['appkey'].$str.$configs['appid'].$configs['appkey']);
        //             break;
        //         case 'sha1':
        //             $r=sha1($configs['appid'].$configs['appkey'].$str.$configs['appid'].$configs['appkey']);
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }
        //     return $r;
        // }else{
        //     return $configs['appkey'];
        // }

    }

    public function get_timestamp()
    {
        // echo 1;die;
        // $res    =   $this->http->request('GET', '/service/timestamp');

        // var_dump($res);die;
        // $res = json_decode($res->getBody()->getContents(),true);
        // echo $res;die;
        // if($res->getStatusCode()    =='200'){
        //     $body   = json_decode($res->getBody(),true); 
        // }else{
        //     return ['status'=>$res->getStatusCode(),'data'=>$res->getContents()];
        // }
        // return ($res->getStatusCode()=='200') ? $res->getBody():'';
    }

    public function get_status()
    {

         $res    =   $this->http->request('GET', '/service/status');
         $res=$this->processResponse($res);
         return $res;
    }

    protected function processResponse(ResponseInterface $response){
        $body=$response->getBody();
        //$size=$body->getSize();
        $cnt=$body->getContents();
        $cntArr=json_decode($cnt,true);
        $statusCode=$response->getStatusCode();
        return ['status'=>$statusCode,'data'=>$cntArr];
    }
}
