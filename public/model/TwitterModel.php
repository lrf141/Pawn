<?php

namespace Lrf141\Pawn\Model;

use Abraham\TwitterOAuth\TwitterOAuth;
use Abraham\TwitterOAuth\TwitterOAuthException;

require_once 'key.php';

class TwitterModel
{
    private $consumer = KEY::CONSUMER;
    private $consumerSecret = KEY::CONSUMER_SECRET;

    private $accessToken = KEY::ACCESS_TOKEN;
    private $accessTokenSecret = KEY::ACCESS_TOKEN_SECRET;


    public function oauthRequest(string $url, array $param = [], string $method = 'GET')
    {
        $result = null;
        try {
            $connection = new TwitterOAuth($this->consumer, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);
            switch ($method) {
            case 'GET':
                $result = $connection->get($url, $param);
                break;
            case 'POST':
                $result = $connection->post($url, $param);
                break;
            }
        } catch (TwitterOAuthException $err) {
        }
        return $result;
    }


    public function requestGetHomeTimeLine()
    {
        $timeline = $this->oauthRequest('statuses/home_timeline');
        return $timeline;
    }
}
