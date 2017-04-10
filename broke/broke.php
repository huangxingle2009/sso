<?php

class broke
{
    public $token;
    public function __construct()
    {
        if (isset($_COOKIE['token'])) $this->token = $_COOKIE['token'];
    }

    public function attach($url, $returnUrl)
    {
        if ($this->token) return;
        $this->generateToken();
        $data = [
            'token' => $this->token,
            'returnUrl' => $returnUrl
        ];
        $url .= "?" . http_build_query($data + $_GET);
        header("Location:" . $url, true, 307);exit;
    }


    private function generateToken()
    {
        if (isset($this->token)) return;
        $this->token = substr(md5(time() . rand(0, 1000)), 8, -8);
        setcookie("token", $this->token, time() + 5 * 60, "/");
    }

}