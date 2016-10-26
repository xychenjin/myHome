<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/18
 * Time: 11:48
 */

namespace App\Http\Controllers\Key;


use App\Http\Controllers\Controller;

class KeyController extends Controller
{
    public function getKey()
    {
        $keywords = array('__halt_compiler', 'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor');

        $predefined_constants = array('__CLASS__', '__DIR__', '__FILE__', '__FUNCTION__', '__LINE__', '__METHOD__', '__NAMESPACE__', '__TRAIT__');

        var_dump($keywords);
        echo "<br/>";
        print_r($predefined_constants);

        dd();
    }

    public function broke()
    {
        $i = 0;
        while (++$i) {
            switch ($i) {
                case 5:
                    echo "At 5<br />\n";
//                    break;
                    break 1;  /* 只退出 switch. */
                case 10:
                    echo "At 10; quitting<br />\n";
//                    break;
                    break 2;  /* 退出 switch 和 while 循环 */
                default:
                    break;
            }
        }

        dd();
    }

}