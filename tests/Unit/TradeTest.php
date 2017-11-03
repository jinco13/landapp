<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Trade;

class TradeTest extends TestCase
{
  public function setUp()
  {
    $this->target = new Trade(["Type" => "宅地(土地と建物)","Region" => "住宅地","MunicipalityCode" => "13103","Prefecture" => "東京都","Municipality" => "港区","DistrictName" => "赤坂","TradePrice" => "270000000","Area" => "105","LandShape" => "ほぼ台形","Frontage" => "10.2","TotalFloorArea" => "195","BuildingYear" => "平成11年","Structure" => "ＲＣ","Use" => "住宅","Purpose" => "住宅","Direction" => "東","Classification" => "区道","Breadth" => "4.7","CityPlanning" => "第２種中高層住居専用地域","CoverageRatio" => "60","FloorAreaRatio" => "300","Period" => "平成29年第１四半期"]);
  }

  public function testInstanceRegion()
  {
    $this->assertEquals('住宅地', $this->target->region);
    $this->assertEquals('60', $this->target->coverageRatio);
  }

  public function testInstance()
  {
    $this->assertInstanceOf('\App\Models\Trade', $this->target);
  }
}
