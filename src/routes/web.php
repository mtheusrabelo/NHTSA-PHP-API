<?php

$router->get('/healthcheck', 'HealthCheckController@get');

$router->get('/vehicles/{modelYear}/{manufacturer}/{model}', 'VehiclesController@get');

$router->post('/vehicles', 'VehiclesController@post');
