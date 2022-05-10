<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/31
 * Time: 16:06
 */
require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Tool()->queryTool->dpaBehaviourAvailables();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setPlatformId(1001);

print_r($client->excute($req));
