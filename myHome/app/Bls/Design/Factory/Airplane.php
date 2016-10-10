<?php

namespace App\Bls\Design\Factory;

use App\Bls\Design\Factory\Factory;

class Airplane implements Factory
{

    public function start()
    {
        // TODO: Implement start() method.
        dd('交通工具制造工厂: '.__METHOD__ );
    }

    public function stop()
    {
        // TODO: Implement stop() method.
        dd('交通工具制造工厂: '.__METHOD__ );
    }

    public function run()
    {
        // TODO: Implement run() method.
        dd('交通工具制造工厂: '.__METHOD__ );
    }
}