<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Request;

use Tests\TestCase;

class BaseTest extends TestCase
{
    public function testBase()
    {
        $this->assertTrue(extension_loaded('phalcon'));
    }

    public function testRequest()
    {
        $files = $this->request->getUploadedFiles();
        $files2 = $this->oldRequest->getUploadedFiles();

        $this->assertEquals($files, $files2);
    }

    public function testFileRequest()
    {
        $file = $this->request->getFile('pic');

        foreach ($this->oldRequest->getUploadedFiles() as $item) {
            if ($item->getKey() === 'pic') {
                $this->assertEquals($item, $file);
            }
        }
    }
}
