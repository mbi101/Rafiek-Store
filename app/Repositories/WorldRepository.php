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


    public function getAllCities($country)
    {
        return $country->cities;
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

    public function changeShippingPrice($city, $price)
    {
        return $city->shippingPrice->update([
            'price' => $price,
        ]);
    }
}
