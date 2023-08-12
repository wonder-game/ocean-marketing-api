<?php
/**
 * Created by PhpStorm.
 * User: yueguang
 * Date: 2022/4/22
 * Time: 12:28
 */

namespace ToutiaoSdk;

use AuthenticationOauth\GetAccessToken;
use AuthenticationOauth\RefreshToken;
use AuthenticationOauth\AdvertiserGet;
use core\Exception\TouTiaoException;
use core\Http\HttpRequest;
use core\Profile\RequestInteface;
use EasySwoole\HttpClient\HttpClient;

class ToutiaoAuth
{
    public $app_id;

    public $secret;

    public $scope = '[10000000,12000000,2,3,4,5,8,9,10,12,13,14,11000000]';

    public $server_url = 'https://ad.oceanengine.com/open_api';

    public $box_url = 'https://ad.oceanengine.com/open_api';

    public $is_sanbox = false;

    /**
     * AuthClient constructor.
     * @param string $app_id
     * @param string $secret
     * @param bool $is_sanbox
     * @param null $server_url
     * @param null $box_url
     */
    public function __construct($app_id, $secret = '', $is_sanbox = false, $server_url = '', $box_url = '')
    {
        $this->app_id = $app_id;
        $this->secret = $secret;
        $this->is_sanbox = $is_sanbox;
        $server_url && $this->server_url = $server_url;
        $box_url && $this->box_url = $box_url;
    }

    /**
     * 获取Authcode Url
     *
     * @param string $redirect_uri 授权后的回调地址(需要与第三方后台的APP应用的回调链接保持一致，否则会报错)
     * @param string $state 自定义的透传内容
     * @param string $scope 授权范围
     * @return string
     */
    public function getAuthUrl($redirect_uri, $state = "your_custom_params", $scope = '')
    {
        $params = [
            'app_id' => $this->app_id,
            'redirect_uri' => $redirect_uri,
            'scope' => $scope ?: $this->scope,
            'state' => $state,
        ];
        return 'https://open.oceanengine.com/audit/oauth.html?' . http_build_query($params);
    }

    /**
     * 获取access_token
     * @param string $auth_code 媒体回传来的auth_code值
     * @return string
     * @throws TouTiaoException
     */
    public function getAccessToken($auth_code)
    {
        $params = json_encode([
            'app_id' => $this->app_id,
            'secret' => $this->secret,
            'grant_type' => 'auth_code',
            'auth_code' => $auth_code,
        ]);

        // 开发调试时可打开
        /*
        if (is_env('dev')) {
            $body = '{
            "code": 0,
            "message": "OK",
            "request_id": "20230807233....",
            "data": {
                "access_token": "857aa50942.....",
                "advertiser_ids": [
                    1771206561
                ],
                "expires_in": 86399,
                "refresh_token": "03f937e855....",
                "refresh_token_expires_in": 2591999
            }
        }';
            $result = json_decode($body, true);
            return $result['data'];
        }
        */

        $client = (new HttpClient('https://ad.oceanengine.com/open_api/oauth2/access_token/'))->postJson($params);
        $body = $client->getBody();
        if ( ! $body) throw new \Exception('获取AccessToken失败！');
        $result = json_decode($body, true);

        // https://open.oceanengine.com/labels/7/docs/1696710760866831
        if ( ! empty($result['code'])) {
            throw new \Exception($result['message'], $result['code']);
        }
        // [access_token, expires_in, refresh_token, refresh_token_expires_in, advertiser_ids]
        return $result['data'];

    }


    /**
     * @param RequestInteface $request
     * @param null $url
     * @return \core\Http\HttpResponse
     * @throws TouTiaoException
     */
    private function execute(RequestInteface $request, $url = null)
    {
        $params = $request->getParams();
        $headers = [
            'Content-Type' => $request->getContentType()
        ];
        if (null == $url) {
            $url = ($this->is_sanbox ? $this->box_url : $this->server_url) . $request->getUrl();
        }

        return HttpRequest::curl($url, $request->getMethod(), json_encode($params), $headers);
    }

    /**
     * 获取access_token
     * @param string $auth_code
     * @return string
     * @throws TouTiaoException
     */
/*    public function getAccessToken($auth_code)
    {
        $request = new GetAccessToken();
        $request->setParams(['grant_type' => 'auth_code', 'app_id' => $this->app_id, 'secret' => $this->secret]);
        $request->addParam('auth_code', $auth_code);
        return $this->execute($request)->getBody();
    }*/

    /**
     * 刷新access_token
     * @return string string
     * @throws TouTiaoException
     */
    public function refreshToken($refresh_token)
    {
        $request = new RefreshToken();
        $request->setParams(['grant_type' => 'refresh_token', 'app_id' => $this->app_id, 'secret' => $this->secret, 'refresh_token' => $refresh_token]);
        return $this->execute($request)->getBody();
    }


    /**
     * @param string $access_token
     * @return TouTiaoClient
     */
    public function makeClient($access_token)
    {
        return TouTiaoClient::getInstance($access_token, $this->is_sanbox, $this->server_url, $this->box_url);
    }


    public function advertiserGet($access_token)
    {
        $request = new AdvertiserGet();
        $request->setParams(['access_token' => $access_token, 'app_id' => $this->app_id, 'secret' => $this->secret]);
        return $this->execute($request)->getBody();
    }
}
