<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

it('publishes the config file under the correct tag', function () {
    $this->artisan('vendor:publish', [
        '--tag'   => 'healthcheck-octane-config',
        '--force' => true,
    ])->assertExitCode(0);

    expect(config_path('healthcheck-octane.php'))->toBeFile();

    File::delete(config_path('healthcheck-octane.php'));
});

it('loads config with the correct default', function () {
    expect(config('healthcheck-octane.required'))->toBeFalse();
});
