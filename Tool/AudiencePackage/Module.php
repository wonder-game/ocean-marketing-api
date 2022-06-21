<?php

namespace Tool\AudiencePackage;

use core\Profile\BaseModule;

class Module extends BaseModule
{
    public function AudiencePackageUpdate()
    {
        return new AudiencePackageUpdate($this->client);
    }
}
