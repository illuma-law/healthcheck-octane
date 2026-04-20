<?php

declare(strict_types=1);

return [
    /*
     * Whether the octane server is required.
     * If true, the check will fail if the server is not running.
     * If false, it will only result in a warning.
     */
    'required' => env('HEALTH_OCTANE_REQUIRED', false),

    /*
     * Whether to skip the check outside of production environments.
     */
    'skip_outside_production_like' => env('HEALTH_OCTANE_SKIP_OUTSIDE_PRODUCTION', false),
];
