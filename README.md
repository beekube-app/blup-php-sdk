# blup-php-sdk

No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)

For more information, please visit [https://www.beekube.com](https://www.beekube.com).

## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/beekube-app/blup-php-sdk.git"
    }
  ],
  "require": {
    "beekube-app/blup-php-sdk": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/blup-php-sdk/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');




$apiInstance = new Beekube\BlupSDK\Api\BlupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$bLUPInput = new \Beekube\BlupSDK\Models\BLUPInput(); // \Beekube\BlupSDK\Models\BLUPInput

try {
    $apiInstance->blupBlupPost($bLUPInput);
} catch (Exception $e) {
    echo 'Exception when calling BlupApi->blupBlupPost: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://mellifera.beekube.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BlupApi* | [**blupBlupPost**](docs/Api/BlupApi.md#blupbluppost) | **POST** /blup | Perform BLUP calculation
*BlupApi* | [**welcomeGet**](docs/Api/BlupApi.md#welcomeget) | **GET** / | Welcome endpoint

## Models

- [BLUPInput](docs/Model/BLUPInput.md)
- [Evaluation](docs/Model/Evaluation.md)
- [QueenBeeInput](docs/Model/QueenBeeInput.md)
- [ValidationErrorModel](docs/Model/ValidationErrorModel.md)

## Authorization
All endpoints do not require authorization.
## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

tech@beekube.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Package version: `1.0.0`
    - Generator version: `7.9.0`
- Build package: `org.openapitools.codegen.languages.PhpNextgenClientCodegen`