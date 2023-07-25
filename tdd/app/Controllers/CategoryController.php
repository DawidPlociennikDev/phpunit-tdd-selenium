<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends BaseController
{
    public function deleteCategory($request, $response, $args)
    {
        $category_id = $args['id'];
        $category = Category::find($category_id);
        $category->delete();
        $response = $this->container->view->render($response, 'view.phtml', ['category_deleted' => true]);
        $_SESSION['category_deleted'] = true;
        return $response->withRedirect('/', 301);
    }

    public function showCategory($request, $response, $args)
    {
        $category_id = explode(',', $args['id']);
        $category = Category::find((int)$category_id[0]);
        $response = $this->container->view->render($response, 'view.phtml', ['category' => $category]);
        return $response;
    }

    public function editCategory($request, $response, $args)
    {

        $category_id = explode(',', $args['id']);
        $category = Category::find((int)$category_id[0]);

        $response = $this->container->view->render($response, 'view.phtml', ['editedCategory' => $category]);
        return $response;
    }

    public function saveCategory($request, $response, $args)
    {
        $data = $request->getParsedBody();
        if (empty($data['category_name']) || empty($data['category_description'])) {

            $categorySaved = false;
        } else {
            if (isset($data['category_id'])) {
                $category = Category::find($data['category_id']);
            } else {
                $category = new Category;
            }
            $category->name = $data['category_name'];
            $category->description = $data['category_description'];
            $category->parent_id = $data['category_parent_id'];
            $category->save();
            $categorySaved = true;
        }
        $response = $this->container->view->render($response, 'view.phtml', ['categorySaved' => $categorySaved]);
        return $response;
    }
}
