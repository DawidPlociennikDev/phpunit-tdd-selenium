<?php

use PHPUnit\Framework\TestCase;
use App\Services\CategoriesFactory;
use Illuminate\Database\Capsule\Manager;

class CategoriesFactoryTest extends TestCase
{
    public function testCanProduceStringBasedOnArray()
    {
        $capsule = new Manager;
        $capsule->addConnection([
            'driver' => 'sqlite',
            'host' => 'localhost',
            'database' => 'F:\xampp\htdocs\phpunit_course\tdd\app\database\db.sqlite',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $this->assertTrue(is_string(CategoriesFactory::create()));
    }
}