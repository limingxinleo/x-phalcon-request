# x-phalcon-request
Phalcon Request Library

## 获取依赖注入服务
~~~php
<?php
use Phalcon\Di\FactoryDefault;
use Xin\Phalcon\Http\Request;

$di = new FactoryDefault();
$di->setShared('request', function () {
    return new Request();
});

~~~

## 获取上传的文件
~~~php
<?php
use Phalcon\Di;
$di = Di::getDefault();
$file = $di->getShared('request')->getFile('file');
~~~
