<?php

namespace App\Services;

use App\Models\Category;
use App\Services\HtmlList;
use App\Services\ForSelectList;

class CategoriesFactory
{
    public static function create(): array
    {
        $categories = Category::all()->toArray();

        $htmlList = new HtmlList();
        $selectList = new ForSelectList();
        $converted_array = $htmlList->convert($categories);
        return [
            'menu_categories' => $htmlList->makeUlList($converted_array),
            'select_list_categories' => $selectList->makeSelectList($converted_array)
        ];
    }
}
