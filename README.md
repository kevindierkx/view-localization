## Laravel View Localization

This package makes it possible to serve specific views for various locales.

### Installation

To install this package you will need:

- Laravel 4.2+
- PHP 5.4

You must then modify your composer.json file and run composer update to include the latest version of the package in your project.

```
"require": {
    "kevindierkx/view-localization": "0.1.*"
}
```

Or you can run the composer require command from your terminal.

```
composer require kevindierkx/view-localization:0.1.*
```

Once the package is installed you need to open ```app/config/app.php``` and register the required service provider.

```
'providers' => [
    'Kevindierkx\ViewLocalization\ViewLocalizationServiceProvider'
]
```

### Usage

Localized views are stored in files withing the ```app/views``` directory. Within this directory there should be a subdirectory for each language supported by the application.

Views that serve as a default should go in the default ```app/views``` directory.

```
/app
    /views
        /nl
            messages.blade.php
    messages.blade.php
```

In the above example the ```nl``` locale would get a custom view, the ```en``` locale however would get the default ```messages.blade.php``` in the ```app/views``` directory.

### Credits

- [Kevin Dierkx](https://github.com/kevindierkx)

### License

The MIT License (MIT). Please see [License File](https://github.com/kevindierkx/elicit/blob/master/LICENSE) for more information.