<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/1
 * Time: 15:06
 */
require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Tool()->adConvert->push();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setConvertId(1624248653889560);
$req->setTargetAdvertiserIds([162424865388]);

print_r($client->excute($req));
