<?php

declare(strict_types=1);

use IllumaLaw\HealthCheckOctane\OctaneServerCheck;
use Illuminate\Support\Facades\Artisan;
use Spatie\Health\Enums\Status;

it('succeeds when octane server is running', function () {
    $mock = Mockery::mock(Illuminate\Contracts\Console\Kernel::class);
    $mock->shouldReceive('call')->once()->andReturn(0);
    $mock->shouldReceive('output')->once()->andReturn("Octane server is running.\n");
    $this->app->instance(Illuminate\Contracts\Console\Kernel::class, $mock);

    $result = OctaneServerCheck::new()->run();

    expect($result->status)->toEqual(Status::ok())
        ->and($result->shortSummary)->toBe('Running');
});

it('skips in local/testing when octane server is stopped', function () {
    $mock = Mockery::mock(Illuminate\Contracts\Console\Kernel::class);
    $mock->shouldReceive('call')->once()->andReturn(1);
    $mock->shouldReceive('output')->once()->andReturn("Octane server is not running.\n");
    $this->app->instance(Illuminate\Contracts\Console\Kernel::class, $mock);

    // Default environment is 'testing' in Testbench
    $result = OctaneServerCheck::new()->run();

    expect($result->status)->toEqual(Status::skipped())
        ->and($result->shortSummary)->toBe('Skipped');
});

it('fails in production when octane server is stopped', function () {
    app()->detectEnvironment(fn () => 'production');

    $mock = Mockery::mock(Illuminate\Contracts\Console\Kernel::class);
    $mock->shouldReceive('call')->once()->andReturn(1);
    $mock->shouldReceive('output')->once()->andReturn("Octane server is not running.\n");
    $this->app->instance(Illuminate\Contracts\Console\Kernel::class, $mock);

    $result = OctaneServerCheck::new()->run();

    expect($result->status)->toEqual(Status::failed())
        ->and($result->shortSummary)->toBe('Stopped');
});
