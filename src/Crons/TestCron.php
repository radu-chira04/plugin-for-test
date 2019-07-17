<?php

namespace TopItems\Crons;

use Plenty\Modules\Cron\Contracts\CronHandler;
use Plenty\Plugin\Log\Loggable;

class TestCron extends CronHandler
{
    use Loggable;

    public function handle()
    {
        echo "here test \n\n";
    }
}
