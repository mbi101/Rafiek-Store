<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\BrandRepository;
use App\Utils\ImageManger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandService
{
    protected $brandRepository, $imageManger;

    public function __construct(BrandRepository $brandRepository, ImageManger $imageManger)
    {
        $this->brandRepository = $brandRepository;
        $this->imageManger = $imageManger;
    }
    public function getBrand($id)
    {
        $brand = $this->brandRepository->getBrand($id);
        if (!$brand) {
            abort(404);
        }
        return $brand;
    }
    public function getAllBrands()
    {
        return $this->brandRepository->getBrands();
    }


    // public function getBrandsForDatatables()
    // {
    //     $brands = $this->brandRepository->getBrands();
    //     return DataTables::of($brands)
    //         ->addIndexColumn()
    //         ->addColumn('status', function ($brand) {
    //             return $brand->getStatus();
    //         })
    //         ->addColumn('name', function ($brand) {
    //             return $brand->getTranslation('name', app()->getLocale());
    //         })
    //         ->addColumn('image', function ($brand) {
    //             return view('dashboard.brands.datatables.image', compact('brand'));
    //         })
    //         ->addColumn('products_count', function ($brand) {
    //             return $brand->products_count == 0 ? __('dashboard.not_found') : $brand->products_count;
    //         })
    //         ->addColumn('action', function ($brand) {
    //             return view('dashboard.brands.datatables.actions', compact('brand'));
    //         })
    //         ->rawColumns(['action', 'image'])
    //         ->make(true);
    // }

    public function createBrand($request, $data)
    {
        $image = $request->image;

        try {
            DB::beginTransaction();

            if ($request->hasFile('image') && $image != null) {
                $imagePath = $this->imageManger->uploadSingleImage('brands', $image, 'public');
                $data['image'] = $imagePath;
            }

            $data['status'] = $request->status == 'on' ? 1 : 0;
            $brand = $this->brandRepository->createBrand($data);

            DB::commit();
            return $brand;
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            throw new \Exception(__('dashboard.error_msg'));
        }

    }


    public function updateBrand($request, $id, $data)
    {
        try {
            DB::beginTransaction();
            $image = $request->image;
            $brand = $this->getBrand($id);

            if ($request->hasFile('image') && $brand->image != null) {
                // delete old image
                $this->imageManger->deleteImageFromLocal($brand->image, true);
                $path = $this->imageManger->uploadSingleImage('brands', $image, 'public');
                $data['image'] = $path;
            }

            $data['status'] = $request->status == 'on' ? 1 : 0;
            $response = $this->brandRepository->updateBrand($brand, $data);

            DB::commit();
            return $response;
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            throw new \Exception(__('dashboard.error_msg'));

        }
    }
    public function deleteBrand($id)
    {
        $brand = $this->getBrand($id);
        // ckeck if has image?
        if ($brand->image != null) {
            $this->imageManger->deleteImageFromLocal($brand->image, true);
        }

        $brand = $this->brandRepository->deleteBrand($brand);

        return $brand;
    }
}
