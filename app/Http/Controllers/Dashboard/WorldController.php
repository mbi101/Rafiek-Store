<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CountryRequest;
use App\Http\Requests\Dashboard\World\CItyRequest;
use App\Models\City;
use App\Models\Country;
use App\Services\Dashboard\SearchService;
use App\Services\WorldService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WorldController extends Controller implements HasMiddleware
{
    protected $worldService;

    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'check_permission:settings'),
        ];
    }

    public function getAllCountries(SearchService $searchService)
    {
        $countries = $this->worldService->getAllCountries($searchService);
        return view('dashboard.pages.world.countries.index', compact('countries'));
    }

    public function createCountry()
    {
        return view('dashboard.pages.world.countries.create');
    }

    public function storeCountry(CountryRequest $request)
    {
        $data = $request->only(['name', 'code']);
        $this->worldService->storeCountry($data);
        return redirect()->route('dashboard.countries.index')->with('success', __('dashboard.created_successfully'));
    }

    public function editCountry(Country $country)
    {
        return view('dashboard.pages.world.countries.edit', compact('country'));
    }

    public function updateCountry(CountryRequest $request, Country $country)
    {
        $data = $request->only(['name', 'code']);
        $this->worldService->updateCountry($country, $data);
        return redirect()->route('dashboard.countries.index')->with('success', __('dashboard.updated_successfully'));
    }

    public function changeStatus($country_id)
    {
        $country = $this->worldService->changeStatus($country_id);
        if (!$country) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.no_data_found')
            ]);
        }
        $country = $this->worldService->getCountryById($country_id);
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
            'data' => $country
        ]);
    }

    public function getCitiesByCountry(Country $country)
    {
        $cities = $this->worldService->getAllCities($country);
        return view('dashboard.pages.world.cities.index', compact(['cities', 'country']));
    }

    public function createCity(Country $country)
    {
        return view('dashboard.pages.world.cities.create', compact('country'));
    }

    public function storeCity(Country $country, CityRequest $request)
    {

        $data = $request->only(['name', 'shipping']);
        $this->worldService->storeCity($country, $data);
        return redirect()->route('dashboard.countries.cities.index', $country->id)->with('success', __('dashboard.created_successfully'));
    }

    public function editCity(City $city)
    {
        return view('dashboard.pages.world.cities.edit', compact('city'));
    }

    public function updateCity(CityRequest $request, City $city)
    {
        $data = $request->only(['name', 'shipping']);
        $this->worldService->updateCity($city, $data);
        return redirect()->route('dashboard.countries.cities.index', $city->country->id)->with('success', __('dashboard.updated_successfully'));
    }

    public function changeCityStatus($city_id)
    {
        $city = $this->worldService->changeCityStatus($city_id);
        if (!$city) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg')
            ]);
        }

        $gov = $this->worldService->getCityById($city_id);
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
            'data' => $city_id
        ]);
    }
}
