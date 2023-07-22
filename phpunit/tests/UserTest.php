<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{

    use CustomAssertionTrait;
    protected $user;

    protected function setUp(): void
    {
        $this->user = new User('donald', 'Trump');
    }

    public function testValidUserName() 
    {
        $user = $this->user;
        $expected = 'Donald';
        $phpunit = $this;
        $closure = function () use ($phpunit, $expected) {
            $phpunit->assertSame($expected, $this->name);
        };
        $binding = $closure->bindTo($user, get_class($user));
        $binding();
    }

    public function testValidUserName2() 
    {
        $user = new class('donald', 'Trump') extends User
        {
            public function getName() 
            {
                return $this->name;
            }
        };

        $this->assertSame('Donald', $user->getName());
    }

    public function testValidDataFormat()
    {
        $user = $this->user;
        $mockedDb = new class extends Database
        {
            public function getEmailAndLastName()
            {
                echo 'no real db touched!';
            }
        };
        $setUserClosure = function () use ($mockedDb) 
        {
            $this->db = $mockedDb;
        };
        $executeSetUserClosure = $setUserClosure->bindTo($user, get_class($user));
        $executeSetUserClosure();
        $this->assertSame('Donald Trump', $user->getFullName());
    }

    public function testPasswordHashed()
    {
        $user = $this->user;
        $expected = 'password hashed!';
        $phpunit = $this;
        $assertClosure = function () use ($phpunit, $expected)
        {
            $phpunit->assertSame($expected, $this->hashPassword());
        };
        $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));
        $executeAssertClosure();
    }

    public function terstPasswordHashed2() 
    {
        $user = new class('donald', 'Trump') extends User
        {
            public function getHashedPassword() 
            {
                return $this->hashPassword();
            }
        };
        $this->assertSame('password hashed!', $user->getHashedPassword());

    }

    public function testCustomDataStructure()
    {
        $data = [
            'nick' => 'Dolar',
            'email' => 'donald@trump.mxn',
            'age' => 70
        ];
        
        $this->assertArrayData($data);
    }

    public function testSomeOperation() 
    {
        $user = $this->user;
        $this->assertEquals('ok!', $user->someOperation([1,2,3]));
        $this->assertEquals('error', $user->someOperation([0]));
        $this->assertEquals('ok!', $user->someOperation([1]));
    }
}