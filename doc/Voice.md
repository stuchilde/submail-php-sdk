#### 发送语音

###### GATEAWAY_URL
> [https://api.mysubmail.com/](https://api.mysubmail.com/)


***注意:***
凡是涉及xsend方法，需要保持项目ID(project)在配置有效。

###### voiceSend(自定义语音)
``` php
<?php 
$obj->set_category('voice');
$to =    '130*******';
$content    =   "【SUBMAIL】您的语音验证码：4438，请在10分钟内输入。";
$res    =   $obj->voiceSend($to,$content);
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | to | ture | string | 接收方号码                            |
> | content | true | string    | 必须包含【公司名】签名的文本内容|


###### voiceXsend(定制语音模版发送)
``` php
<?php 
$obj->set_category('voice');
$to =    '130********';
$vars   =   array('code'=>rand(100,999));
$res    =   $obj->voiceXsend($to,$vars);
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | to | ture | string | 接收方信息号码|
> | vars | true | array    | 必须包含【公司名】签名的文本内容和@var(key)|


###### voiceMultixsend(定制短信群发)
``` php
<?php 
$obj->set_category('voice');
$data=[
    ['to'=>'130********','code'=>rand(100,999)],
    ['to'=>'131********','code'=>rand(100,999)]
];

$res    =   $obj->voiceMultixsend($data);
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | data | ture | array | 接收方信息,必须包含@var(key)并保持官网模版对应 |  

###### getVoiceCredits(获取剩余条数)
``` php
<?php 
$obj->set_category('voice');
$res    =   $obj->getVoiceCredits();
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | 无 | false | array | 无 | 

###### voiceVerify(语音播报验证码)
``` php
<?php 
$obj->set_category('voice');
$res  =   $obj->voiceVerify('130*******','****int');
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | to | ture | string | 接收方号码                            |
> | content | true | string    | 4-8位数数字|