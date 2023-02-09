<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createXMLMetadataConfiguration([__DIR__ . "/config/xml"], true);
$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/database/db.sqlite',
], $config);
$entityManager = new EntityManager($connection, $config);
