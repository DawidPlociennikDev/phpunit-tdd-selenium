<?php

trait CustomAssertionTrait 
{
    public function assertArrayData(array $array)
    {
        foreach (['nick', 'email', 'age'] as $key)
        {
            $this->assertArrayHasKey($key, $array, "Array doesnt containt the $key key.");
        }
        $this->assertIsString($array['nick'], 'Nick field must be a string');
        $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $array['email'], 'Email field must be a valid email.');
        $this->assertIsInt($array['age'], 'Age field must be an integer');
    }
}