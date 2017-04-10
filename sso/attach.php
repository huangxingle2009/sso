<?php

$token = $_GET['token'];
$returnUrl = $_GET['returnUrl'];

if (session_status() != PHP_SESSION_ACTIVE ) {
    session_start();
}

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$redis->set($token, session_id(), 5 * 60);

header("Location:" . $returnUrl, true, 307);exit;


