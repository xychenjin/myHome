<?php

namespace App\Console\Commands\Bonus;

use App\Bls\Bonus\BonusBls;
use App\Bls\Bonus\Model\BonusModel;
use Illuminate\Console\Command;

class FreshBonusStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:freshStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '监视用户红包表并及时更新红包状态';

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

        $bonusLists = BonusModel::ofEnable()->get();
        $bar = $this->output->createProgressBar(count($bonusLists));
        $bls = new BonusBls();
        $updated = 0;
        foreach ($bonusLists as $bonus) {
            try {
                $res = $bls->checkBonusStatus($bonus);
                $res && $updated++;
            } catch (\Exception $e) {
                \Log::info($e->getMessage(). ','. $e->getFile(). ','. $e->getLine());
            }
            $bar->advance();
        }
        $bar->finish();
        $this->line('');
        $updated && $this->line('共更新了'. $updated. '条记录！');
        $this->line('结束：'. date('Y-m-d H:i:s'));
    }
}
