<?php
namespace App\Models;

class Trade
{
  public function __construct($data)
  {
    $this->type                 = $this->setApiData($data, "Type");
    $this->region               = $this->setApiData($data, 'Region');
    $this->municipalityCode     = $this->setApiData($data, 'MunicipalityCode');
    $this->prefecture           = $this->setApiData($data, 'Prefecture');
    $this->municipality         = $this->setApiData($data, 'Municipality');
    $this->districtName         = $this->setApiData($data, 'DistrictName');
    $this->nearestStation       = $this->setApiData($data, 'NearestStation');
    $this->timeToNearestStation = $this->setApiData($data, 'TimeToNearestStation');
    $this->tradePrice           = $this->setApiData($data, 'TradePrice');
    $this->pricePerUnit         = $this->setApiData($data, 'PricePerUnit');
    $this->floorPlan            = $this->setApiData($data, 'FloorPlan');
    $this->area                 = $this->setApiData($data, 'Area');
    $this->unitPrice            = $this->setApiData($data, 'UnitPrice');
    $this->landShape            = $this->setApiData($data, 'LandShape');
    $this->frontage             = $this->setApiData($data, 'Frontage');
    $this->totalFloorArea       = $this->setApiData($data, 'TotalFloorArea');
    $this->buildingYear         = $this->setApiData($data, 'BuildingYear');
    $this->structure            = $this->setApiData($data, 'Structure');
    $this->use                  = $this->setApiData($data, 'Use');
    $this->purpose              = $this->setApiData($data, 'Purpose');
    $this->direction            = $this->setApiData($data, 'Direction');
    $this->classification       = $this->setApiData($data, 'Classification');
    $this->breadth              = $this->setApiData($data, 'Breadth');
    $this->cityPlanning         = $this->setApiData($data, 'CityPlanning');
    $this->coverageRatio        = $this->setApiData($data, 'CoverageRatio');
    $this->floorAreaRatio       = $this->setApiData($data, 'FloorAreaRatio');
    $this->period               = $this->setApiData($data, 'Period');
    $this->remarks              = $this->setApiData($data, 'Remarks');
  }

  function setApiData($data, $key)
  {
    if(array_key_exists($key, $data)){
      return $data[$key];
    }
    return "";
  }
}
