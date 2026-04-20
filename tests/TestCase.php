<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckOctane\Tests;

use IllumaLaw\HealthCheckOctane\HealthcheckOctaneServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Health\HealthServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            HealthServiceProvider::class,
            HealthcheckOctaneServiceProvider::class,
        ];
    }
}
