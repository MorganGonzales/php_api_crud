<?php

namespace App\repositories;

use Doctrine\DBAL\DriverManager;

class BoardGameRepositoryFactory
{
    // This is where we define concrete classes of our database repositories
    private static $repositoryMap = [
        'pdo_pgsql' => PostGreSqlBoardGameRepository::class,
        'pdo_mysql' => MySqlBoardGameRepository::class,
    ];

    public static function create(array $connectionParams): BoardGameRepositoryInterface
    {
        if (!array_key_exists($connectionParams['driver'], self::$repositoryMap)) {
            throw new \InvalidArgumentException('Database driver not supported');
        }

        $dbConnection = DriverManager::getConnection($connectionParams);

        return new self::$repositoryMap[$connectionParams['driver']]($dbConnection);
    }
}
