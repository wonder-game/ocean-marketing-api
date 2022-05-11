<?php
/**
 * 上传视频
 * User: yueguang
 * Date: 2022/4/31
 * Time: 10:57
 */

namespace Tool\File;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class FileVideoAd extends RpcRequest
{
    protected $url = '/2/file/video/ad/';
    protected $method = 'POST';
    protected $content_type = 'multipart/form-data';
    protected $timeout = 600;

    /**
     * 广告主ID
     * @var string $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 视频的md5(用于服务端校验)
     * @var string $video_signature
     */
    protected $video_signature;

    /**
     * 视频文件,格式mp4、mpeg、3gp、avi
     * @var string $video_file
     */
    protected $video_file;

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
    }
}
