<?php

namespace TopItems\Crons;

use Plenty\Modules\Cron\Contracts\CronHandler;

class TestCron extends CronHandler
{

    public function handle()
    {
        echo "\n here test \n\n";
        return;
    }
}
