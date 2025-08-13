<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;
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
        $categories = $this->categoryService->getParentCategoreis();
        return view('dashboard.pages.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->except('image');

        if (!$this->categoryService->store($request, $data)) {
            Session::flash('success', __('dashboard.error_msg'));
            return redirect()->back();
        }

        Session::flash('success', __('dashboard.success_msg'));
        return redirect()->back();

    }


    public function edit(Category $category)
    {
        $categories = $this->categoryService->getCategoreisExceptChildern($category->id);
        return view('dashboard.pages.categories.edit', compact('category', 'categories'));
    }


    public function update(CategoryRequest $request, $id)
    {
        if (!$this->categoryService->update($request, $id)) {
            Session::flash('error', __('dashboard.error_msg'));
            return redirect()->back();
        }

        Session::flash('success', __('dashboard.success_msg'));
        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(string $id)
    {
        if (!$this->categoryService->delete($id)) {
            Session::flash('error', __('dashboard.error_msg'));
            return response()->json([
                "status" => false,
                'message' => __('dashboard.error_msg')
            ]);
        }

        Session::flash('success', __('dashboard.success_msg'));
        return response()->json([
            "status" => true,
            'message' => __('dashboard.success_msg')
        ]);
    }
}
