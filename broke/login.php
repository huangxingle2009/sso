<?php
require "broke.php";
$url = "http://local.sso.com/attach.php";
$returnUrl = "http://local.broke.com/login.php";
$broke = new broke();
$broke->attach($url, $returnUrl);


if (isset($_POST['btn'])) {
    unset($_POST['btn']);
    $ch = curl_init("http://local.sso.com/login.php");
    $_POST['Authorization'] = $broke->token;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    $post = http_build_query($_POST);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    var_dump($response);
}
?>

<html>
<head>
    <title>login</title>
</head>
<body>
<form method="post" action="" name="login_form">
    <label>用户名</label><span><input type="text" name="username"/></span><br>
    <label>密码</label><span><input type="text" name="password"/></span><br>
    <input type="submit" name="btn" value="submit">
</form>
</body>
</html>
