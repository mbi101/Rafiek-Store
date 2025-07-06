<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CountryRequest;
use App\Http\Requests\shippingPriceRequest;
use App\Models\Country;
use App\Services\WorldService;

class WorldController extends Controller
{
    protected $worldService;

    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }


    public function getAllCountries()
    {
        $countries = $this->worldService->getAllCountries();
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

//    public function getCitiesByCountry($id)
//    {
//        $governorates = $this->worldService->getAllCities($id);
//        return view('dashboard.pages.world.governorates', compact('governorates'));
//    }

    public function getCitiesByCountry($id)
    {
        $cities = $this->worldService->getAllCities($id);
        return view('dashboard.pages.world.cities', compact('cities'));
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


    public function changeCityStatus($gov_id)
    {
        $gov = $this->worldService->changeCityStatus($gov_id);
        if (!$gov) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg')
            ]);
        }

        $gov = $this->worldService->getCityById($gov_id);
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
            'data' => $gov
        ]);
    }

    public function changeShippingPrice(shippingPriceRequest $request)
    {
        if (!$this->worldService->changeShippingPrice($request)) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg')
            ]);
        }

        $gov = $this->worldService->getCityById($request->gov_id);

        $gov->load('shippingPrice');
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
            'data' => $gov
        ]);
    }
}
