<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/9
 * Time: 11:19
 */

namespace App\Http\Controllers\Design\Chain;

use App\Http\Controllers\Controller;
use App\Bls\Design\Chain\CommandChain;
use App\Bls\Design\Chain\UserCommand;
use App\Bls\Design\Chain\MailCommand;

class ChainController extends Controller
{
    public function chain()
    {
        $cc = new CommandChain();
        $cc->addCommand( new UserCommand() );
        $cc->addCommand( new MailCommand() );
        $cc->runCommand( 'addUser', null );
        $cc->runCommand( 'mail', null );
    }
}