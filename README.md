## Laravel View Localization

This package makes it possible to serve specific views for various locales.

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