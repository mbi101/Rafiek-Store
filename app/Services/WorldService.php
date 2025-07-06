<?php

namespace App\Services;

use App\Repositories\WorldRepository;

class WorldService
{
    protected $worldRepository;

    public function __construct(WorldRepository $worldRepository)
    {
        $this->worldRepository = $worldRepository;
    }

    public function getCountryById($id)
    {
        $country = $this->worldRepository->getCountryById($id);
        if (!$country) {
            abort(404);
        }
        return $country;
    }


    public function getAllCountries()
    {
        return $this->worldRepository->getAllCountries();
    }

    public function storeCountry($data)
    {
        return $this->worldRepository->storeCountry($data);
    }

    public function updateCountry($country, $data)
    {
        return $this->worldRepository->updateCountry($country, $data);
    }

    public function getAllCities($country_id)
    {
        $country = self::getCountryById($country_id);
        return $this->worldRepository->getAllCities($country);
    }

    public function getCityById($id)
    {
        $city = $this->worldRepository->getCityById($id);
        if (!$city) {
            abort(404);
        }
        return $city;
    }

    public function changeStatus($country_id): bool
    {
        $country = self::getCountryById($country_id);
        $country = $this->worldRepository->changeStatus($country);

        if (!$country) {
            return false;
        }
        return true;
    }

    public function changeCityStatus($city_id): bool
    {
        $city = self::getCityById($city_id);
        $city = $this->worldRepository->changeStatus($city);

        if (!$city) {
            return false;
        }
        return true;
    }

    public function changeShippingPrice($request): bool
    {
        $city = self::getCityById($request->city_id);
        $city = $this->worldRepository->changeShippingPrice($city, $request->price);

        if (!$city) {
            return false;
        }
        return true;
    }

}
