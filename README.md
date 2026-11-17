# Faker PHP — de_CH locale

Swiss German (`de_CH`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-de-ch
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('de_CH');
```

Generators without a `de_CH` variant fall back to the default locale.

## Locale-specific generators

| Method | Extension | Example |
| --- | --- | --- |
| `province()` / `provinceCode()` | Address | `Zürich` / `ZH` |
| `avs(bool $formatted = false)` | Person | `756.1234.5678.97` (EAN-13 check digit) |
| `companyNumber()` | Company | `CHE-123.456.788` (UID, modulo 11 check digit) |
| `vat()` | Company | `CHE-123.456.788 MWST` |
| `handelsregisternummer()` | Company | `CH-020.3.012.345-6` |
| `iban()` | Financial | `CH9300762011623852957` |

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerDeChServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
