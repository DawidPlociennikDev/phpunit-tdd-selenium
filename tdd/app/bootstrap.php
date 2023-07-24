<?php

use Illuminate\Database\Capsule\Manager;
use App\Services\CategoriesFactory;

$capsule = new Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$categories = CategoriesFactory::create();
$container->view->addAttribute('categories', $categories);
