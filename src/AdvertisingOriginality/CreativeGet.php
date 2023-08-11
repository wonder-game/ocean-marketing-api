<?php
/**
 * 获取创意列表
 * 通过新版的创意列表接口较老版creative/select接口增加创意的视频ID、创意拒绝理由的返回，
 * 除此之外新版接口支持多维度的fields过滤，能给你带来更好的使用体验。
 * User: yueguang
 * Date: 2022/4/12
 * Time: 10:02
 */
namespace AdvertisingOriginality;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class CreativeGet extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/2/creative/get/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
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
}
