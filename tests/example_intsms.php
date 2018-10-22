<?php

/**
 *  intsms sdk demo
 *  @version 1.0.0
 *  @todo use for email sdk.
 *  @author Eckoo <howcyan@gmail.com>
 */

require('../vendor/autoload.php');
use Eckoo\SDK\Submail;

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
$obj->set_category('international_message');



