<?php


$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$session_id = $redis->get($_POST['Authorization']);

if (session_status() == PHP_SESSION_ACTIVE) {
     throw new Exception("session has already start");
}

session_id($session_id);
session_start();


//核对用户信息是否正确

//@todo

$_SESSION['user'] = '张三';
