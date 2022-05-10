<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/31
 * Time: 11:48
 */
require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);
$req = $client::Tool()->file->videoGet();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setPageSize(5);
$req->setPage(2);

print_r($client->excute($req));
