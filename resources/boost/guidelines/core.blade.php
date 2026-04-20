# illuma-law/healthcheck-octane

Checks if the `vector` extension (octane) is enabled and active in PostgreSQL.

## Usage

```php
use IllumaLaw\HealthCheckOctane\OctaneExtensionCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    OctaneExtensionCheck::new()
        ->required(true), // If true, FAIL if missing. If false, WARNING.
]);
```

## Configuration

Publish config: `php artisan vendor:publish --tag="healthcheck-octane-config"`

Options in `config/healthcheck-octane.php`:
- `required`: (bool) Global default for strictness.
