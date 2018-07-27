<?php

namespace App\Http\Controllers;

use App\Services\VehiclesService;
use Illuminate\Http\Request;

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

    public function post(Request $request)
    {
        $modelYear = $request->json()->get('modelYear');
        $manufacturer = $request->json()->get('manufacturer');
        $model = $request->json()->get('model');

        $vehicles = $this->vehiclesService->getVehicles($modelYear, $manufacturer, $model);
        return response()->json($vehicles);
    }
}
