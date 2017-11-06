<?php
namespace Tests\Unit;

use App\Models\WebAPI;
use Tests\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;

class WebAPITest extends TestCase
{
  public function setUp()
  {
    $this->target = new WebAPI();
  }

  private function setMockHandler($mockData)
  {
    $mock = new MockHandler([ new Response(200, [], json_encode($mockData), '1.1') ]);
    $handler = HandlerStack::create($mock);
    $this->target = new WebAPI($handler);
  }

  public function testNumberOfAreas()
  {
    $areas = $this->target->getAreas();
    $this->assertEquals(count($areas), 47);
  }

  public function test1stAreaIsHokkaido()
  {
    $areas = $this->target->getAreas();
    $this->assertEquals("北海道", array_values($areas)[0]);
  }

  public function testGetDataFromAPI()
  {
    $mockData = array("data" => [
      ["Type" => "宅地(土地と建物)","Region" => "住宅地","MunicipalityCode" => "13103","Prefecture" => "東京都","Municipality" => "港区","DistrictName" => "赤坂","TradePrice" => "270000000","Area" => "105","LandShape" => "ほぼ台形","Frontage" => "10.2","TotalFloorArea" => "195","BuildingYear" => "平成11年","Structure" => "ＲＣ","Use" => "住宅","Purpose" => "住宅","Direction" => "東","Classification" => "区道","Breadth" => "4.7","CityPlanning" => "第２種中高層住居専用地域","CoverageRatio" => "60","FloorAreaRatio" => "300","Period" => "平成29年第１四半期"],
      ["Type" => "中古マンション等","MunicipalityCode" => "13103","Prefecture" => "東京都","Municipality" => "港区","DistrictName" => "赤坂","TradePrice" => "92000000","FloorPlan" => "１ＬＤＫ","Area" => "50","BuildingYear" => "平成20年","Structure" => "ＲＣ","Use" => "住宅","Purpose" => "住宅","CityPlanning" => "商業地域","CoverageRatio" => "80","FloorAreaRatio" => "400","Period" => "平成29年第１四半期","Remarks" => "改装済を購入"],
    ]);
    $this->setMockHandler($mockData);
    $result = $this->target->getTradeHistory('13','13228','20171','20171');
    $this->assertEquals(count($result), 2);
  }

  public function testGetCityCodeFromAPI()
  {
    $mockData = array("data" => [
      ["id"=>"14100","name"=>"横浜市"],["id"=>"14101","name"=>"鶴見区"]
    ]);
    $this->setMockHandler($mockData);
    $this->assertEquals(count($this->target->getCityCode('14')), 2);
  }

  public function testInstance()
  {
    $this->assertInstanceOf('\App\Models\WebAPI', $this->target);
  }

  public function testClientInstance()
  {
    $this->assertInstanceOf('\GuzzleHttp\Client', $this->target->client);
  }

  public function testTokyoAreaCode()
  {
    $this->target = new WebAPI();
    $this->assertEquals($this->target->getAreaCode('東京都'), "13");
    $this->assertEquals($this->target->getAreaCode('神奈川県'), "14");
  }
}
