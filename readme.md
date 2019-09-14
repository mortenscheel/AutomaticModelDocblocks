# AutomaticModelDocblocks

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

This package is an extension for [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper).

When an Eloquent model's table is modified by a migration, the Docblock for the Model class is automatically updated

## Installation

Via Composer

``` bash
$ composer require --dev mortenscheel/automatic-model-docblocks
```

Publish config

``` bash
$ php artisan vendor:publish --tag automatic-model-updates
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Morten Scheel][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mortenscheel/automatic-model-docblocks.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mortenscheel/automatic-model-docblocks.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mortenscheel/automatic-model-docblocks
[link-downloads]: https://packagist.org/packages/mortenscheel/automatic-model-docblocks
[link-author]: https://github.com/mortenscheel
[link-contributors]: ../../contributors
