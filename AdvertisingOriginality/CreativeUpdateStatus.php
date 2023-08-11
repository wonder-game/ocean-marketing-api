<?php
/**
 * 更新创意状态
 * 通过此接口可对创意做启用/暂停操作。
 * User: yueguang
 * Date: 2022/4/12
 * Time: 15:26
 */
namespace AdvertisingOriginality;

use core\Profile\RpcRequest;

class CreativeUpdateStatus extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/creative/update/status/';
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
