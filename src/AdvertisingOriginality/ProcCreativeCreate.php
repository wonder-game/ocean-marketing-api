<?php
/**
 * 创建程序化创意（营销链路）
 * User: yueguang
 * Date: 2022/4/12
 * Time: 10:27
 */
namespace AdvertisingOriginality;

use core\Profile\RpcRequest;

class ProcCreativeCreate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/creative/procedural_creative/create/';
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
