<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/31
 * Time: 11:21
 */
require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Tool()->file->videoAdGet();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setVideoIds(['v020331c0000bh96brhpjc2htdvag21g']);

print_r($client->excute($req));
