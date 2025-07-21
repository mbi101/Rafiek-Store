<?php

namespace App\Services\Dashboard;

use App\Models\Category;
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
    public function getParentCategoreis()
    {
        return $this->categoryRepository->parent();
    }

    public function getCategoreisExceptChildern(string $id)
    {
        return $this->categoryRepository->getCategoriesExceptChildren($id);
    }


    public function store($request, $data)
    {
        return $this->categoryRepository->store($request, $data);
    }


    public function update($request, $id)
    {
        return $this->categoryRepository->update($request, $id);
    }

    public function delete(string $id)
    {
        return $this->categoryRepository->delete($id);
    }



}