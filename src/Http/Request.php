<?php
// +----------------------------------------------------------------------
// | Request.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Phalcon\Http;

use Phalcon\Http\Request as BaseRequest;

class Request extends BaseRequest
{
    protected $files;

    public function getFile($key)
    {
        if (!isset($files)) {
            $this->files = [];
            $files = $this->getUploadedFiles();
            foreach ($files as $file) {
                $this->files[$file->getKey()] = $file;
            }
        }

        return $this->files[$key] ?: null;
    }
}
