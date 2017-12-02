<?php

namespace Tech387\Entities;

class ConfigurationEntity
{

    private $OauthToken;
    private $OAuthSecret;
    private $TwitterConsumerKey;
    private $TwitterConsumerSecret;

    /**
     * ConfigurationEntity constructor.
     * @param $OauthToken
     * @param $OAuthSecret
     * @param $TwitterConsumerKey
     * @param $TwitterConsumerSecret
     */
    public function __construct($OauthToken, $OAuthSecret, $TwitterConsumerKey, $TwitterConsumerSecret)
    {
        $this->OauthToken = $OauthToken;
        $this->OAuthSecret = $OAuthSecret;
        $this->TwitterConsumerKey = $TwitterConsumerKey;
        $this->TwitterConsumerSecret = $TwitterConsumerSecret;
    }


    /**
     * @return string
     */
    public function getOauthToken():string
    {
        return $this->OauthToken;
    }

    /**
     * @param $OauthToken
     * @return string
     */
    public function setOauthToken($OauthToken):string
    {
        $this->OauthToken = $OauthToken;
    }

    /**
     * @return string
     */
    public function getOAuthSecret():string
    {
        return $this->OAuthSecret;
    }

    /**
     * @param $OAuthSecret
     * @return string
     */
    public function setOAuthSecret($OAuthSecret):string
    {
        $this->OAuthSecret = $OAuthSecret;
    }

    /**
     * @return string
     */
    public function getTwitterConsumerKey():string
    {
        return $this->TwitterConsumerKey;
    }

    /**
     * @param $TwitterConsumerKey
     * @return string
     */
    public function setTwitterConsumerKey($TwitterConsumerKey):string
    {
        $this->TwitterConsumerKey = $TwitterConsumerKey;
    }

    /**
     * @return string
     */
    public function getTwitterConsumerSecret():string
    {
        return $this->TwitterConsumerSecret;
    }

    /**
     * @param $TwitterConsumerSecret
     * @return string
     */
    public function setTwitterConsumerSecret($TwitterConsumerSecret):string
    {
        $this->TwitterConsumerSecret = $TwitterConsumerSecret;
    }

}