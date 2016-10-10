<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 11:24
 */

namespace App\Bls\Design\Chain;


use App\Bls\Design\IFC\ICommand;

class MailCommand implements ICommand
{
    public function onCommand( $name, $args )
    {
        if ( $name != 'mail' ) return false;
        echo( "MailCommand handling 'mail'\n" );
        return true;
    }
}