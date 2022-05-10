<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/29
 * Time: 18:17
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Dmp()->dataSourceFileUpload();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setFile(__DIR__ . '/test.zip');

print_r($client->excute($req));
