<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckOctane;

use Illuminate\Support\Facades\Artisan;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Spatie\Health\Enums\Status;

/**
 * Uses Laravel Octane's {@code octane:status} inspectors to verify the configured Octane server is running.
 */
final class OctaneServerCheck extends Check
{
    public function run(): Result
    {
        $server = (string) config('octane.server', 'roadrunner');

        $exitCode = Artisan::call('octane:status', [
            '--server' => $server,
        ]);

        $output = trim(Artisan::output());

        $meta = [
            'server'         => $server,
            'exit_code'      => $exitCode,
            'output_excerpt' => mb_substr($output, 0, 600),
        ];

        $result = Result::make()
            ->meta($meta)
            ->shortSummary($exitCode === 0 ? 'Running' : 'Stopped');

        if ($exitCode === 0) {
            return $result->ok('Octane server is running.');
        }

        if (app()->environment(['local', 'testing']) || (bool) config('health.octane.skip_outside_production_like', false)) {
            return (new Result(Status::skipped(), 'Octane server is not running (acceptable in this environment).'))
                ->meta($meta)
                ->shortSummary('Skipped');
        }

        return $result->failed('Octane server is not running.');
    }
}
