<?php

namespace App\Repositories;


use App\Models\City;
use App\Models\Country;

class WorldRepository
{
    public function getCountryById($id)
    {
        return Country::query()->find($id);
    }


    public function getAllCountries()
    {
        return Country::query()->withCount(['cities', 'users'])
            ->when(!empty(request()->keyword), function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%');
            })->paginate(10);
    }


    public function storeCountry($data)
    {
        return Country::query()->create([
            'name' => [
                'en' => $data['name']['en'],
                'ar' => $data['name']['ar'],
            ],
            'code' => $data['code'],
            'status' => 1,
        ]);
    }

    public function updateCountry($country, $data)
    {
        return $country->update([
            'name' => [
                'en' => $data['name']['en'],
                'ar' => $data['name']['ar'],
            ],
            'code' => $data['code'],
        ]);
    }

    public function getAllCities($country)
    {
        return $country->cities()->withCount('users')->paginate(10);
    }

    public function storeCity($country, $data)
    {
        return City::query()->create([
            'country_id' => $country->id,
            'name' => [
                'en' => $data['name']['en'],
                'ar' => $data['name']['ar'],
            ],
            'shipping' => $data['shipping'],
            'status' => 1,
        ]);
    }


    public function updateCity($city, $data)
    {
        return $city->update([
            'name' => [
                'en' => $data['name']['en'],
                'ar' => $data['name']['ar'],
            ],
            'shipping' => $data['shipping'],
        ]);
    }

    public function getCityById($id)
    {
        return City::query()->find($id);
    }

    public function changeStatus($model)
    {
        return $model->update([
            'status' => $model->status == 1 ? 0 : 1,
        ]);
    }
}
