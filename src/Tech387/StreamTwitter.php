<?php

namespace Tech387;

use Tech387\Entities\ConfigurationEntity;
use OauthPhirehose;
use Phirehose;

class StreamTwitter extends OauthPhirehose
{

    /**
     * Subclass specific attribs
     */
    protected $myTrackWords = array('906684074793639936');

    public function __construct(ConfigurationEntity $config)
    {
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

        // This is all that's required, Phirehose will detect the change and reconnect as soon as possible
        $randWord1 = $this->myTrackWords[rand(0, 3)];
        $this->setFollow(array($randWord1));

        echo "Eneque status::".json_decode($status,true)."\n\n\n\n";
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
