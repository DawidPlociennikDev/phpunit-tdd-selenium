<?php

namespace forStubMockTesting;

class Logger
{
    public function log($message_type, $message)
    {
        echo 'real Logger executed';
    }
}