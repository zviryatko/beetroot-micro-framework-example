<?php

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$app = new \App\App();
$container = $app->initContainer();

return ConsoleRunner::createHelperSet($container->get(EntityManagerInterface::class));
