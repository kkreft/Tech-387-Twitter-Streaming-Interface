<?php

namespace Tech387\StreamTwitter;

use Tech387\Entities\ConfigurationEntity;
use OauthPhirehose;
use Phirehose;

class StreamTwitter extends OauthPhirehose
{

    /**
     * Subclass specific attribs
     */
    protected $myTrackWords = array('morning', 'goodnight', 'hello', 'the');

    public function __construct(ConfigurationEntity $config)
    {
        parent::__construct($config->getOauthToken(),$config->getOAuthSecret(),Phirehose::METHOD_USER);
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
        $this->setTrack(array($randWord1));

        echo "Eneque status::".$status."\n";
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
