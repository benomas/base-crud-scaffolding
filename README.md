## Base Crud Scaffolding - Laravel 5.4,5.5

Library for create all the files required for an api crud with base clases

## Instalación

Add dependency on our composer.json at the root of laravel.

```js
{
    "require": {
        "benomas/bcscaffolding": "dev-master"
    }
}
```

```bash
    composer update
```

## Laravel 5.4,5.5

Add the following service provider for this package.

```php
// config/app.php

'providers' => [
    Benomas\bcscaffolding\ScaffoldingServiceProvider::class,
];
```

## Usage
