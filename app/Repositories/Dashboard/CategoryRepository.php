<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryRepository
{


    public function getAll()
    {
        $categories = Category::latest()->paginate(5);
        return $categories;
    }

    // get parent category
    public function parent()
    {
        $categories = Category::whereNull('parent')->get();
        return $categories;
    }

    // get store category
    public function store($request, $data)
    {

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = Str::uuid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('categories', $fileName, 'public');
                $data['image'] = $imagePath;
            }

            $data['status'] = $data['status'] == 'on' ? 1 : 0;
            $category = Category::create($data);

            DB::commit();
            return $category;
        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            throw new \Exception(__('dashboard.error_msg'));
        }
    }



    // update an category
    public function update($request, $id)
    {

        try {
            DB::beginTransaction();

            $category = Category::findOrFail($id);
            $data = $request->except('image');
            $data['status'] = $request->status == 'on' ? 1 : 0;
            $imagePath = null;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = Str::uuid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('categories', $fileName, 'public');
                $data['image'] = $imagePath;

                // delete old one
                if ($category->image && Storage::disk('public')->exists($category->image)) {
                    Storage::disk('public')->delete($category->image);
                }
            }

            $category->update($data);
            DB::commit();
            return $category;

        } catch (\Throwable $th) {
            DB::rollBack();

            // Delete temp image if exists
            if (isset($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            throw $th;
        }

    }

    // get categories except childern
    public function getCategoriesExceptChildren(string $id)
    {
        $categories = Category::where('id', '!=', $id)
            ->whereDoesntHave('children')
            ->whereNull('parent')->get();
        return $categories;
    }

    // get categories except childern
    public function delete(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $category->delete();



            return response()->json([
                "status" => false,
                'message' => __('dashboard.success_msg')
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                "status" => false,
                'message' => __('dashboard.error_msg')
            ]);
        }

    }

}