<?php

namespace App\Services;

class ForSelectList extends CategoryTree
{

    public function makeSelectList(array $converted_db_array, int $repeat = 0): array
    {
        foreach ($converted_db_array as $value) {
            $this->categorylist[] = [
                'id' => $value['id'],
                'name' => str_repeat("&nbsp;", $repeat) . $value['name']
            ];
            if (!empty($value['children'])) {
                $repeat = $repeat + 2;
                $this->makeSelectList($value['children'], $repeat);
            }
        }
        return $this->categorylist;
    }
}
