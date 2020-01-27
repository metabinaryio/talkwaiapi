<?php
namespace talkwaiapi;

use GuzzleHttp\Client;

class Talkwai
{
    const BASE_URI = 'https://www.talkwai.com/hub/api';
    const TIMEOUT = 3.0;

    private static $client_key;
    private static $developer_secret;

    public function setCredentials($key, $secret)
    {
        self::$client_key = $key;
        self::$developer_secret = $secret;
    }

    public function query($query)
    {
        $client = new Client([
            'base_uri' => self::BASE_URI,
            'timeout'  => self::TIMEOUT,
        ]);

        $response = $client->request('GET', '?client_key='.self::$client_key.'&developer_secret='.self::$developer_secret.'&query='.$query);
        $body = $response->getBody();
        $data = json_decode($body, true);

        return $data['result']['response']['text']??'';
    }
}
