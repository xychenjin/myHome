<?php

namespace App\Console\Commands\Database;

use App\Bls\User\Model\UserModel;
use Illuminate\Console\Command;

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
        $this->line('开始：'. date('Y-m-d H:i:s'));

        $bar = $this->output->createProgressBar(1);

        $i = 10000;
//        while ($i < 10000) {
            $name = 'userName'.date('Ymd').(sprintf('%06d', $i));
            $model = UserModel::create([
                'name' => $name,
                'email' => date('Ymd').(sprintf('%06d', $i)).'@qq.com',
                'password' => bcrypt($name),
            ]);
            $bar->advance();
            $i++;
//        }
        $bar->finish();

        $this->line('结束：'. date('Y-m-d H:i:s'));
    }
}
