<?php
/**
 * 受众分析数据-省级数据
 * User: yueguang
 * Date: 2022/4/29
 * Time: 10:45
 */

namespace Report;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ReportAudienceProvince extends RpcRequest
{
    protected $url = '/2/report/audience/province/';
    protected $method = 'GET';
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
     * @throws \core\Exception\InvalidParamException
     */
    public function check()
    {
        RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
    }
}
