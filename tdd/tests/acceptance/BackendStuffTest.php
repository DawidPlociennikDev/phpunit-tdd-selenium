<?php

use App\Models\Category;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use PHPUnit\Extensions\Selenium2TestCase;
use PHPUnit\Framework\TestCase;

class BackendStuffTest extends Selenium2TestCase
{

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
        $capsule::schema()->dropIfExists('categories');
        $capsule::schema()->create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable(false);
            $table->bigInteger('parent_id')->unsigned()->nullable();
        });
        
        Category::create([
            'name' => 'Electronics'
        ]);
    }

    public function setUp(): void
    {
        $this->setBrowserUrl('http://localhost:8000/');
        $this->setBrowser('chrome');
        $this->setDesiredCapabilities(['chromeOptions' => ['w3c' => false]]);
    }

    public function testCanSeeAddedCategories()
    {
        $this->url('');
        $element = $this->byXPath('//ul[@class="dropdown menu"]/li[2]/a');
        $href = $element->attribute('href');
        $this->assertRegExp('@^http://localhost:8000/show-category/[0-9]+,Electronics@', $href);

        $this->url('show-category/1');
        $element = $this->byXPath('//ul[@class="dropdown menu"]/li[2]/a');
        $href = $element->attribute('href');
        $this->assertRegExp('@^http://localhost:8000/show-category/[0-9]+,Electronics@', $href);
    }

    public function testCanAddChildCategory()
    {
        $parent_category = Category::where('name','Electronics')->first();
        $child_category = new Category;
        $child_category->name = 'Monitors';

        $parent_category->children()->save($child_category);

        $this->url('');

        $element = $this->byXPath('//ul[@class="dropdown menu"]/li[2]/ul[1]/li[1]/a');
        $href = $element->attribute('href');
        $this->assertRegExp('@^http://localhost:8000/show-category/[0-9]+,Monitors@',$href);
    }
}
