<?php
/**
 * 纵横组织资产账户列表(分页)
 * User: yueguang
 * Date: 2022/5/19
 * Time: 15:07
 */

namespace Advertiser;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class CustomerAdvertise extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/2/customer_center/advertiser/list/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID(账户管家ID)
     */
    protected $cc_account_id;

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
        RequestCheckUtil::checkNotNull($this->cc_account_id, 'cc_account_id');
    }


}

