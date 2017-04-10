<?php
require "broke.php";
$url = "http://local.sso.com/attach.php";
$returnUrl = "http://local.broke.com/login.php";
$broke = new broke();
$broke->attach($url, $returnUrl);

$request_url = "http://local.sso.com/info.php?Authorization=" . $broke->token;
header("Location:" . $request_url);exit;
