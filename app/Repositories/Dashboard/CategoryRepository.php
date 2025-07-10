<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;

class CategoryRepository
{


    public function getAll()
    {
        $categories = Category::latest()->paginate(8);
        return $categories;
    }
}
