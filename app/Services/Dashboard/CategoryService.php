<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CategoryRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }
}