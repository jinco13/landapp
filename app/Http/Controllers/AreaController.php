<?php

namespace App\Http\Controllers;

use App\Models\WebAPI;
use Illuminate\Http\Request;

class AreaController extends Controller
{
  function show(Request $request)
  {
    $api = new WebAPI();
    $cities = [];
    $data = [
      'cities' => $cities,
      'areas' => $api->getAreas(),
      'selectedArea' => "",
      'selectedCity' => "",
    ];
    return view('area.show', $data);
  }

  function city(Request $request)
  {
    $api = new WebAPI();
    $area = $request->area;
    $city = $request->city;
    $cities = $api->getCityCode($area);
    $data= [
      'cities' => $cities,
      'areas' => $api->getAreas(),
      'selectedArea' => $area,
      'selectedCity' => $city,
    ];
    return view('area.show', $data);
  }
}
