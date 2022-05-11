<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/1
 * Time: 16:04
 */

require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);
$req = $client::Tool()->adConvert->updateStatus();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setConvertId(1624067041686558);
$req->setOptStatus('AD_CONVERT_OPT_STATUS_DISABLE');

print_r($client->excute($req));
