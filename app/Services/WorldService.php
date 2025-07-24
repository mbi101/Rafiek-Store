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


    public function getAllCountries($searchService)
    {
        return $this->worldRepository->getAllCountries($searchService);
    }

    public function storeCountry($data)
    {
        return $this->worldRepository->storeCountry($data);
    }

    public function updateCountry($country, $data)
    {
        return $this->worldRepository->updateCountry($country, $data);
    }

    public function getAllCities($country)
    {
        return $this->worldRepository->getAllCities($country);
    }

    public function storeCity($country, $data)
    {
        return $this->worldRepository->storeCity($country, $data);
    }

    public function updateCity($city, $data)
    {
        return $this->worldRepository->updateCity($city, $data);
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
}
