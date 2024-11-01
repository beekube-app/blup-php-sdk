# Beekube\BlupSDK\BlupApi

All URIs are relative to https://mellifera.beekube.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**blupBlupPost()**](BlupApi.md#blupBlupPost) | **POST** /blup | Perform BLUP calculation |
| [**welcomeGet()**](BlupApi.md#welcomeGet) | **GET** / | Welcome endpoint |


## `blupBlupPost()`

```php
blupBlupPost($bLUPInput)
```

Perform BLUP calculation

### Example

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

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bLUPInput** | [**\Beekube\BlupSDK\Models\BLUPInput**](../Model/BLUPInput.md)|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `welcomeGet()`

```php
welcomeGet()
```

Welcome endpoint

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Beekube\BlupSDK\Api\BlupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->welcomeGet();
} catch (Exception $e) {
    echo 'Exception when calling BlupApi->welcomeGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
