# Healthcheck octane for Laravel

[![Tests](https://github.com/illuma-law/healthcheck-octane/actions/workflows/run-tests.yml/badge.svg)](https://github.com/illuma-law/healthcheck-octane/actions)
[![Packagist License](https://img.shields.io/badge/Licence-MIT-blue)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://img.shields.io/packagist/v/illuma-law/healthcheck-octane?label=Version)](https://packagist.org/packages/illuma-law/healthcheck-octane)

A focused octane server health check for Spatie's [Laravel Health](https://spatie.be/docs/laravel-health/v1/introduction) package.

This package provides a simple, direct health check to verify that your Laravel Octane server (RoadRunner, Swoole, or FrankenPHP) is currently running and responsive.

## Features

- **Server Status Check:** Uses the `octane:status` command to verify if the configured Octane server is active.
- **Environment Awareness:** Can be configured to automatically skip the check in local or testing environments where Octane might not be running.
- **Detailed Meta:** Captures the server type and status output for easier monitoring and debugging.

## Installation

Require this package with composer:

```shell
composer require illuma-law/healthcheck-octane
```

## Usage & Integration

Register the check inside your application's health service provider (e.g. `AppServiceProvider` or a dedicated `HealthServiceProvider`), alongside your other Spatie Laravel Health checks:

### Basic Registration

```php
use IllumaLaw\HealthCheckOctane\OctaneServerCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    OctaneServerCheck::new(),
]);
```

### Expected Result States

The check interacts with the Spatie Health dashboard and JSON endpoints using these states:

- **Ok:** The Octane server is running successfully.
- **Skipped:** The check is not running in a production-like environment (if configured).
- **Failed:** The Octane server is stopped or unreachable.

## Testing

Run the test suite:

```shell
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
