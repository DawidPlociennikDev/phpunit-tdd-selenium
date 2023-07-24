<?php

namespace App\Services;

use App\Models\Category;

class CategoriesFactory
{
    public static function create(): string
    {
        $categories = Category::all()->toArray();

        $htmlList = new HtmlList();
        $converted_array = $htmlList->convert($categories);
        return $htmlList->makeUlList($converted_array);
    }
}
