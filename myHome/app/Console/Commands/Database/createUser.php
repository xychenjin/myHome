<?php

namespace App\Console\Commands\Database;

use Pingpong\Admin\Entities\User as UserModel;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\OutputInterface;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '刷入数据库用户数据';

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
        $this->line('开始：'. date('Y-m-d H:i:s'));

        $bar = $this->output->createProgressBar(10000);
        $this->output->setVerbosity(OutputInterface::VERBOSITY_DEBUG);

        (new UserModel)->getConnection()->transaction(function() use($bar) {
            $i = 20000;
            while ($i < 30000) {
                $name = date('Ymd').(sprintf('%06d', $i));
                UserModel::create([
                    'name' => $name,
                    'email' => $name. '@qq.com',
                    'password' => $name,
                ]);
                $bar->advance();
                $i++;
            }
        });

        $bar->finish();
        $this->line('');
        $this->line('结束：'. date('Y-m-d H:i:s'));
    }
}
