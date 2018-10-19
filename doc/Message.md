#### 发送短信

###### GATEAWAY_URL
> [https://api.mysubmail.com/](https://api.mysubmail.com/)
###### messageSend
``` php
<?php 
$obj->set_category('message');
$to =    '130*******';
$content    =   "【SUBMAIL】您的短信验证码：4438，请在10分钟内输入。";
$res    =   $obj->messageSend($to,$content);
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | to | ture | string | 接收方号码                            |
> | content | true | string    | 必须包含【公司名】签名的文本内容|
###### message **xSend**
``` php
<?php 
$obj->set_category('message');
$to =    '130*******';
$vars   =   array('code'=>rand(100,999));
$res    =   $obj->messagexSend($to,$vars);
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | to | ture | string | 接收方号码                            |
> | vars | true | array    | 必须包含【公司名】签名的文本内容|


###### messageMultisend
``` php
<?php 
$obj->set_category('message');
$content    =   '【SUBMAIL】您好，@var(name)，您的取货码为 @var(code)';
$data=[
    ['to'=>'130********','name'=>'master','code'=>rand(100,999)],
    ['to'=>'187********','name'=>'李四','code'=>rand(100,999)]];
$res    =   $obj->messageMultisend($data,$content);
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | data | ture | array | 接收方信息,必须包含@var(key)并必须与content对应|
> | content | true | string    | 必须包含【公司名】签名的文本内容和@var(key)|

###### messageMulti **xsend**
``` php
<?php 
$obj->set_category('message');
$data=[
    ['to'=>'130********','name'=>'张三','code'=>rand(100,999)],
    ['to'=>'187********','name'=>'李四','code'=>rand(100,999)]
];

$res    =   $obj->messageMultixsend($data);
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | data | ture | array | 接收方信息,必须包含@var(key)并保持官网模版对应 |  

**注意**：凡是涉及xsend方法，需要保持项目ID(project)在配置有效。