<?php

namespace App;

use App\Services\FlashMessenger;
use App\Services\FlashMessengerAwareInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use League\Container\Container;
use League\Container\ContainerAwareInterface;
use Psr\Container\ContainerInterface;

class App
{
    public function initContainer(): ContainerInterface
    {
        // Initialize container object.
        $container = new Container();
        // Make container automatically detect dependencies, see https://container.thephpleague.com/4.x/auto-wiring/
        $container->delegate(new \League\Container\ReflectionContainer());
        // If class extends ContainerAwareInterface then automatically inject container.
        $container->inflector(ContainerAwareInterface::class)->invokeMethod('setContainer', [$container]);
        // If class extends FlashMessengerAwareInterface then also automatically inject it.
        $container->inflector(FlashMessengerAwareInterface::class,
            function (FlashMessengerAwareInterface $service) use ($container) {
                $service->setFlashMessenger($container->get(FlashMessenger::class));
            });
        // Add self instance as Psr\Container\ContainerInterface alias.
        $container->add(ContainerInterface::class, $container);
        // Add routes collection as dependency.
        $container->add(\App\RoutesCollection::class, fn() => require '../config/routes.php');
        // Add doctrine's entity manager.
        $container->add(EntityManagerInterface::class, function () {
            $paths = ['src/Models'];
            $isDevMode = false;
            // the connection configuration
            $dbParams = [
                'driver' => 'pdo_mysql',
                'host' => 'database',
                'user' => getenv('MYSQL_USER'),
                'password' => getenv('MYSQL_PASS'),
                'dbname' => getenv('MYSQL_DB_NAME'),
            ];
            $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
            return EntityManager::create($dbParams, $config);
        });
        return $container;
    }
}
