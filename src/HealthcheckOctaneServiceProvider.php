<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckOctane;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class HealthcheckOctaneServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('healthcheck-octane')
            ->hasConfigFile()
            ->hasTranslations();
    }
}
