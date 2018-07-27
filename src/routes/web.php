<?php

$router->get('/healthcheck', 'HealthCheckController@get');

$router->get('/vehicles/{modelYear}/{manufacturer}/{model}', [
    'middleware' => 'ratings',
    'uses' => 'VehiclesController@get'
]);

$router->post('/vehicles', [
    'middleware' => 'ratings',
    'uses' => 'VehiclesController@post'
]);
