<?php
/**
 * 查看视频信息
 * User: yueguang
 * Date: 2022/4/31
 * Time: 11:17
 */

namespace Tool\File;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class FileVideoAdDelete extends RpcRequest
{
    protected $url = '/2/file/video/delete/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var string $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 视频ids
     * @var array $video_ids
     */
    protected $video_ids;

    /**
     * @param mixed $args
     * @return $this
     */
    public function setArgs($args)
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
        RequestCheckUtil::checkNotNull($this->video_ids, 'video_ids');
    }
}
