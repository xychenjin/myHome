<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;

class TestConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:console';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = ['张三', '李四', '王五', '陈六'];



// create a new progress bar (50 units)
//        $progress = new ProgressBar($this->output, 50);
//
//// start and displays the progress bar
//        $progress->start();
//
//        $i = 0;
//        while ($i++ < 50) {
//            // ... do some work
//            echo "\r\n";
//            $this->error("current: $i");
//            // advance the progress bar 1 unit
//            $progress->advance();
//
//            // you can also advance the progress bar by more than 1 unit
//            // $progress->advance(3);
//        }
//
//// ensure that the progress bar is at 100%
//        $progress->finish();

//        $bar = $this->output->createProgressBar(count($users));
//
//        foreach ($users as $user) {
////            $this->performTask($user);
//
//            $bar->advance();
//        }
//
//        $bar->finish();
//
//        $name = $this->ask('what is your name?');

//        dd($name);

        $ddd = $this->secret('your secret is ?');
        dd($ddd);
//        $this->error('出错啦！');
    }
}
