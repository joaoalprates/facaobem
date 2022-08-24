<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'sqlsrv',
    'host'      => 'ECOP-1300',
    'database'  => 'facaobem',
    'username'  => 'sa',
    'password'  => 'ecoplan',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    'pooling'   => false,
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
