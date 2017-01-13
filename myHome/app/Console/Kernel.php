<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
        Commands\scanMyFiles::class,
        Commands\TestConsole::class,
        Commands\Database\createUser::class,

        //修复脚本刷的用户的错误密码
        Commands\Database\updateUserPwd::class,

        //生成空白卡
        Commands\M2016\Card\CreateBlank::class,
        //刷新红包状态表
        Commands\Bonus\FreshBonusStatus::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->command('bonus:freshStatus')
            ->everyFiveMinutes();
    }
}
