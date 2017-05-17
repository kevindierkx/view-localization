# Laravel View Localization
This package makes it possible to serve specific views for various locales.

## Installation
_This package is build for [Laravel framework](http://laravel.com) based applications._

For Laravel 4.2+ please refer to [version 1.0](https://github.com/kevindierkx/view-localization/tree/1.0).

### Laravel 5.x
Require this package with composer:

```
composer require kevindierkx/view-localization
```

### Service provider
Open `config/app.php` and register the required service provider.

```php
'providers' => [
    ...
    'Kevindierkx\ViewLocalization\ViewLocalizationServiceProvider'
]
```

## Usage
Localized views are stored in files within the ```resources/views``` directory. Within this directory there should be a subdirectory for each language supported by the application.

Views that serve as a default should go in the default ```resources/views``` directory.

```
/resources
    /views
        /nl
            messages.blade.php
    messages.blade.php
```

In the above example the ```nl``` locale would get a custom view, the ```en``` locale however would get the default ```messages.blade.php``` in the ```resources/views``` directory.

## Credits

- [Kevin Dierkx](https://github.com/kevindierkx)

## License

The MIT License (MIT). Please see [License File](https://github.com/kevindierkx/elicit/blob/master/LICENSE) for more information.
