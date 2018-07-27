<?php

namespace App\Services;

use Unirest\Request;

class VehiclesService extends Service
{
    protected $nhtsaApi;

    public function __construct()
    {
        $this->nhtsaApi = env("NHTSA_API", "https://one.nhtsa.gov/webapi/api");
    }

    public function getVehicles($modelYear, $manufacturer, $model)
    {
        $nhtsaApi = $this->nhtsaApi;
        $url = "$nhtsaApi/SafetyRatings/modelyear/$modelYear/make/$manufacturer/model/$model?format=json";

        $response = Request::get($url);

        if ($response->code == 200)
        {
            $results = array_map(function($result){
                return [
                    "Description" => $result->VehicleDescription,
                    "VehicleId" => $result->VehicleId
                ];
            }, $response->body->Results);
            return ["Count" => count($results), "Results" => $results];
        }

        return ["Count" => 0, "Results" => []];
    }
}
