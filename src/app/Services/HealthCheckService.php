<?php

namespace App\Services;

class HealthCheckService extends Service
{
    public function getStatus()
    {
        return "UP";
    }
}
