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
      'period' => [],
      'list' => [],
      'startDate' => '',
      'endDate' => ''
    ];
    return view('area.show', $data);
  }

  function city(Request $request)
  {
    $api = new WebAPI();
    $area   = $request->area;
    $city   = $request->city;
    $cities = [];
    $period = [];
    $start  = $request->startDate;
    $end    = $request->endDate;
    $list   = [];
    $district = $request->district;

    if(!empty($area)){
      $cities = $api->getCityCode($area);
      $period = $api->getPeriod();
    }

    if ( !empty($area) and !empty($city) and !empty($start) and !empty($end)) {
      $list = $api->getTradeHistory($area, $city, $start, $end);
    }
    if (!empty($district)) {
      foreach($list as $key => $obj){
        if ($obj->districtName != $district){
          unset($list[$key]);
        }
      }
    }
    $data = [
      'cities' => $cities,
      'areas' => $api->getAreas(),
      'selectedArea' => $area,
      'selectedCity' => $city,
      'period' => $period,
      'list' => $list,
      'startDate' => $start,
      'endDate' => $end,
      'district' => $district,
    ];
    return view('area.show', $data);
  }
}
