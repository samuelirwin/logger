# This is a wrapper log to provide consistent log information during development

[![Latest Version on Packagist](https://img.shields.io/packagist/v/samuelirwin/logger.svg?style=flat-square)](https://packagist.org/packages/samuelirwin/logger)
[![Total Downloads](https://img.shields.io/packagist/dt/samuelirwin/logger.svg?style=flat-square)](https://packagist.org/packages/samuelirwin/logger)
![GitHub Actions](https://github.com/samuelirwin/logger/actions/workflows/main.yml/badge.svg)

## Installation

You can install the package via composer:

```bash
composer require samuelirwin/logger
```

## Usage

| Parameters | Type   | Description |
|------------|--------|-------------|
| $class     | object | Required    |
| $method    | string | Required    |
| $logType   | string | Required    |
| $summary   | string | Required    |
| $details   | array  | Optional    |

```php
Logger::record(object $class, string $method, string $logType, string $summary, array $details = [])
```

Example
```php
You can use $this in a class to get the class object

class Foo {
    public function bar()
    {
        Logger::record(
            $this, // class object
            'bar', // name of the method
            'error', // log types; $allowedLogTypes = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];
            'Summary of error message', 
            [
                // inside here can be anything you want to log
                'detail-1' => 1,
                'detail-2' => 'new details',
                'details-3' => 'more details'
            ]);
    }
}
```

Result Output
```php
{
    "context": "ClassName::methodName",
    "location": "/path/to/file",
    "details": {
        "id": 1,
        "code": 444,
        "message": "exception message"
    }
}
```

| Allowed Log Types |
|-------------------|
| emergency         |
| alert             |
| error             |
| warning           |
| notice            |
| info              |
| debug             |

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email samuelirwin1992@gmail.com instead of using the issue tracker.

## Credits

-   [Samuel Irwin](https://github.com/samuelirwin)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
