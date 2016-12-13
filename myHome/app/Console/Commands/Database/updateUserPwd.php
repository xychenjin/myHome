<?php

namespace App\Console\Commands\Database;

use Pingpong\Admin\Entities\User as UserModel;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\OutputInterface;

class updateUserPwd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:userPwd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '前面刷了150000条数据，密码错误，无法登陆，修复用户密码[18-15018]';

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

        (new UserModel())->getConnection()->transaction(function() {
            $users = UserModel::query()
                ->whereBetween('id', [18, 15018])
                ->get();
            $bar = $this->output->createProgressBar($users->count());
            $this->output->setVerbosity(OutputInterface::VERBOSITY_DEBUG);

            foreach($users as $user) {
                $user->update([
                   'password' =>  $user->name
                ]);

                $bar->advance();
            }

            $bar->finish();
        });

        $this->line('');
        $this->line('结束：'. date('Y-m-d H:i:s'));

    }
}
