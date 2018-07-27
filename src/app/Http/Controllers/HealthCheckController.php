<?php

namespace App\Http\Controllers;

use App\Services\HealthCheckService;

class HealthCheckController extends Controller
{
    protected $healthCheckService;

    public function __construct(HealthCheckService $healthCheckService)
    {
        $this->healthCheckService = $healthCheckService;
    }

    public function get()
    {
        $status = $this->healthCheckService->getStatus();
        return response()->json($status);
    }
}
