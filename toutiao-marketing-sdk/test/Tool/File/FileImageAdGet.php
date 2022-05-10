<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/31
 * Time: 11:15
 */

require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$req = $client::Tool()->file->imageAdGet();
$req->setAdvertiserId(ADVERTISER_ID);
$req->setImageIds(['web.business.image/201901315d0d9323af335d944065b39c']);

print_r($client->excute($req));
