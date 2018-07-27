<?php

namespace App\Services;

use Unirest\Request;

class RatingsService extends Service
{
    protected $nhtsaApi;

    public function __construct()
    {
        $this->nhtsaApi = env("NHTSA_API", "https://one.nhtsa.gov/webapi/api");
    }

    public function getCrashRating($vehicleId)
    {
        $nhtsaApi = $this->nhtsaApi;
        $url = "$nhtsaApi/SafetyRatings/VehicleId/$vehicleId?format=json";

        $response = Request::get($url);

        if ($response->code == 200)
        {
            $results = $response->body->Results;
            return $results[0]->OverallRating;
        }
    }
}
