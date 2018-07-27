<?php

namespace App\Http\Controllers;

class HealthCheckController extends Controller
{
    public function get()
    {
        return response()->json('UP');
    }
}
