<?php
include __DIR__ . "/vendor/autoload.php";

$talkwai = new \thisisdevel\talkwaiapi\Talkwai();

$talkwai->setCredentials('CLIENT_KEY', 'DEVELOPER_SECRET');

echo $talkwai->query("Hello!");