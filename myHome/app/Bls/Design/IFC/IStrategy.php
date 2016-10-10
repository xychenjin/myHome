<?php

namespace App\Bls\Design\IFC;


interface IStrategy
{
  public function filter( $record );
}