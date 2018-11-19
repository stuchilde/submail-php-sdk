<?php

/**
 *  intsms sdk demo
 *  @version 1.0.0
 *  @todo use for email sdk.
 *  @author Eckoo <howcyan@gmail.com>
 */

require('../vendor/autoload.php');
use Eckoo\SDK\Submail;
/**
*   如果调用xsend 接口project为必须
*   sign_type为非必须    
*/
$configs = [
    'submail'   =>  [
        'base_url'   =>  'https://api.mysubmail.com/',

        'message'   =>  [
            'appid'    =>  '******',
            'appkey'    =>  '******',
            'project'    =>  '******',
            'sign_type'    =>  '******'
        ],

        'email' =>  [
            'appid'   =>  '******',
            'appkey'   =>  '******',
            'project'   =>  '******',
            'sign_type'    =>  '******',
        ],
        'voice' =>  [
            'appid'   =>  '******',
            'appkey'   =>  '******',
            'project'   =>  '******',
            'sign_type'    =>  '******',
        ],
        'international_message'  =>  [
            'appid'    =>  '******',
            'appkey'    =>  '******',
            'project'    =>  '******',
            'sign_type'    =>  '******',
        ]
    ]
];

/*  -----------------------------------------------------------------------------
 *  @function  set_category
 *  注意 这一步选择需要使用的套餐类型，
 *  可供选择的参数 如[message,voice,international_message,email]
 * */

$obj = new Submail($configs);
$obj->set_category('internationalsms');

//$to =    '001-626-203-3379';
//$content    =   "【SUBMAIL】您的短信验证码：4438，请在10分钟内输入。";
//$res    =   $obj->internationalSmsSend($to,$content);


//$to =    '130********';
//$vars   =   array('code'=>rand(100,999));
//$res    =   $obj->internationalSmsXsend($to,$vars);

//$data=[
//    ['to'=>'130********','name'=>'master','code'=>rand(100,999)],
//    ['to'=>'130********','name'=>'slave','code'=>rand(100,999)]
//];
//
//$res    =   $obj->internationalSmsMultixsend($data);
//$res    =   $obj->verifyphonenumber('*********');
$res    =   $obj->internationalsms();


var_dump(json_encode($res));die;
echo '<pre>';




