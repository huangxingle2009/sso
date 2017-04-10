<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$session_id = $redis->get($_GET['Authorization']); //这里是get 请求, post也无所谓， 为了简单演示

if (session_status() == PHP_SESSION_ACTIVE) {
    throw new Exception("session has already start");
}

session_id($session_id);
session_start();

var_dump($_SESSION);