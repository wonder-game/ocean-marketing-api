<?php
/**
 * 获取行业列表
 * User: yueguang
 * Date: 2022/4/31
 * Time: 16:25
 */

namespace Tool\QueryTool;

use core\Profile\RpcRequest;

class ToolsIndustryGet extends RpcRequest
{
    protected $url = '/2/tools/industry/get/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

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
