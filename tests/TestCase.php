<?php
// +----------------------------------------------------------------------
// | TestCase.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests;

use PHPUnit\Framework\TestCase as UnitTestCase;
use Phalcon\Config;
use Phalcon\Di\FactoryDefault;

abstract class TestCase extends UnitTestCase
{
    /** @var FactoryDefault $di */
    public $di;

    /** @var \Xin\Phalcon\Http\Request */
    public $request;

    /** @var \Phalcon\Http\Request */
    public $oldRequest;

    public function setUp()
    {
        $this->di = new FactoryDefault();

        $this->di->setShared('request2', function () {
            return new \Phalcon\Http\Request();
        });

        $this->di->setShared('request', function () {
            return new \Xin\Phalcon\Http\Request();
        });

        $this->request = $this->di->getShared('request');

        $this->oldRequest = $this->di->getShared('request2');

        $_FILES = [
            'photo' => [
                'name' => ['f0', 'f1', ['f2', 'f3'], [[[['f4']]]]],
                'type' => ['text/plain', 'text/csv', ['image/png', 'image/gif'], [[[['application/octet-stream']]]]],
                'tmp_name' => ['t0', 't1', ['t2', 't3'], [[[['t4']]]]],
                'error' => [0, 0, [0, 0], [[[[8]]]]],
                'size' => [10, 20, [30, 40], [[[[50]]]]],
            ],
            'pic' => [
                'name' => 'a.png',
                'type' => 'image/png',
                'tmp_name' => 'xxxx/a.png',
                'error' => 0,
                'size' => 100,
            ],
        ];
    }
}
