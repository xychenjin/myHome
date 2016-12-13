<?php

namespace App\Console\Commands\M2016\Card;

use App\Bls\M2016\Model\CardModel;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\OutputInterface;

class CreateBlank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:blankCard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成空白卡';

    /**
     * 批量生成空白卡上线
     *
     * @var int
     */
    protected $pitch = 100000;

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
        $this->line('开始：'. date('Y-m-d H:i:s'));
        (new CardModel)->getConnection()->transaction(function() {
            $i = $this->getStart();
            $max = $this->getStart() + $this->pitch;
            $bar = $this->output->createProgressBar($this->pitch);
            $this->output->setVerbosity(OutputInterface::VERBOSITY_DEBUG);

            while ($i < $max) {
                CardModel::create([
                    'card_pwd' => generateCardPwd(),
                    'card_no' => '100'. date('YmdHis'). sprintf('%010d', $i),
                    'type' => rand(1, 3),
                    'status' => rand(1, 3)
                ]);

                $bar->advance();
                $i++;
            }

            $bar->finish();
        });

        $this->line('');
        $this->line('结束：'. date('Y-m-d H:i:s'));
    }

    /**
     * 获取上次刷到空白卡的最大的值
     *
     * @return int
     */
    private function getStart()
    {
        $model = CardModel::select('card_no')
            ->orderBy('card_no', 'desc')
            ->first();
        if (empty($model)) {
           return 0;
        }

        $res = $model->card_no;
        return intval(substr($res, -10)) + 1;
    }
}
