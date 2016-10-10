<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 11:21
 */

namespace App\Bls\Design\Chain;


class CommandChain
{
    private $_commands = array();

    public function addCommand( $cmd )
    {
        $this->_commands []= $cmd;
    }

    public function runCommand( $name, $args )
    {
        foreach( $this->_commands as $cmd )
        {
            if ( $cmd->onCommand( $name, $args ) )
                return;
        }
    }
}