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
     * 只获取某级别数据，1:第一级,2:第二级,3:第三级，默认都返回
     * @var int $level
     */
    protected $level;

    /**
     * @param mixed $args
     * @return $this
     */
    public function setArgs($args)
    {
        foreach ($args as $key => $value) {
            $this->params[$key] = $this->{$key} = $value;
        }
        return $this;
    }
}
