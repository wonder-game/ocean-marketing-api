<?php
/**
 * 获取视频素材库
 * User: yueguang
 * Date: 2022/4/31
 * Time: 11:42
 */

namespace Tool\File;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;
use Tool\CreativeWord\ToolsCreativeWordCreate;

class FileVideoGet extends RpcRequest
{
    protected $url = '/2/file/video/get/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var string $advertiser_id
     */
    protected $advertiser_id;

    /**
     * @param array $args
     * @return $this
     */
    public function setArgs($args = [])
    {
        foreach ($args as $key => $value) {
            $this->params[$key] = $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @throws \core\Exception\InvalidParamException
     */
    public function check()
    {
        RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
    }
}
