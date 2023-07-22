<?php

use PHPUnit\Extensions\Selenium2TestCase;

class WaitingTest extends Selenium2TestCase
{

    public function setUp(): void
    {
        $this->setBrowserUrl('http://localhost/php-selenium/src/_testingHtmlPage.html');
        $this->setBrowser('chrome');
        $this->setDesiredCapabilities(['chromeOptions' => ['w3c' => false]]);
    }
    
    public function testExplicitWait()
    {
        $this->url();
        $driver = $this;
        $this->waitUntil(function() use ($driver) {
            $item = $driver->byId('first-name');
            if ($item->value() === 'Adam') return true;
            return null;
        }, 4000);
        $this->assertSame('Adam', $this->byId('first-name')->value());
    }
}