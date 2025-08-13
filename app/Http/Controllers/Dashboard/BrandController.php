<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BrandRequest;
use App\Services\Dashboard\BrandService;
use App\Services\Dashboard\CategoryService;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    protected $brandService;
    protected $categoryService;

    public function __construct(BrandService $brandService, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->getAllBrands();
        return view('dashboard.pages.brands.index', compact('brands'));
    }


    public function create()
    {
        $categories = $this->categoryService->getParentCategoreis();
        return view('dashboard.pages.brands.create', compact('categories'));
    }

    public function store(BrandRequest $request)
    {
        $data = $request->except('image');
        if (!$this->brandService->createBrand($request, $data)) {
            Session::flash('error', trans('dashboard.error_msg'));
            return redirect()->back();
        }
        Session::flash('success', trans('dashboard.success_msg'));
        return to_route('dashboard.brands.index');

    }

    public function edit(string $id)
    {
        $categories = $this->categoryService->getParentCategoreis();
        $brand = $this->brandService->getBrand($id);
        return view('dashboard.pages.brands.edit', get_defined_vars());

    }

    public function update(BrandRequest $request, string $id)
    {

        $data = $request->except('image');
        if (!$this->brandService->updateBrand($request, $id, $data)) {
            Session::flash('error', trans('dashboard.error_msg'));
            return redirect()->back();
        }
        Session::flash('success', trans('dashboard.success_msg'));
        return to_route('dashboard.brands.index');
    }

    public function destroy(string $id)
    {
        if (!$this->brandService->deleteBrand($id)) {
            Session::flash('error', trans('dashboard.error_msg'));
            return redirect()->back();
        }
        Session::flash('success', trans('dashboard.success_msg'));
        return redirect()->back();
    }
}