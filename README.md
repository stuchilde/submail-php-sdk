# 赛邮云通信 PHP SDK

**Note:** 内部依赖于guzzlehttp/guzzle 组件

这个SDK主要是对 **[赛邮云通信](https://www.mysubmail.com/)** 的HTTP短信发送相关API的PHP封装。

SUBMAIL赛邮云通信作为专业短信群发平台,致力于为政企及个人客户提供手机短信（sms）、邮件、短信验证码、106短信等通道及api接口服务.SUBMAIL不仅提供高速、稳定、安全的短信群发,邮件群发,语音通知以及国际短信的发送,还提供更加方便快捷的A2P短信发送、smtp服务和网站集成API,使客户的触发短信和触发邮件集成更加方便,成本更低廉。

## Install

Via Composer

``` bash
$ composer require Submail/submail-php-sdk
```

也可以修改composer.json之后，执行  composer update  更新项目

```json
"require": {
    "submail/submail-php-sdk" : "~1.0"
}
```

执行命令后，自动加载需要在psr-4规范在composer.json添加
```json
    "autoload": {
        "psr-4": {
            "Submail\\SDK\\": "src"
        }
    }
```


## Usage

如果单独使用别忘了引入composer生成的autoload.php文件

如果是laravel用户可以不用手动include,需要执行
``` bash
$ php artisan vendor:publish --tag=config
```    

使用此sdk之前别忘了先在[赛邮云通信官网](https://www.mysubmail.com/)注册并申请相应的**apikey**
## SDK
#### [短信-阅读详细](./doc/Message.md)

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
###### messagexSend
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

**注意**：凡是涉及xsend方法，需要保持项目ID(project)在配置有效。

#### [邮件-阅读详细](./doc/Email.md)

#### [语音-阅读详细](./doc/Voice.md)

#### [国际短信-阅读详细](./doc/International_message.md)

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Submail](https://github.com/stuchilde)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
