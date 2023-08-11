<?php
/**
 * 创建广告创意
 * User: yueguang
 * Date: 2022/4/12
 * Time: 10:27
 */
namespace AdvertisingOriginality;

use AdvertisingDelivery\CampaignCreate;
use core\Profile\RpcRequest;

class CreativeCreate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/creative/create_v2/';
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
