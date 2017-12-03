# Tech 387 Twitter Streaming 

A PHP Symphony interface to the Twitter Streaming api extending [Phirehose](https://github.com/fennb/phirehose).

For more info see:
[Twitter Dev Page](https://developer.twitter.com/en/docs/tweets/filter-realtime/overview)

## Why do i need it?
If you are building a twitter app that consumes the realtime data you will encurage problems as connecting to the stream and how to handle connections.

## What it does?
 - Connects to the twitter api
 
 - Consumes followers
 
 - Handles disconections
 
 - Handles reconectinos
 
 - Handles error and warning logging
 
## How to use it?

Download via composer

`composer require tech387-twitter/stream`

#### Example with [<b>Symfony</b>](https://symfony.com/) <i>(sample in example project)</i>


- TweetsCommand.php <i>(called from the comand line by the console file)</i>
- ServiceTweets.php <i>(extends <b>TwitterUser</b> and implements two function for sotring tweets and geting realtime update user ids change)</i>
- console <i>(handles comand line input and calls TweetsCommand.php)</i>



#### 1. Create the console file


Tutorial how to create a [console](https://www.sitepoint.com/re-introducing-symfony-console-cli-php-uninitiated/) file.

````
#!/usr/bin/env php

<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Demo\TweetsCommand;

$app = new Application();
$app->add(new TweetsCommand());
$app->run();
````

#### 2. TweetsCommand.php

````
class TweetsCommand extends Command
{

    protected function configure(){
        $this->setName("Twitter:Consume");
    }

    protected function execute(InputInterface $input, OutputInterface $output){

        $configurationEntity = new ConfigurationEntity(
            '906684074793639936-U0bcGYGmftVKTxzFnhea9bw03ldvUfG',
            '8tcbiqS7Q1IpURjIW8pBqiA7OJ43NrF12llu7iVtlF3XG',
            'zsGNrYlzBTQjyWjBM4knDRQBX',
            'cDAYKsuft8WHm1MxwEyo50LJ3wRmsQvkt4lSAGFPHjdgpe6vhl'
        );

        $stream = new ServiceTweets($configurationEntity,ServiceTweets::class);
        $output->writeln(
            $stream->consume()
        );

    }

}
````

#### 3. ServiceTweets

<b>showTweets()</b> - display the tweets and info that we get from twitter. We can suply here a functionality that writes tweets to the database.

<b>getIds()</b> - on each stream update this function gets called to detect changes in the array of users we follow.You can extend this to have a db conneciton for a live update of users to follow.
````
<?php

namespace Demo;

use Tech387\TwitterUser;

class ServiceTweets extends TwitterUser
{

    protected function showTweets($tweets)
    {
        // TODO: Implement showTweets() method.
        echo $tweets;
    }

    protected function getIds(): array
    {
        // TODO: Implement getIds() method.
        return ['906684074793639936','19701628','39538010','934114596310454272'];
    }

}
````
 
## Support

If you have any additional questions feel free to email me arslan.hajdarevic@tech387.com
 
