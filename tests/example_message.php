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
            'project'    =>  'DrP9S3',
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
$obj->set_category('message');

/*  -----------------------------------------------------------------------------
 * send,自定义发送短信内容
 *  @function messageSend($to,$content)
 **/
//$to =    '13027232773';
//$content    =   "【SUBMAIL】您的短信验证码：4438，请在10分钟内输入。";
//$res    =   $obj->messageSend($to,$content);


/*  -----------------------------------------------------------------------------
 *  xsend,短信定制模版只需要传入变量文本即可发送短信
 *  $vars   =   array('code'=>rand(100,999))，code为模版预设数组的key
 *  如模版【Submail】验证码@var(code),当天使用有效。
 *  @function messagexSend($to,$vars)
 * */
//$to =    '13027232773';
//$vars   =   array('code'=>rand(100,999));
//$res    =   $obj->messagexSend($to,$vars);


/*  -----------------------------------------------------------------------------
 *  multisend,自定义群发内容无模版
 *  @function messageMultisend($data,$content)
 *  @data必须为数组格式，且to元素非空
 *  @content必须为字符串，
 * */
$content    =   '【夏学进】您好，@var(name)，您的取货码为 @var(code)';
$data=[
    ['to'=>'13027232773','name'=>'master','code'=>rand(100,999)],
    ['to'=>'13175217275','name'=>'slave','code'=>rand(100,999)]
];

$res    =   $obj->messageMultisend($content,$data);



/*  -----------------------------------------------------------------------------
 * multixsend,根据模版群发
 *  @function messageMultisend($data)
 *  @data必须为数组格式，且to元素非空
 * */
//$data=[
//    ['to'=>'13027232773 ','name'=>'master','code'=>rand(100,999)],
//    ['to'=>'187********','name'=>'John','code'=>rand(100,999)]
//];
//
//$res    =   $obj->messageMultixsend($data);

var_dump(json_encode($res));die;
//echo '<pre>';

