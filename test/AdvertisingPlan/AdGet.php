<?php
/**
 * 获取广告计划
 * User: yueguang
 * Date: 2022/4/12
 * Time: 17:23
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
$req = $client::AdvertisingPlan()->AdGet()->setAdvertiserId('109089600186')->send();
var_dump($req->getBody());
