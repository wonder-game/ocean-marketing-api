<?php
/**
 * 创建广告组
 * 通过此接口可用于创建广告组, 当前只支持创建推广目的为落地页或者应用下载的广告组。
 * 每个账号下最多可允许创建500个广告组，如超出需要先删除一部分广告组后才可继续创建。
 * User: yueguang
 * Date: 2022/4/18
 * Time: 15:07
 */

namespace AdvertisingDelivery;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class CampaignCreate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/campaign/create/';
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
        RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
    }


}

