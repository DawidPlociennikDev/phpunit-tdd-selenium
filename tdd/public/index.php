<?php

require '../vendor/autoload.php';
$config = require '../app/config.php';
$app = new \Slim\App(['settings' => $config]);
require '../app/routes.php';
require '../app/dependencies.php';
$app->run();
