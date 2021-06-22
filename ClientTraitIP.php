<?php

trait ClientTraitIP
{
    public string $requestedUrl;
    public array $response;
    public $connect;


    public function getResponse($key = null)
    {
        $this->run();
        return (!is_null($key) && isset($this->response[$key])) ? $this->response[$key] : $this->response;
    }


    private function run(): void
    {
        $this->ConnectCurl();
        $this->response = unserialize(curl_exec($this->connect));
        $this->closeCurlConnection();
    }

    private function ConnectCurl(): void
    {
        $this->connect = curl_init();
        curl_setopt($this->connect, CURLOPT_URL, $this->requestedUrl);
        curl_setopt($this->connect, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->connect, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    }

    public function setUserInfo($ip, $query = null): void
    {
        $query = (is_array($query)) ? implode(',', $query) : $query;
        $this->requestedUrl = "http://ip-api.com/php/${ip}?fields=${query}";
    }



    private function closeCurlConnection():void
    {
        curl_close($this->connect);
    }


}
