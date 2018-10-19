#### 发送短信

###### GATEAWAY_URL
> [https://api.mysubmail.com/](https://api.mysubmail.com/)


***注意:***
凡是涉及xsend方法，需要保持项目ID(project)在配置有效。
###### messageSend(自定义短信)
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
###### messagexSend(定制短信)
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


###### messageMultisend(自定义群发)
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


###### messageMultixsend(定制短信群发)
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

###### getSmsCredits(获取剩余条数)
``` php
<?php 
$obj->set_category('message');
$res    =   $obj->getSmsCredits();
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | 无 | false | array | 无 | 

###### getSmsLog(获取短信发送日志)
``` php
<?php 
$obj->set_category('message');
$res    =   $obj->getSmsCredits();
$recipient,$project,$result_status,$start_date,$end_date,$order_by,$rows,$offset
```
###### 请求参数
> | 参数 | 必选 | 类型   | 说明                                    |
> | :--- | :--- | :----- | --------------------------------------- |
> | recipient | false | string | 默认返回全部联系人数据，要指定返回某个联系人的日志，请将该值设为 该联系人的11位手机号码 | 
> | project | false | string |  默认返回全部项目数据，要指定短信项目标识返回某个项目（即短信模板）的日志，请将该值设为该模板的项目标识 | 
> | result_status | false | string |  默认返回全部数据，要指定所有发送成功的日志，请将该值设为 delivered ，要查询发送失败的数据，请将该指 dropped | 
> | start_date | false | string | 日志查询的开始时间（使用 UNIX 时间戳格式） | 
> | end_date | false | string | 日志查询的结束时间（使用 UNIX 时间戳格式） | 
> | order_by | false | array | 返回数据时执行的升序或降序（asc or desc） | 
> | rows | false | string | 单次返回数据的行数 | 
> | offset | false | string | 数据偏移指针 | 