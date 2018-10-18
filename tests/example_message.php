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
            'appid'    =>  'YOUR MESSAGE_API',
            'appkey'    =>  'YOUR MESSAGE_KEY',
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


$data = [
    'to'=>'13027232773',
    'content'=>'【天琴座】我们生活的多姿源自自然堂的滋润，验证码9527',
];

$obj = new Submail($configs);

$tmp = $obj->set_category('message');
// var_dump($tmp);
echo '<pre>';
var_dump($obj);die;

