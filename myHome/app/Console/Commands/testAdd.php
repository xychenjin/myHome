<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:add';

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
        //

        $this->line("开始于：" . date("Y-m-d H:i:s u", time()));
        $ff = (float)0;
        for ($i = 0; $i < 100; $i++) {
            $ff += 0.1;
            $this->line("f ：{$ff}，第" . ($i+1) . "次的计算值.");
        }

        $this->line("结束于：" . date("Y-m-d H:i:s u", time()));
    }
}
