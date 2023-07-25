<?php

use Slim\Container;
use PHPUnit\Framework\TestCase;
use App\Services\CategoriesFactory;
use App\Controllers\CategoryController;
use Illuminate\Database\Capsule\Manager;

class CategoryControllerTest extends TestCase
{

    public static $controller;
    
    public static function setUpBeforeClass(): void
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
        $container = new Container();
        $container['view'] = new \Slim\Views\PhpRenderer('./app/Views/', [
            'baseUrl' => 'http://localhost:8000/'
        ]);
        $categories = CategoriesFactory::create();
        $container->view->addAttribute('categories',$categories['menu_categories']);
        $container->view->addAttribute('select_list_categories',$categories['select_list_categories']);
        self::$controller = new CategoryController($container);
    }
    public function testCanSeeEditedVideosCategory()
    {
        $enviroment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/show-category/13,Videos',
            'QUERY_STRING' => '',
        ]);

        $request = \Slim\Http\Request::createFromEnvironment($enviroment);

        $response = new \Slim\Http\Response();
        $response = self::$controller->showCategory($request, $response, ['id' => '13,Videos']);
        $this->assertContains('Description of Videos', (string) $response->getBody());
    }
}
