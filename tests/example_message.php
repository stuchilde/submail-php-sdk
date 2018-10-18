<?php

/**
 *  @version 1.0.0
 *  @todo use for sms sdk.
 *  @author Eckoo <howcyan@gmail.com>
 */

require('../vendor/autoload.php');
use Eckoo\SDK\Submail;

$configs = [
    'submail'   =>  [
        'base_url'   =>  'https://api.mysubmail.com/',

        'message'   =>  [
            'appid'    =>  '27761',
            'appkey'    =>  '597233cb916bf27b645907f21bcd7d46',
            'project'    =>  'YOUR MESSAGE_PROJ',
            'sign_type'    =>  'YOUR MESSAGE_SIGN'
        ],

        'email' =>  [
            'appid'   =>  'YOUR MAIL_API',
            'appkey'   =>  'YOUR MAIL_KEY',
            'project'   =>  'YOUR MAIL_PROJ',
            'sign_type'    =>  'YOUR MAIL_SIGN',
        ],
        'voice' =>  [
            'appid'   =>  'YOUR MAIL_API',
            'appkey'   =>  'YOUR MAIL_KEY',
            'project'   =>  'YOUR MAIL_PROJ',
            'sign_type'    =>  'YOUR MAIL_SIGN',
        ],
        'international_message'  =>  [
            'appid'    =>  'YOUR MESSAGE_API',
            'appkey'    =>  'YOUR MESSAGE_KEY',
            'project'    =>  'YOUR MESSAGE_PROJ',
            'sign_type'    =>  'YOUR MESSAGE_SIGN',
        ]
    ]
];
$obj = new Submail($configs);

$tmp = $obj->set_category('message');
$to='13027232773';
$content    =   "【SUBMAIL】您的短信验证码：4438，请在10分钟内输入。";
$obj->sendSMS($to,$content,$sign_type='md5');
// var_dump($tmp);
echo '<pre>';
var_dump($obj);die;

