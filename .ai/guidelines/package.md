---
description: Laravel Octane server status health check for Spatie Laravel Health
---

# healthcheck-octane

Octane server status health check for `spatie/laravel-health`. Verifies the configured Octane server (RoadRunner, Swoole, FrankenPHP) is running.

## Namespace

`IllumaLaw\HealthCheckOctane`

## Key Check

- `OctaneServerCheck` — runs `octane:status` to verify the server is active

## Registration

```php
use IllumaLaw\HealthCheckOctane\OctaneServerCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    OctaneServerCheck::new()
        ->skipOnLocal(), // optional: skip in local/testing environments
]);
```

## Notes

- Can be configured to automatically skip in `local` or `testing` environments where Octane may not be running.
- Captures server type and status output in health meta data.
- This project uses **FrankenPHP** as the Octane server.
