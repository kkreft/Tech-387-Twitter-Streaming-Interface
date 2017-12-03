<?php

namespace Tech387;

use Tech387\Entities\ConfigurationEntity;
use OauthPhirehose;
use Phirehose;

class StreamTwitter extends OauthPhirehose
{

    // class with function
    private $classCallback;

    const CALLBACK_FUNC = 'showTweets';
    const FOLLOWER_FUNC = 'getIds';

    public function __construct(ConfigurationEntity $config,$classCallback)
    {
        // callback for resonse
        $this->classCallback = $classCallback;

        parent::__construct($config->getOauthToken(),$config->getOAuthSecret(),Phirehose::METHOD_USER);
        $this->URL_BASE = 'https://userstream.twitter.com/1.1/';
        $this->consumerKey = $config->getTwitterConsumerKey();
        $this->consumerSecret = $config->getTwitterConsumerSecret();
    }

    /**
     * This is the one and only method that must be implemented additionally. As per the streaming API documentation,
     * statuses should NOT be processed within the same process that is performing collection
     *
     * @param string $status
     */
    public function enqueueStatus($status)
    {
        // TODO: Implement enqueueStatus() method.

        // get follower ids
        $this->setFollow(
            call_user_func_array(
                array(
                    $this->classCallback,
                    self::FOLLOWER_FUNC
                )
            )
        );

        // send status to function
        call_user_func_array(
            array(
                $this->classCallback,
                self::CALLBACK_FUNC
            ),
            array($status)
        );
    }

    /**
     * Consume the stream
     * @param bool $reconnect
     */
    public function consume($reconnect = TRUE)
    {
        parent::consume($reconnect); // TODO: Change the autogenerated stub
    }

}
