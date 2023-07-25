<?php
session_start();
require '../vendor/autoload.php';
$config = require '../app/config.php';
$app = new \Slim\App(['settings' => $config]);
require '../app/dependencies.php';
require '../app/bootstrap.php';
require '../app/routes.php';
$app->run();
