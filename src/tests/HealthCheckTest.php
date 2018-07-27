<?php

class HealthCheckTest extends TestCase
{
    public function testHealthCheck()
    {
        $this->get('/healthcheck');

        $this->assertEquals(
            json_encode('UP'), $this->response->getContent()
        );
    }
}
