<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageManger
{
    public function uploadImages($images, $model, $disk)
    {
        foreach ($images as $image) {
            $file_name = $this->generateImageName($image);
            $image->storeAs('/', $file_name, ['disk' => $disk]);
            $model->images()->create([
                'file_name' => $file_name,
            ]);
        }

    }



    public function uploadSingleImage($path, $image, $disk)
    {
        $file_name = self::generateImageName($image);
        $finalPath = $image->storeAs($path, $file_name, ['disk' => $disk]);
        return $finalPath;
    }

    public function generateImageName($image)
    {
        $file_name = Str::uuid() . '_' . time() . '.' . $image->getClientOriginalExtension();
        return $file_name;
    }


    public function deleteImageFromLocal($image_path, $storage = false): void
    {

        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }

        if ($storage == true && Storage::disk('public')->exists($image_path)) {
            Storage::disk('public')->delete($image_path);
        }

    }
}
