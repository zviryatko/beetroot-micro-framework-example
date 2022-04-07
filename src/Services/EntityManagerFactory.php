<?php

namespace App\Services;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class EntityManagerFactory
{
    public static function create()
    {
        $paths = [
            'src/Models',
        ];
        $isDevMode = false;

        // the connection configuration
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'host' => 'database',
            'user' => getenv('MYSQL_USER'),
            'password' => getenv('MYSQL_PASS'),
            'dbname' => getenv('MYSQL_DB_NAME'),
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        return EntityManager::create($dbParams, $config);
    }
}
