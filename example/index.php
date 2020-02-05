<?php
include __DIR__ . "/vendor/autoload.php";

$talkwai = new \itsdevel\talkwaiapi\Talkwai();

$talkwai->setCredentials('CLIENT_KEY', 'DEVELOPER_SECRET');

echo $talkwai->query("Hello!");
