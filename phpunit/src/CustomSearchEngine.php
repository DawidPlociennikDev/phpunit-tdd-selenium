<?php

class CustomSearchEngine
{
    public function __construct($googleSearch)
    {
        $this->googleSearch = $googleSearch;
    }

    public function doStuff()
    {
        $this->googleSearch->doGoogleSearch(
            '00000000000000000000000000000000',
            'PHPUnit',
            0,
            1,
            false,
            '',
            false,
            '',
            '',
            ''
          );

        return 'something...';
    }
}