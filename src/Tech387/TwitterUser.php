<?php

namespace Tech387;

abstract class TwitterUser extends StreamTwitter {

    abstract protected function showTweets($tweets);
    abstract protected function getIds():array;

}