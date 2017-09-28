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
    Benomas\Bcscaffolding\ScaffoldingServiceProvider::class,
];
```

## Usage

```php
 example of commands for create or delete files
```
## create
```
php artisan scaffold create controller,request Inegi CatAdministracion inegi.cat_administracion &&
php artisan scaffold create controller,request Inegi CatAmbito inegi.cat_ambito &&
php artisan scaffold create controller,request Inegi CatDerechosTransito inegi.cat_derechos_transito &&
php artisan scaffold create controller,request Inegi CatEstado inegi.cat_estado &&
php artisan scaffold create controller,request Inegi CatEstadoCp inegi.cat_estado_cp &&
php artisan scaffold create controller,request Inegi CatLocalidad inegi.cat_localidad &&
php artisan scaffold create controller,request Inegi CatMargen inegi.cat_margen &&
php artisan scaffold create controller,request Inegi CatMunicipio inegi.cat_municipio &&
php artisan scaffold create controller,request Inegi CatPeriodo inegi.cat_periodo &&
php artisan scaffold create controller,request Inegi CatTermGen inegi.cat_term_gen &&
php artisan scaffold create controller,request Inegi CatTipoAsen inegi.cat_tipo_asen &&
php artisan scaffold create controller,request Inegi CatTipoDom inegi.cat_tipo_dom &&
php artisan scaffold create controller,request Inegi CatVialidad inegi.cat_vialidad &&
php artisan scaffold create controller,request Inegi CodigosPostales inegi.codigos_postales &&
php artisan scaffold create controller,request Inegi DomicilioGeografico inegi.domicilio_geografico &&
php artisan scaffold create controller,request Inegi DomiciliosCaminos inegi.domicilios_caminos &&
php artisan scaffold create controller,request Inegi DomiciliosCarreteras inegi.domicilios_carreteras &&
php artisan scaffold create controller,request Inegi DomiciliosRurales inegi.domicilios_rurales &&
php artisan scaffold create controller,request Inegi DomiciliosUrbanos inegi.domicilios_urbanos &&
php artisan scaffold create controller,request Inegi Vialidad inegi.vialidad

php artisan scaffold create controller,request Inegi CatAdministracion inegi.cat_administracion && php artisan scaffold create controller,request Inegi CatAmbito inegi.cat_ambito && php artisan scaffold create controller,request Inegi CatDerechosTransito inegi.cat_derechos_transito && php artisan scaffold create controller,request Inegi CatEstado inegi.cat_estado && php artisan scaffold create controller,request Inegi CatEstadoCp inegi.cat_estado_cp && php artisan scaffold create controller,request Inegi CatLocalidad inegi.cat_localidad && php artisan scaffold create controller,request Inegi CatMargen inegi.cat_margen && php artisan scaffold create controller,request Inegi CatMunicipio inegi.cat_municipio && php artisan scaffold create controller,request Inegi CatPeriodo inegi.cat_periodo && php artisan scaffold create controller,request Inegi CatTermGen inegi.cat_term_gen && php artisan scaffold create controller,request Inegi CatTipoAsen inegi.cat_tipo_asen && php artisan scaffold create controller,request Inegi CatTipoDom inegi.cat_tipo_dom && php artisan scaffold create controller,request Inegi CatVialidad inegi.cat_vialidad && php artisan scaffold create controller,request Inegi CodigosPostales inegi.codigos_postales && php artisan scaffold create controller,request Inegi DomicilioGeografico inegi.domicilio_geografico && php artisan scaffold create controller,request Inegi DomiciliosCaminos inegi.domicilios_caminos && php artisan scaffold create controller,request Inegi DomiciliosCarreteras inegi.domicilios_carreteras && php artisan scaffold create controller,request Inegi DomiciliosRurales inegi.domicilios_rurales && php artisan scaffold create controller,request Inegi DomiciliosUrbanos inegi.domicilios_urbanos && php artisan scaffold create controller,request Inegi Vialidad inegi.vialidad
```
## delete
```
php artisan scaffold delete controller,request Inegi CatAdministracion inegi.cat_administracion &&
php artisan scaffold delete controller,request Inegi CatAmbito inegi.cat_ambito &&
php artisan scaffold delete controller,request Inegi CatDerechosTransito inegi.cat_derechos_transito &&
php artisan scaffold delete controller,request Inegi CatEstado inegi.cat_estado &&
php artisan scaffold delete controller,request Inegi CatEstadoCp inegi.cat_estado_cp &&
php artisan scaffold delete controller,request Inegi CatLocalidad inegi.cat_localidad &&
php artisan scaffold delete controller,request Inegi CatMargen inegi.cat_margen &&
php artisan scaffold delete controller,request Inegi CatMunicipio inegi.cat_municipio &&
php artisan scaffold delete controller,request Inegi CatPeriodo inegi.cat_periodo &&
php artisan scaffold delete controller,request Inegi CatTermGen inegi.cat_term_gen &&
php artisan scaffold delete controller,request Inegi CatTipoAsen inegi.cat_tipo_asen &&
php artisan scaffold delete controller,request Inegi CatTipoDom inegi.cat_tipo_dom &&
php artisan scaffold delete controller,request Inegi CatVialidad inegi.cat_vialidad &&
php artisan scaffold delete controller,request Inegi CodigosPostales inegi.codigos_postales &&
php artisan scaffold delete controller,request Inegi DomicilioGeografico inegi.domicilio_geografico &&
php artisan scaffold delete controller,request Inegi DomiciliosCaminos inegi.domicilios_caminos &&
php artisan scaffold delete controller,request Inegi DomiciliosCarreteras inegi.domicilios_carreteras &&
php artisan scaffold delete controller,request Inegi DomiciliosRurales inegi.domicilios_rurales &&
php artisan scaffold delete controller,request Inegi DomiciliosUrbanos inegi.domicilios_urbanos &&
php artisan scaffold delete controller,request Inegi Vialidad inegi.vialidad

php artisan scaffold delete controller,request Inegi CatAdministracion inegi.cat_administracion && php artisan scaffold delete controller,request Inegi CatAmbito inegi.cat_ambito && php artisan scaffold delete controller,request Inegi CatDerechosTransito inegi.cat_derechos_transito && php artisan scaffold delete controller,request Inegi CatEstado inegi.cat_estado && php artisan scaffold delete controller,request Inegi CatEstadoCp inegi.cat_estado_cp && php artisan scaffold delete controller,request Inegi CatLocalidad inegi.cat_localidad && php artisan scaffold delete controller,request Inegi CatMargen inegi.cat_margen && php artisan scaffold delete controller,request Inegi CatMunicipio inegi.cat_municipio && php artisan scaffold delete controller,request Inegi CatPeriodo inegi.cat_periodo && php artisan scaffold delete controller,request Inegi CatTermGen inegi.cat_term_gen && php artisan scaffold delete controller,request Inegi CatTipoAsen inegi.cat_tipo_asen && php artisan scaffold delete controller,request Inegi CatTipoDom inegi.cat_tipo_dom && php artisan scaffold delete controller,request Inegi CatVialidad inegi.cat_vialidad && php artisan scaffold delete controller,request Inegi CodigosPostales inegi.codigos_postales && php artisan scaffold delete controller,request Inegi DomicilioGeografico inegi.domicilio_geografico && php artisan scaffold delete controller,request Inegi DomiciliosCaminos inegi.domicilios_caminos && php artisan scaffold delete controller,request Inegi DomiciliosCarreteras inegi.domicilios_carreteras && php artisan scaffold delete controller,request Inegi DomiciliosRurales inegi.domicilios_rurales && php artisan scaffold delete controller,request Inegi DomiciliosUrbanos inegi.domicilios_urbanos && php artisan scaffold delete controller,request Inegi Vialidad inegi.vialidad
```
