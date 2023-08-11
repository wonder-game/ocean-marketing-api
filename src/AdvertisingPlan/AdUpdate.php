<?php
/**
 * 修改广告计划
 * 创建和更新广告计划接口支持同时选择包含和排除人群包
 * User: yueguang
 * Date: 2022/4/30
 * Time: 9:56
 */

namespace AdvertisingPlan;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class AdUpdate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/ad/update/';
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

    /**
     *
     * @throws InvalidParamException
     */
    public function check()
    {
    }
}
