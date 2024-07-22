<?php
require __DIR__ . '/../vendor/autoload.php';

$app = new Leaf\App();

require __DIR__ . '/../src/routes.php';

$app->run();
