<?php

use forStubMockTestin\User;
use PHPUnit\Framework\TestCase;

class UserStubTest extends TestCase
{

    public function testCreateUser()
    {
        // $user = new User;
        // $stub = $this->getMockBuilder(User::class)->getMock();
        // $stub = $this->createStub(User::class);
        // $stub->method('save')->willReturn('fake');

        // $stub = $this->getMockBuilder(User::class)->onlyMethods(['save'])->getMock();

        $stub = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['save'])
            ->getMock();
        $stub->method('save')->willReturn(true);
        $this->assertTrue($stub->createUser('Adam', 'email@com.pl'));
        $this->assertFalse($stub->createUser('Adam', 'emai'));
    }
}
