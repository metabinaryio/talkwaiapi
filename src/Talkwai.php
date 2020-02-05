<?php
namespace itsdevel\talkwaiapi;

use GuzzleHttp\Client;

class Talkwai
{
    const BASE_URI = 'https://api.talkwai.com/v1/query';
    const TIMEOUT = 3.0;

    private static $client_key;
    private static $developer_secret;

    public function setCredentials($key, $secret)
    {
        self::$client_key = $key;
        self::$developer_secret = $secret;
    }

    public function query($query, $json = false)
    {
        $client = new Client([
            'timeout'  => self::TIMEOUT
        ]);

        $response = $client->request('POST', self::BASE_URI, [
            'form_params' => [
                'client_key' => self::$client_key,
                'developer_secret' => self::$developer_secret,
                'query' => $query
            ]
        ]);

        $body = $response->getBody();
        $data = json_decode($body);

        return $json == true ? $body : $data->result->response->text ?? $body;
    }
}
