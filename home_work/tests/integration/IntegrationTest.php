<?php

use App\User;

class IntegrationTest extends PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider usersProvider
     */
    public function testAdamUser(int $userId, string $expectedName)
    {
        $user = new User();
        $userName = ucfirst($user->getUser($userId));
        $this->assertSame($expectedName, $userName);
    }

    public static function usersProvider()
    {
        return [
            [1, 'Adam'],
            [2, 'Robert'],
            [3, 'John'],
        ];
    }
}
