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
      'areas' => $api->getAreas(),
      'cities' => $cities,
    ];
    return view('area.show', $data);
  }

  function city(Request $request)
  {
    $api = new WebAPI();
    $area = $request->area;
    $cities = $api->getCityCode($area);
    $data= [
      'cities' => $cities,
      'areas' => $api->getAreas(),
      'area' => $area,
    ];
    return view('area.show', $data);
  }
}
