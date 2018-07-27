<?php

class VehiclesTest extends TestCase
{
    public function testGetWithInvalidDate()
    {
        $this->get('/vehicles/y2010/Audi/A3')
            ->seeJsonEquals([
                "Count" => 0,
                "Results" => []
            ]);
    }

    public function testGetWithNoVehiclesReturned()
    {
        $this->get('/vehicles/2030/Audix/A10')
            ->seeJsonEquals([
                "Count" => 0,
                "Results" => []
            ]);
    }
    
    public function testGetWithNoRating()
    {
        $this->get('/vehicles/2015/Audi/A3')
            ->seeJsonEquals([
                "Count" => 4,
                "Results" => [
                    ["Description" => "2015 Audi A3 4 DR AWD", "VehicleId" => 9403],
                    ["Description" => "2015 Audi A3 4 DR FWD", "VehicleId" => 9408],
                    ["Description" => "2015 Audi A3 C AWD", "VehicleId" => 9405],
                    ["Description" => "2015 Audi A3 C FWD", "VehicleId" => 9406]
                ]
            ]);
    }
    
    public function testGetWithRatingFalse()
    {
        $this->get('/vehicles/2015/Audi/A3?withRating=false')
            ->seeJsonEquals([
                "Count" => 4,
                "Results" => [
                    ["Description" => "2015 Audi A3 4 DR AWD", "VehicleId" => 9403],
                    ["Description" => "2015 Audi A3 4 DR FWD", "VehicleId" => 9408],
                    ["Description" => "2015 Audi A3 C AWD", "VehicleId" => 9405],
                    ["Description" => "2015 Audi A3 C FWD", "VehicleId" => 9406]
                ]
            ]);
    }

    public function testGetWithRatingTrue()
    {
        $this->get('/vehicles/2015/Audi/A3?withRating=true')
            ->seeJsonEquals([
                "Count" => 4,
                "Results" => [
                    ["Description" => "2015 Audi A3 4 DR AWD", "VehicleId" => 9403, "CrashRating" => "5"],
                    ["Description" => "2015 Audi A3 4 DR FWD", "VehicleId" => 9408, "CrashRating" => "5"],
                    ["Description" => "2015 Audi A3 C AWD", "VehicleId" => 9405, "CrashRating" => "Not Rated"],
                    ["Description" => "2015 Audi A3 C FWD", "VehicleId" => 9406, "CrashRating" => "Not Rated"]
                ]
            ]);
    }
}
