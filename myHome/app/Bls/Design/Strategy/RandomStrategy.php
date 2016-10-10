<?php

namespace App\Bls\Design\Strategy;


class RandomStrategy
{
    public function filter($record)
    {
        return rand( 0, 1 ) >= 0.5;
    }
}