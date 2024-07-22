<?php

use Leaf\Db;

Db::connect([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cbt',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
