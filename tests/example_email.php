<?php

/**
 *  intsms sdk demo
 *  @version 1.0.0
 *  @todo use for email sdk.
 *  @author Submail <stuchilde@outlook.com>
 */

require('../vendor/autoload.php');
use Submail\SDK\Submail;
/**
*   如果调用xsend 接口project为必须
*   sign_type为非必须    
*/
$configs = [
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
];

/*  -----------------------------------------------------------------------------
 *  @function  set_category
 *  注意 这一步选择需要使用的套餐类型，
 *  可供选择的参数 如[message,voice,international_message,email]
 * */

$obj = new Submail($configs['email']);
$obj->set_category('email');




