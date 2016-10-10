<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 11:22
 */

namespace App\Bls\Design\Chain;


use App\Bls\Design\IFC\ICommand;

class UserCommand implements ICommand
{

    public function onCommand($name, $args)
    {
        if ( $name != 'addUser' ) return false;
        echo( "UserCommand handling 'addUser'\n" );
        return true;
    }
}