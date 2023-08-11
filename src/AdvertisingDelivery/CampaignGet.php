<?php
/**
 * 获取广告组
 * 获取广告组列表，可指定fields获取每个广告组的基本元素。
 * User: yueguang
 * Date: 2022/4/17
 * Time: 14:28
 */

namespace AdvertisingDelivery;

use core\Profile\RpcRequest;

class CampaignGet extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/2/campaign/get/';
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
