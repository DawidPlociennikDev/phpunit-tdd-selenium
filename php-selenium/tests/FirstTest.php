<?php

use PHPUnit\Extensions\Selenium2TestCase;

class FirstTest extends Selenium2TestCase {

    public function setUp() : void
    {
        $this->setBrowserUrl('http://localhost/php-selenium/src/testingHtmlPage.html');
        $this->setBrowser('chrome');
        $this->setDesiredCapabilities(['chromeOptions' => ['w3c' => false]]);
    }

    public function testTitle() 
    {
        $this->url('');
        $this->assertEquals('HTML by Adam Morse, mrmrs.cc', $this->title());
    }

    public function testGettingElements()
    {
        $this->url('');
        $h1 = $this->byCssSelectors('header h1');
        $this->assertContains('HTML', $h1->text());

        $h1 = $this->elements($this->using('css selector')->value('h1'));
        $this->assertEquals(16, count($h1));
        $this->assertContains('Headings', $h1[2]->text());

        $field = $this->byId('first-name');
        $this->assertSame('Adam', $field->value());
        $this->assertSame('Adam', $field->attribute('value'));

        $link = $this->byId('google-link-id'); // $this->byName , $this->byClassName
        // $href = $link->attribute('href');
        $this->assertSame('Google', $link->text());
        
        // $this->clickOnElement('google-link-id');
        $link->click();
        $this->assertEquals('Google', $link->text());
        // $this->url('');
        $this->back();
        // $this->forward();
        $this->refresh();

        $content = $this->byTag('body')->text();
        $this->assertContains('Every html element in one place. Just waiting to be styled', $content);

        $this->assertContains('At vero eos at accusamus', $this->source());
    }

}