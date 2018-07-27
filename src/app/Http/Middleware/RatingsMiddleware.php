<?php

namespace App\Http\Middleware;

use App\Services\RatingsService;
use Closure;

class RatingsMiddleware
{
    protected $ratingsService;

    public function __construct(RatingsService $ratingsService)
    {
        $this->ratingsService = $ratingsService;
    }

    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $url = $request->fullUrl();
        $qsList = explode("?", $url)[1];

        if ($qsList)
        {
            if (strpos($qsList, 'withRating=true') !== false)
            {
                $original = $response->original;

                $results = array_map(function($result){
                    $vehicleId = $result["VehicleId"];
                    $rating = $this->ratingsService->getCrashRating($vehicleId);
                    $result["CrashRating"] = $rating;
                    return $result;
                }, $original["Results"]);

                return ["Count" => count($results), "Results" => $results];
            }
        }

        return $response;
    }
}
