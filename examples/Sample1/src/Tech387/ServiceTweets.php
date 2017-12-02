<?php

namespace Tech387;

class ServiceTweets
{

    private $streamTwitter;
    private $config;

    public function __construct()
    {
        $this->streamTwitter = new StreamTwitter($this->config);
    }

    public function startService()
    {
        $this->streamTwitter->consume();
    }

}