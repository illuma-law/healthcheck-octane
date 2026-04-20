<?php

declare(strict_types=1);

arch('it will not use debugging functions')
    ->expect(['dd', 'dump', 'ray'])
    ->each->not->toBeUsed();

arch('source classes use strict types')
    ->expect('IllumaLaw\HealthCheckOctane')
    ->toUseStrictTypes();

arch('check class extends Spatie Check')
    ->expect('IllumaLaw\HealthCheckOctane\OctaneServerCheck')
    ->toExtend('Spatie\Health\Checks\Check');

arch('service provider extends PackageServiceProvider')
    ->expect('IllumaLaw\HealthCheckOctane\HealthcheckOctaneServiceProvider')
    ->toExtend('Spatie\LaravelPackageTools\PackageServiceProvider');
