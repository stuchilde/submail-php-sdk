<?php

/**
 *  @version 1.0.0
 *  @todo use for voice sdk.
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
$obj->set_category('voice');


/*  -----------------------------------------------------------------------------
 * multixsend,自定义语音内容
 *  @function voiceSend($to,$content)
 *  @to,content均为string，且to元素非空
 * */
//$res    =   $obj->voiceSend('130********','亲爱的会员，您的快递已到家门口，请注意查收。');


/*  -----------------------------------------------------------------------------
 * multixsend,根据模版语音发送内容
 *  @function voiceXsend($to,$vars)
 *  @vars必须为数组格式，且to元素非空
 * */

//$to =    '130********';
//$vars   =   array('code'=>rand(100,999));
//$res    =   $obj->voiceXsend($to,$vars);

/*  -----------------------------------------------------------------------------
 * voiceMultixsend,群发定制内容
 *  @function voiceMultixsend($data)
 *  @data的to元素非空。
 * */
//$data=[
//    ['to'=>'130********','code'=>rand(100,999)],
//    ['to'=>'131********','code'=>rand(100,999)]
//];
//$res    =   $obj->voiceMultixsend($data);


/*  -----------------------------------------------------------------------------
 * voiceVerify,语音验证码播报
 *  @function voiceVerify($to,$content)
 *  @data的to元素非空。
 * */
//$res  =   $obj->voiceVerify('130*******','****int');


/*  -----------------------------------------------------------------------------
 * getVoiceCredits,获取语音流量余额
 *  @function getVoiceCredits()
 * */
//$res    =   $obj->getVoiceCredits();
echo '<pre>';
var_dump(json_encode($res));die;
