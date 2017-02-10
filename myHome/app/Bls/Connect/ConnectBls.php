<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/2
 * Time: 14:51
 */

namespace App\Bls\Connect;
use Illuminate\Database\Connection;
use App\Consts\Connect\ConnectConst;

class ConnectBls
{
    protected static $connection = null;

    protected $message = '';

    /**
     * PDO连接数据库
     *
     * @param $hostName
     * @param $userName
     * @param $password
     * @param null $database
     * @param null $port
     * @return Connection
     * @throws \Exception
     */
    public function getConnection($hostName, $userName, $password, $database = null, $port = null)
    {
        try {
            if (! isset(self::$connection)) {
                $dsn = "mysql:host=". $hostName. ($port ? ';port='.$port.';':'') . ($database ? ';dbname='. $database : '');
                $pdo = new \PDO($dsn, $userName, $password);
                $pdo->exec('set names utf8');

                $con = new Connection($pdo, $database ? $database : '');
                self::$connection = $con ? $con : null;
            }
            $this->message = self::$connection ? '' : '连接失败：用户名或密码错误';

            return self::$connection;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getCode()
    {
        return $this->message ? 1000002 : 0;
    }
}