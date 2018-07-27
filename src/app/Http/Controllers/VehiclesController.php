<?php

namespace App\Http\Controllers;

use App\Services\VehiclesService;

class VehiclesController extends Controller
{
    protected $vehiclesService;

    public function __construct(VehiclesService $vehiclesService)
    {
        $this->vehiclesService = $vehiclesService;
    }

    public function get($modelYear, $manufacturer, $model)
    {
        $vehicles = $this->vehiclesService->getVehicles($modelYear, $manufacturer, $model);
        return response()->json($vehicles);
    }
}
