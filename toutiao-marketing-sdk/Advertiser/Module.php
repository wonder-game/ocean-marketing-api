<?php
/**
 * 账号服务
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/14
 * Time: 16:56
 */

namespace Advertiser;

use core\Profile\BaseModule;

class Module extends BaseModule
{
    public function majordomoAdvertise()
    {
        return new majordomoAdvertise($this->client);
    }
}
