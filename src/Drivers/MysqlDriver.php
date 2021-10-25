<?php
namespace App\Drivers;

use Doctrine\DBAL\Driver\PDOMySql\Driver;
//use PDO\MySQL\Driver;

class MysqlDriver extends Driver
{
    public function connect(array $params, $username = null, $password = null, array $driverOptions = array())
    {
        static $connection;
        if (null === $connection) {
            $driverOptions[] = [
                \PDO::ATTR_PERSISTENT => true
            ];

            $connection = parent::connect($params, $username, $password, $driverOptions);
        }

        return $connection;
    }
}