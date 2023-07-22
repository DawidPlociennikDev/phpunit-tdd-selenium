<?php

use PHPUnit\Extensions\Selenium2TestCase;

class HtmlFormsTest extends Selenium2TestCase
{

    public function setUp(): void
    {
        $this->setBrowserUrl('http://localhost/php-selenium/src/_testingHtmlPage.html');
        $this->setBrowser('chrome');
        $this->setDesiredCapabilities(['chromeOptions' => ['w3c' => false]]);
    }

    public function testForms()
    {
        $this->url('');
        // $this->select($this->byId('option-element'))->selectOptionLabels('Option 2');
        // $this->select($this->byId('option-element'))->selectOptionByValue('option-2');
        $this->assertSame('option-2', $this->select($this->byId('option-element'))->selectedValues());
        $this->select($this->byId('option-element'))->clearSelectedOptions();

        $usernameInput = $this->byName('some_input_name');
        $usernameInput->value('Adam');
        // $usernameInput->clear();

        $this->assertSame('Adam', $usernameInput->value());

        $radios = $this->elements($this->using('css selector')->value('input[type="radio"]'));
        $radios[0]->click();

        $this->byCssSelector('input[type="checkbox"]')->click();

        $this->byTag('textarea')->value('Some text');
        $this->clickOnElement('submit-button');
        // $this->byId('submit-button')->submit();
        $this->assertContains('The form was sent!', $this->source());
    }

    public function testAnother() 
    {
        // $this->markTestIncomplete('Firefox (geckodriver) does not support this yet');
        $this->assertSame('John', 'John');
        $this->url('');
        $this->cookie()->add('user', 'logged-in')->set();
        $this->cookie()->remove('user');
        $authCookie = $this->cookie()->get('user');
        $this->assertEquals('logged-in', $authCookie);
    }
}
