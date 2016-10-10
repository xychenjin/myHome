<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 10:28
 */

namespace App\Bls\Design\Strategy;


use App\Bls\Design\IFC\IStrategy;

class FindAfterStrategy implements IStrategy
{
    private $_name;

    public function __construct( $name )
    {
        $this->_name = $name;
    }

    public function filter( $record )
    {
        return strcmp( $this->_name, $record ) <= 0;
    }
}