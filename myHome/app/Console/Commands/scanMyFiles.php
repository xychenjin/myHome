<?php

namespace App\Console\Commands;

use App\Http\Controllers\MyHome\IndexController;
use Illuminate\Console\Command;

class scanMyFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:myFiles';

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
        $startTime = date('Y-m-d H:i:s');
        $this->line("开始时间：{$startTime}");

        $scanMyFiles = new IndexController();
        $scanMyFiles->index();
        $endTime = date('Y-m-d H:i:s');
        $this->line("结束时间：{$endTime}");
    }
}
