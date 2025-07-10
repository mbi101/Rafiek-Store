<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Dashboard\CategoryService;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {

        $categories = $this->categoryService->getAllCategories();
        return view('dashboard.pages.categories.index', compact('categories'));
    }



    public function create()
    {
        // $categories = $this->categoryService->getParentCategories();          compact('categories')
        return view('dashboard.pages.categories.create');
    }

    public function store()
    {
    }
    // public function store(CategoryRequest $request)
    // {
    //     $data = $request->only(['name', 'parent', 'status']);
    //     if (!$this->categoryService->store($data)) {
    //         Session::flash('error', __('dashboard.error_msg'));
    //         return redirect()->back();
    //     }

    //     Session::flash('success', __('dashboard.success_msg'));
    //     return redirect()->back();
    // }


    public function edit(string $id)
    {
        // $category = $this->categoryService->findById($id);
        // $categories = $this->categoryService->getCategoriesExceptChildren($id);
        // return view('dashboard.categories.edit', compact('categories', 'category'));
    }


    // public function update(CategoryRequest $request, string $id)
    // {
    //     $data = $request->only(['name', 'parent', 'status', 'id']);
    //     if (!$this->categoryService->update($data)) {
    //         Session::flash('error', __('dashboard.error_msg'));
    //         return redirect()->back();
    //     }
    //     Session::flash('success', __('dashboard.success_msg'));
    //     return redirect()->back();
    // }

    // public function destroy(string $id)
    // {
    //     if (!$this->categoryService->delete($id)) {
    //         Session::flash('error', __('dashboard.error_msg'));
    //         return redirect()->back();
    //     }
    //     Session::flash('success', __('dashboard.success_msg'));
    //     return redirect()->back();
    // }
}
